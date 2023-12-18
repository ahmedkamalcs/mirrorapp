<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;

class APSWebController extends BaseController {

    public function index() {
        return view('apsweb');
    }
    
    public function tokenization() {
        return view('tokenapsweb');
    }
    
    public function pay()
    {
        
    }

}
