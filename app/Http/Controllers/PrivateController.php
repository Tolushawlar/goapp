<?php

namespace App\Http\Controllers;
use App\Privatekey;
use Illuminate\Http\Request;

class PrivateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $private = PrivateKey::orderBy('id')->get();
        return response()->json($private);
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
        try{
            $private = new Privatekey;
            $private->Coin = $request->Coin;
            $private->privateKey = $request->privateKey;
            $private->save();
            return response([
                'message' => 'success',
            ]);
        }
        catch(\Exception $exception){
            return response([
                'message' => $exception->getMessage()
                //'message' => "missing entry"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $private = PrivateKey::findOrFail($id);
            return response()->json($private);
        }
        catch(\Exception $exception){
            return response([
                'message' => "no private found"
            ]);
        }
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
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $private = PrivateKey::findOrFail($id);
            $private->delete();
            return response([
                'message' => 'success',
            ]);
        }
        catch(\Exception $exception){
            return response([
                'message' => "no private found"
            ]);
        }
    }
}
