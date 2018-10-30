<?php

namespace App\Http\Controllers;

use App\Ayuda;
use App\TipoAyuda;
use Illuminate\Http\Request;

class AyudaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.ayudas.index');
    }

    public function create(){
        return view('admin.ayudas.create');
    }

    public function store(){
        $data = request()->validate([
            'fecha_ayuda' => 'required|date|after:yestarday',
            'id_tipoayuda' => 'required',
            'id_beneficiario' =>  'required',
            'id_iglesia' => 'required',
        ]);

        $ayuda  = new Ayuda($data);        
        $ayuda->save();
        return redirect()->route('ayudas.index')->with('status', 'Ayuda registrada correctamente');
    }

    public function edit($id) {
        $ayuda = Ayuda::findOrFail($id);
        return view('admin.ayudas.edit', compact('ayuda'));
    }

    public function update(Request $request, $id){
        $data = request()->validate([
            'fecha_ayuda' => 'required|date|after:yestarday',
            'id_tipoayuda' => 'required',
            'id_beneficiario' =>  'required',
            'id_iglesia' => 'required',
            'observaciones' => '',
        ]);
        $ayuda = Ayuda::findOrFail($id);
        $ayuda->fill($request->all());
        $ayuda->save();
        return redirect()->route('ayudas.index')->with('statu', 'La ayuda ha sido actualizada');;
    }

    public function destroy($id) {
        $ayuda = Ayuda::findOrFail($id);
        $ayuda->delete();
        return redirect()->route('ayudas.index')->with('status', 'Ayuda anulada correctamente');
    }

    public function obtenerAyudas(){
        $ayudas = Ayuda::all();
        $ayudas->load('tipoAyuda', 'iglesia', 'beneficiario');
        return response()->json($ayudas);
    }

    public function obtenerTipoAyuda(){
        $tipo = TipoAyuda::all();
        return response()->json($tipo);
    }

    public function validarUltimaAyuda(Request $request){
        //dd($direccion);
        $ayuda = Ayuda::where('id_beneficiario', '=', $request->input('id_beneficiario'))->latest()->first();
        return response()->json($ayuda);        
    }
}
