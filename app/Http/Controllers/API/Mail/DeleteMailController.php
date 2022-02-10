<?php

namespace App\Http\Controllers\API\Mail;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Mail;

class DeleteMailController extends Controller
{
    public function __invoke(Mail $mail)
    {
        $mail->delete();
        return ResponseFormatter::success(null, 'success delete mail data');
    }
}
