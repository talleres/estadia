<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Gate;
use PDF;

class ServiciosController extends Controller
{
    public function getPDF($modulo, $ruta){
        if (Gate::denies('canPDF', $modulo)) {
            return redirect()->route('inicio');
        }

        $pdf=PDF::loadview(redirect()->route($ruta));

        return $pdf->stream();
    }
}
