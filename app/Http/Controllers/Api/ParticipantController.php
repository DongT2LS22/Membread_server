<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Repositories\ParticipantRepository;
class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $participantRepository;


    public function __construct(ParticipantRepository $participantRepository){
        $this->participantRepository = $participantRepository;
    }
    public function index()
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
        $result = $this->participantRepository->create($request->all());
        if($result){
        return response()->json([
            'message' => 'completed'
        ]);}
        return response()->json([
            'message'=> 'failed'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $participant = $this->participantRepository->find($id);
        $course = Course::find($participant->course_id);
        // dd($course->title, $course->description,$course,$course->lessons);
        $lessons = $course->lessons;
        
        if($participant){
            return response()->json($participant,200);
        }   
        return response()->json([
            "message" => "not found"
        ]);   
    }

    /**
     * Add the new progress resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $result = $this->participantRepository->updateProgressCourse($id, $data);
        if($result){
            return response()->json(["message"=>"success"]);
        }
        return response()->json(["message" => "not found"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->participantRepository->delete($id);
        if($result){
            return response()->json(["message"=>"success"]);
        }
        return response()->json(["message" => "not found"]);
    }

    public function updateProgress(Request $request)
    {
        
    }
}
