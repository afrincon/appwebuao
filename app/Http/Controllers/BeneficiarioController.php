<?php

namespace App\Http\Controllers;

use App\Beneficiario;
use App\TiposDocumento;
use Illuminate\Http\Request;

class BeneficiarioController extends Controller
{
    # Iniciar Contructor con parametro de logueo obligatiorio apra el modulo
    public function __construct()
    {
      $this->middleware('auth');      
    }

    public function index(){
        return view('admin.beneficiarios.index');
    }

    public function create(){
        return view('admin.beneficiarios.create');
    }

    public function store() {
        $data = request()->validate([
            'documento' =>[ Rule::unique('beneficiarios')->where(function ($query) use ($request){
             return $query->where('id_tipo_documento', $request->id_tipo_documento);
            })],
            'id_tipo_documento' => 'required',
            'nombre' => 'required',
            'estado' => 'required',
            'direccion' =>  'required',
            'telefono' => 'required|max:10',
            'clasificacion' => 'required',
         ]);
    }

    public function obtenerBeneficiarios(Request $request) {
        $beneficiarios = Beneficiario::where([
            ['nombre', 'like', '%'.$request->input('nombre').'%' ],
            ['estado', '=', 1],
        ])->get();
        $beneficiarios->load('tipo_documento');
        return response()->json($beneficiarios);
    }

    public function obtenerTipoDocumento(Request $request){
        $tipos = TiposDocumento::all();
        return response()->json($tipos);
    }
}
