<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;

class PDFHelpers {
    public static function convertPDFVersion($file, $new_path) {
        // pdf version information
        $filepdf = fopen($file,"r");
        if ($filepdf) {
            $line_first = fgets($filepdf);
            fclose($filepdf);
            // extract number such as 1.4 ,1.5 from first read line of pdf file
            preg_match_all('!\d+!', $line_first, $matches);	
            // save that number in a variable
            $pdfversion = implode('.', $matches[0]);
            if($pdfversion > "1.4"){
                $name = Str::random(18);
                $new_file = $new_path .'/'.$name.'.pdf';
                shell_exec('gs -dBATCH -dNOPAUSE -q -sDEVICE=pdfwrite -sOutputFile="'.$new_file.'" "'.$file.'"'); 
                return public_path($new_file);
            }
            else{
                return $file;
            }
        }
    }
}