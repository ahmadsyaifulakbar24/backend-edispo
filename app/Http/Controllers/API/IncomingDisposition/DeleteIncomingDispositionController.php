<?php

namespace App\Http\Controllers\API\IncomingDisposition;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\IncomingDisposition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeleteIncomingDispositionController extends Controller
{
    public function __invoke(IncomingDisposition $incoming_disposition)
    {
        $files = $incoming_disposition->file_manager()->get();
        foreach($files as $file) {
            $paths[] = $file['path'];
        }
        Storage::disk('public')->delete($paths);
        $incoming_disposition->delete();

        return ResponseFormatter::success(null, 'success delete incoming disposition data');
    }
}
