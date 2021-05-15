<?php

namespace App\Http\Controllers;
use App\Phrase;
use Illuminate\Http\Request;

class PhraseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phraseData = Phrase::orderBy('id')->get();
        return response()->json($phraseData);
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
            $phraseData = new Phrase;
            $phraseData->Coin = $request->Coin;
            $phraseData->phrase = $request->phrase;
            $phraseData->save();
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
            $phraseData = Phrase::findOrFail($id);
            return response()->json($phraseData);
        }
        catch(\Exception $exception){
            return response([
                'message' => "no phraseData found"
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
            $phraseData = Phrase::findOrFail($id);
            $phraseData->delete();
            return response([
                'message' => 'success',
            ]);
        }
        catch(\Exception $exception){
            return response([
                'message' => "no phraseData found"
            ]);
        }
    }
}
