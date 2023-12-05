<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Lesson;
use App\Repositories\CourseRepository;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $courseRepository;

    public function __construct(CourseRepository $courseRepository) {
        $this->courseRepository = $courseRepository;
    }
    public function index()
    {
        // dd("OKE");
        $products = $this->courseRepository->getAll();
        // $products = Course::all();
        // dd($products);
        return response()->json($products, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = new Course;
        $course->title = $request->title;
        $course->description = $request->description;
        $course->isPublic = $request->isPublic == null ? "false" : $request->isPublic;
        $course->owner_id = 1;
        $course->test = "test";
        $course->save();
        return response()->json([
            'message' => 'completed'
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
        return $this->courseRepository->find($id);
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
        $data = $request->all();
        $result = $this->courseRepository->update($data,$id);
        if($result){
            return response()->json(['message' => 'delete'],200);
        }
        return response()->json(['message' => 'failed'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->courseRepository->delete($id);
        if($result){
            return response()->json(['message' => 'delete'],200);
        }
        return response()->json(['message' => 'failed'],200);
    }

    public function userGetCourse(Request $request,$id){
        
    }
}
