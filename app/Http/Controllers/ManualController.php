<?php

namespace App\Http\Controllers;

use Auth;
use File;
use Input;
use Response;
use PDF;
use Illuminate\Http\Request;

class ManualController extends Controller {
    public function softwareManual(Request $request) {
        $manualArr = [
            '1' => 'Admin'
        ];
            
		$fileName = $manualArr[Auth::user()->group_id];
		
        $file = 'public/manual/' . $fileName . '-Manual-for-Rebekas-Attire-V.1.1.pdf';

        if (file_exists($file)) {
            $content = file_get_contents($file);
            return Response::make($content, 200, array('content-type' => 'application/pdf'));
        } else {
            echo 'No PDF found';
        }
    }
}
