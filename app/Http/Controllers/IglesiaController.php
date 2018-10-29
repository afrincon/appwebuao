<?php

namespace App\Http\Controllers;

use App\Iglesia;
use App\Arquidiocesis;
use Illuminate\Http\Request;

class IglesiaController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        return view('admin.iglesias.index');        
    }

    public function create(){
        return view('admin.iglesias.create');
    }

    public function store(){

        $data = request()->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required|numeric',
            'id_arquidiocesis' =>  'required',
            'user_id' => 'required',
            'estado' => 'required',
        ]);

        $iglesia  = new Iglesia($data);
        $iglesia->save();
        return redirect()->route('iglesias.index')->with('status', 'Iglesia agregada correctamente');
    }

    public function edit($id) {
        $iglesia = Iglesia::findOrFail($id);
        //dd($iglesia);
        return view('admin.iglesias.edit', compact('iglesia'));
    }

    public function update(Request $request,$id) {
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required|numeric',
            'id_arquidiocesis' =>  'required',
            'user_id' => 'required',
            'estado' => 'required',
        ]);
        $iglesia = Iglesia::findOrFail($id);
        $iglesia->fill($request->all());
        $iglesia->save();
        return redirect()->route('iglesias.index')->with('status', 'Iglesia ha sido actualizada correctamente');;
    }

    public function show($id){
        return view('admin.iglesias.show', ['iglesia' => Iglesia::findOrFail($id)]);
    }

    public function obtenerDiocesis(Request $request){       
        $arquidiocesis = Arquidiocesis::where('nombre', 'like', '%'.$request->input('nombre').'%')->get();
        return response()->json($arquidiocesis);
    }

    /* Metodo para cargar iglesias mediannte la API */
    public function obtenerIglesias(Request $request) {
        if($request->id) {
            $iglesias = Iglesia::where([
                ['id', '=', $request->input('id') ],
                ['estado', '=', 1],
            ])->get();
            $iglesias->load('user');
            $iglesias->load('arquidiocesis');
        } else {
            $iglesias = Iglesia::where([
                ['nombre', 'like', '%'.$request->input('nombre').'%' ],
                ['estado', '=', 1],
            ])->get();
            $iglesias->load('user');
            $iglesias->load('arquidiocesis');
        }
        return response()->json($iglesias);
    }
}
