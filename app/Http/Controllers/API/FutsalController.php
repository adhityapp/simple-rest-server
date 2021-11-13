<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;
use App\Models\Futsal;
use App\Http\Resources\Futsal as FutsalResource;

class FutsalController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $futsal = Futsal::all();
        return $this->sendResponse(FutsalResource::collection($futsal), 'Squad ditampilkan.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'jersey' => 'required',
            'name' => 'required',
            'position' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }

        $futsal = new Futsal();
        $futsal->jersey = $input['jersey'];
        $futsal->name = $input['name'];
        $futsal->position = $input['position'];
        $futsal->save();
        return $this->sendResponse(new FutsalResource($futsal), 'Data ditambahkan!');
    }


    public function show($id)
    {
        $futsal = Futsal::find($id);
        if (is_null($futsal)) {
            return $this->sendError('Data does not exist.');
        }
        return $this->sendResponse(new FutsalResource($futsal), 'Data ditampilkan.');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Futsal  $futsal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Futsal $futsal)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'jersey' => 'required',
            'name' => 'required',
            'position' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }

        $futsal->jersey = $input['jersey'];
        $futsal->name = $input['name'];
        $futsal->position = $input['position'];
        $futsal->save();

        return $this->sendResponse(new FutsalResource($futsal), 'Data updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Handphone  $handphone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Futsal $handphone)
    {
        $handphone->delete();
        return $this->sendResponse([], 'Data deleted');
    }
}
