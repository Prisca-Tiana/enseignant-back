<?php

namespace App\Http\Controllers;

use App\Models\Enseignant;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class EnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enseignant = Enseignant::all();
        return response()->json($enseignant, RESPONSE::HTTP_OK);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $enseignant = Enseignant::findOrFail($id);
        return response()->json($enseignant, RESPONSE::HTTP_OK);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                "matricule" => ['required'],
                "nom_enseignant" => ['required'],
                "taux_horaire" => ['required'],
                "nb_heure" => ['required'],
            ]
        ); 
        $enseignant = Enseignant::create($request->all());
        return response()->json($enseignant, RESPONSE::HTTP_CREATED);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $enseignant = Enseignant::findOrFail($id);
        $enseignant->update($request->all());
        return response()->json($enseignant, RESPONSE::HTTP_OK);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enseignant = Enseignant::findOrFail($id);
        $enseignant->delete();
        return response()->json("", RESPONSE::HTTP_NO_CONTENT);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function prestation_totale()
    {
        $prestation_totale = Enseignant::sum(\DB::raw('taux_horaire * nb_heure'));
        return response()->json(['prestation_totale' => $prestation_totale], RESPONSE::HTTP_OK);
    }


}
