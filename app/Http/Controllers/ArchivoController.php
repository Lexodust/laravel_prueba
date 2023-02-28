<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArchivoController extends Controller
{
    public function index()
    {
        return view('subir-archivos');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'archivos.*' => 'required|mimes:pdf|max:2048',
        ]);
    
        if ($request->hasfile('archivos')) {
            foreach ($request->file('archivos') as $archivo) {
                $nombre = $archivo->getClientOriginalName();
                $archivo->move(public_path().'/archivos/', $nombre);
            }
        }
    
        return redirect()->back()->with('mensaje', 'Archivos subidos exitosamente');
    }
}    
?>