<?php

namespace App\Http\Controllers\API\MailDisposition;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\DispositionAssigment;
use Illuminate\Http\Request;

class UpdateMailDispositionController extends Controller
{
    public function read(Request $request)
    {
        $request->validate([
            'disposition_assigment_id' => ['required', 'exists:disposition_assigments,id']
        ]);

        $disposition_assigment = DispositionAssigment::find($request->disposition_assigment_id);
        $disposition_assigment->update([ 'read' => 1 ]);
        return ResponseFormatter::success(null, 'success update read field disposition assigment data');
    }
}
