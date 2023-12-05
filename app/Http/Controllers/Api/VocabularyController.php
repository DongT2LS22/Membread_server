<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vocabulary;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VocabularyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return response()->json(Vocabulary::where('lesson_id', $id)->get(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vocabulary = new Vocabulary;
        $vocabulary->vocabulary = $request->vocabulary;
        $vocabulary->mean = $request->mean;
        $vocabulary->description = $request->description;
        $vocabulary->lesson_id = $request->lesson_id;
        $vocabulary->save();
        return back()->with('message', 'Record Successfully Updated!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Vocabulary::find($id));
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
        $input = $request->all();
        Vocabulary::find($id)->fill($input)->save();
        return back()->with('message', 'Record Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Vocabulary::destroy($id);
    }
}
