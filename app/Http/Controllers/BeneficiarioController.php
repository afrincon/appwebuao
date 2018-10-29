<?php

namespace App\Http\Controllers;

use App\Beneficiario;
use App\TiposDocumento;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

    public function store(Request $request) {
        $data = request()->validate([            
            'id_tipo_documento' => 'required',
            'nombre'            => 'required',
            'documento'         =>  ['required', 
                Rule::unique('beneficiarios')->where(function ($query) use ($request){
                    return $query->where('id_tipo_documento', $request->input('id_tipo_documento'));
                })
            ],
            'estado'            => 'required',
            'direccion'         =>  'required',
            'telefono'          => 'required|max:10',
            'clasificacion'     => 'required',
        ],
        [
            'documento.unique'  => __('validation.beneficiarios.error.unique', [
                'id_tipo_documento' => $request->input('id_tipo_documento'),
                'documento'         => $request->input('documento')
            ]),
        ]);

         $beneficiario  = new beneficiario($data);
         $beneficiario->save();
         return redirect()->route('beneficiarios.index')->with('status', 'Beneficiario agregado correctamente');
    }

    public function edit($id) {
        $beneficiario = Beneficiario::findOrFail($id);
        return view('admin.beneficiarios.edit', compact('beneficiario'));
    }

    public function update(Request $request,$id) {
        $data = request()->validate([
            'nombre' => 'required',
            'estado' => 'required',
            'direccion' => 'required',
            'telefono' => 'required|max:10',
            'clasificacion' => 'required',
        ]);
        
        $beneficiario = Beneficiario::findOrFail($id);

        $beneficiario->nombre = $request->input('nombre');
        $beneficiario->direccion = $request->input('direccion');
        $beneficiario->telefono = $request->input('telefono');
        $beneficiario->clasificacion = $request->input('clasificacion');
        $beneficiario->estado = $request->input('estado');
        
        $beneficiario->save();
        return redirect()->route('beneficiarios.index')->with('status', 'Beneficiario actualizado correctamente');
    }

    public function show($id){
        return view('admin.beneficiarios.show', ['beneficiario' => Beneficiario::findOrFail($id)]);
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
