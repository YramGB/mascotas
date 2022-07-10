<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['mascotas']=Mascota::paginate(5);
        return view('mascota.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mascota.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $campos=[
            'Nombre'=>'required|string|max:100',
            'Especie'=>'required|string|max:100',
            'Raza'=>'required|string|max:100',
            'Sexo'=>'required|string|max:100',
            'Edad'=>'required|string|max:100',
            'Color'=>'required|string|max:100',
            'Enfermedades'=>'required|string|max:100'
        ];

        $mensaje=[
            'Enfermedad'=>'La o las enfermedades es requerido',
            'Nombre'=>'El nombre es requerida', 
            'Especie'=>'La especie es requerida', 
            'Raza'=>'La raza es requerida',
            'Sexo'=>'El sexo es requerido',
            'Edad'=>'La edad es requerida',
            'Color'=>'El color es requerido',
        ];

        $this->validate($request, $campos, $mensaje);

        //$datosMascota = request()->all();
        $datosMascota = request()->except('_token');

        if($request->hasFile('Foto')){
            $datosMascota['Foto']=$request->file('Foto')->store('uploads', 'public');
        }

        Mascota::insert($datosMascota);
        //return response()->json($datosMascota);
        return redirect('mascota')->with('mensaje', 'Mascota agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function show(Mascota $mascota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mascota=Mascota::findOrFail($id);
        return view('mascota.edit', compact('mascota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Especie'=>'required|string|max:100',
            'Raza'=>'required|string|max:100',
            'Sexo'=>'required|string|max:100',
            'Edad'=>'required|string|max:100',
            'Color'=>'required|string|max:100',
            'Enfermedades'=>'required|string|max:100'
        ];

        $mensaje=[
            'Enfermedad'=>'La o las enfermedades es requerido',
            'Nombre'=>'El nombre es requerida', 
            'Especie'=>'La especie es requerida', 
            'Raza'=>'La raza es requerida',
            'Sexo'=>'El sexo es requerido',
            'Edad'=>'La edad es requerida',
            'Color'=>'El color es requerido',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosMascota = request()->except(['_token', '_method']);    
        
        if($request->hasFile('Foto')){
            $mascota=Mascota::findOrFail($id);

            Storage::delete('public/'.$mascota->Foto);    

            $datosMascota['Foto']=$request->file('Foto')->store('uploads', 'public');
        }
        
        Mascota::where('id', '=', $id)->update($datosMascota);
        $mascota=Mascota::findOrFail($id);
        //return view('mascota.edit', compact('mascota'));

        return redirect('mascota')->with('mensaje', 'Mascota modificada');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mascota=Mascota::findOrFail($id);

        if(Storage::delete('public/'.$mascota->Foto)){
            Mascota::destroy($id);
        }

        return redirect('mascota')->with('mensaje', 'Mascota eliminada');
    }
}