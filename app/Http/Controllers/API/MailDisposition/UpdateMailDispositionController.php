<?php

namespace App\Http\Controllers\API\MailDisposition;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\DispositionAssignment;
use Illuminate\Http\Request;

class UpdateMailDispositionController extends Controller
{
    public function read(Request $request)
    {
        $request->validate([
            'disposition_assignment_id' => ['required', 'exists:disposition_assignments,id']
        ]);

        $disposition_assignment = DispositionAssignment::find($request->disposition_assignment_id);
        $disposition_assignment->update([ 'read' => 1 ]);
        return ResponseFormatter::success(null, 'success update read field disposition assignment data');
    }
}
