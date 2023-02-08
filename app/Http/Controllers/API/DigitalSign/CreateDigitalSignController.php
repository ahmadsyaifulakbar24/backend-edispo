<?php

namespace App\Http\Controllers\API\DigitalSign;

use App\Helpers\FileHelpers;
use App\Helpers\FindSuperior;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\DigitalSign\DigitalSignResource;
use App\Models\DigitalSign;
use Illuminate\Http\Request;

class CreateDigitalSignController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'mail_number' => ['required', 'string'],
            'purpose' => ['required', 'string'],
            'regarding' => ['required', 'string'],
            'sign_date' => ['required', 'date'],
            'file' => ['required', 'file', 'mimes:pdf'],
        ]);

        $input = $request->except([
            'file'
        ]);

        $user = $request->user();
        $user_id = FindSuperior::superior($user);
        $input['user_id'] = $user_id;
        
        $input['file'] = FileHelpers::upload_file('script', $request->file);

        $digital_sign = DigitalSign::create($input);

        return ResponseFormatter::success(new DigitalSignResource($digital_sign), 'success create digital sign data');
    }
}
