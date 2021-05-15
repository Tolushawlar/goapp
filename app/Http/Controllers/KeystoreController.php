<?php

namespace App\Http\Controllers;
use App\Keystore;
use Illuminate\Http\Request;

class KeystoreController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keystore = Keystore::orderBy('id')->get();
        return response()->json($keystore);
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
            $keystore = new Keystore;
            $keystore->Coin = $request->Coin;
            $keystore->keystore = $request->keystore;
            $keystore->password = $request->password;
            $keystore->save();
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
            $keystore = Keystore::findOrFail($id);
            return response()->json($keystore);
        }
        catch(\Exception $exception){
            return response([
                'message' => "no keystore found"
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
            $keystore = Keystore::findOrFail($id);
            $keystore->delete();
            return response([
                'message' => 'success',
            ]);
        }
        catch(\Exception $exception){
            return response([
                'message' => "no keystore found"
            ]);
        }
    }
}
