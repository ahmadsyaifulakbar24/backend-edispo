<?php 

namespace App\Helpers;

class NotificationHelper {

    static function notifTitle($category){
        $result = "Pemberitahuan";
        switch ($category) {
            case "A":
            case "W":
            case "S":
                $result = "Surat";
                break;
            
            case "ND":
                $result = "Nota Dinas";
                break;
            
            case "U":
                $result = "Undangan";
                break;
            
            case "D":
                $result = "Disposisi Masuk";
                break;

            case "STM":
                $result = "Surat Turunan Menteri";
                break;
            
            case "T":
                $result = "Tembusan";
                break;
        }
        return $result;
    }

    static function notifBody($from, $regarding){
        return "Dari {$from}, perihal {$regarding}";
    }
}