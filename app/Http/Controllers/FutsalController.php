<?php

namespace App\Http\Controllers;

use App\Models\Futsal;
use Illuminate\Http\Request;

class FutsalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Futsal::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        $futsal = new Futsal();
        $futsal->jersey = $request->jersey;
        $futsal->name = $request->name;
        $futsal->position = $request->position;
        $futsal->save();

        return "Data Berhasil Ditambahkan!";
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
     * @param  \App\Models\Futsal  $futsal
     * @return \Illuminate\Http\Response
     */
    public function show(Futsal $futsal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Futsal  $futsal
     * @return \Illuminate\Http\Response
     */
    public function edit(Futsal $futsal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Futsal  $futsal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $futsal = Futsal::find($id);
        $futsal->jersey = $request->jersey;
        $futsal->name = $request->name;
        $futsal->position = $request->position;
        $futsal->save();

        return "Data Berhasil Diupdate!";
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Futsal  $futsal
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $futsal = Futsal::find($id);
        $futsal->delete();

        return "Data Berhasil Dihapus";
    }
}
