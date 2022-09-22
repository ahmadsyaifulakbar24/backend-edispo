<?php

namespace App\Http\Controllers\API\Agenda;

use App\Helpers\FileHelpers;
use App\Helpers\FindSuperior;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Agenda\AgendaDetailResource;
use App\Models\{Agenda, User, FcmToken};
use App\Notifications\AddNewAgenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CreateAgendaController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'mail_number' => ['required', 'string'],
            'origin' => ['required', 'string'],
            'regarding' => ['required', 'string'],
            'agenda_date' => ['required', 'date'],
            'date_received' => ['required', 'date'],
            'date' => ['required', 'date_format:Y/m/d H:i:s'],
            'location' => ['required', 'string'],
            'description' => ['required', 'string'],
            'document' => ['required', 'file'],
        ]);   
        
        $input = $request->all();
        $user = User::find($request->user()->id);
        $user_id = FindSuperior::superior($user);
        $input['user_id'] = $user_id;
        $input['agenda_number'] = $this->max_agenda_number($user_id);

        $agenda = Agenda::create($input);
        $document_name = $request->document->getClientOriginalName();
        $document_path = FileHelpers::upload_file('agenda', $request->document);
        $agenda->file_manager()->create([
            'type' => 'agenda',
            'path' => $document_path,
            'file_name' => $document_name,
        ]);

        // sent notification 
        if($user->role == 'assistant') {
            $parent_id = FindSuperior::superior($user);
            $parent = User::find($parent_id);
            $parent->notify(new AddNewAgenda($agenda, $user, $parent));
            $objectNotif = new AddNewAgenda($agenda, $user, $parent);
            
            $title = $this->notifTitle("U");
            $body = $this->notifBody($user->name, $input['regarding']);
            $to = FcmToken::select("token")->where('user_id', $parent->id)->where('status', 1)->groupBy('token')->get();
            if( $to->count() > 0 ){
                foreach ($to as $k => $v) {
                    $token[] = $v->token;
                    $this->fcmNotif($objectNotif->toArray(null), $v->token, $title, $body);
                }
            }
        }
        return ResponseFormatter::success(new AgendaDetailResource($agenda), 'success create agenda data');
    }

    protected function max_agenda_number($user_id)
    {
        $max = Agenda::select(DB::raw("if(MAX(agenda_number) IS NULL, 0, MAX(agenda_number)) as max"))->where('user_id', $user_id)->first();
        return $max['max'] + 1;
    }
}
