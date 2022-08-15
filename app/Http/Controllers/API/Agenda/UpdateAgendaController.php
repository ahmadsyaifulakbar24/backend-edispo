<?php

namespace App\Http\Controllers\API\Agenda;

use App\Helpers\FileHelpers;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Agenda\AgendaDetailResource;
use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateAgendaController extends Controller
{
    public function __invoke(Request $request, Agenda $agenda)
    {
        $request->validate([
            'origin' => ['required', 'string'],
            'regarding' => ['required', 'string'],
            'agenda_date' => ['required', 'date'],
            'date_received' => ['required', 'date'],
            'date' => ['required', 'date_format:Y/m/d H:i:s'],
            'location' => ['required', 'string'],
            'description' => ['required', 'string'],
            'document' => ['nullable', 'file'],
        ]);   
        
        $input = $request->all();
        $agenda->update($input);
        if($request->file('document')) {
            $document = $agenda->file_manager()->first();
            $document_name = $request->document->getClientOriginalName();
            $document_path = FileHelpers::upload_file('agenda', $request->document);
            Storage::disk('public')->delete($document->path);

            $document->update([
                'path' => $document_path,
                'file_name' => $document_name,
            ]);
        }

        return ResponseFormatter::success(new AgendaDetailResource($agenda), 'success update agenda data');
    }
}
