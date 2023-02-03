<?php

namespace App\Http\Controllers\API\DigitalSign;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\DigitalSign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeleteDigitalSignController extends Controller
{
    public function __invoke(DigitalSign $digital_sign)
    {
        Storage::disk('public')->delete($digital_sign->file);
        $digital_sign->delete();

        return ResponseFormatter::success(null, 'success delete digital sign data');
    }
}
