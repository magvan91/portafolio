<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Requests\StoreProfile;
use App\Profile;
class CrudProfilesController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return $profiles = Profile::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Profile::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProfile $request, $id)
    {

        $profile = Profile::findOrFail($id);
        $profile->name = $request->get('NameEdit');
        $profile->AppPaterno = $request->get('AppPaternoEdit');
        $profile->AppMaterno = $request->get('AppMaternoEdit');
        $profile->fecha_nacimiento = $request->get('FechaNacimientoEdit');
        $profile->carrera = $request->get('CarreraEdit');
        $profile->universidad = $request->get('UniversidadEdit');

        if($profile->save()){
            $data["error"] = 0;
            $data["msg"] = "Registro Actualizado";
        }else{
            $data["error"] = 1;
            $data["msg"] = "Ocurrio un error";
        }

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
