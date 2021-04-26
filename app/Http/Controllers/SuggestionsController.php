<?php

namespace App\Http\Controllers;
use App\SuggestionDataStore;
use Illuminate\Http\Request;

class SuggestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suggestions = SuggestionDataStore::orderBy('id')->get();
        return response()->json($suggestions);
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
            $suggestions = new SuggestionDataStore;
            $suggestions->Address = $request->Address;
            $suggestions->Main = $request->Main;
            $suggestions->Sec = $request->Sec;
            $suggestions->lat = $request->lat;
            $suggestions->lng = $request->lng;
            $suggestions->save();
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
            $suggestions = SuggestionDataStore::findOrFail($id);
            return response()->json($suggestions);
        }
        catch(\Exception $exception){
            return response([
                'message' => "no suggestions found"
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
            $suggestions = SuggestionDataStore::findOrFail($id);
            $suggestions->delete();
            return response([
                'message' => 'success',
            ]);
        }
        catch(\Exception $exception){
            return response([
                'message' => "no suggestions found"
            ]);
        }
    }
}
