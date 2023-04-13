<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Picqer\Barcode\BarcodeReader;
use Illuminate\Support\Facades\Storage;

class BarcodeController extends Controller
{
    public function scanner()
    {
        return view('Barcode.index');
    }

}
