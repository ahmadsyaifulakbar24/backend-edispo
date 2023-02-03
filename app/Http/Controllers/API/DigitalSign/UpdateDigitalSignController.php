<?php

namespace App\Http\Controllers\API\DigitalSign;

use App\Helpers\FileHelpers;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\DigitalSign\DigitalSignResource;
use App\Models\DigitalSign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateDigitalSignController extends Controller
{
    public function __invoke(Request $request, DigitalSign $digital_sign)
    {
        $request->validate([
            'mail_number' => ['required', 'string'],
            'purpose' => ['required', 'string'],
            'regarding' => ['required', 'string'],
            'sign_date' => ['required', 'date'],
            'file' => ['nullable', 'file', 'mimes:pdf'],
        ]);

        $input = $request->except([
            'file'
        ]);

        if($request->file) {
            $input['file'] = FileHelpers::upload_file('script', $request->file);
            Storage::disk('public')->delete($digital_sign->file);
        }

        $digital_sign->update($input);

        return ResponseFormatter::success(new DigitalSignResource($digital_sign), 'success update digital sign data');
    }
}
