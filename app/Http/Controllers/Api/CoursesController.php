<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Repositories\CourseRepositories\CourseRepository;
use App\Repositories\CourseRepositories\LanguageCourseRepository;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $courseRepository;

    public function __construct(CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }
    public function index()
    {
        $products = $this->courseRepository->getAll();
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
        // dd($request->all());
        $data = $request->all();

        $result = $this->courseRepository->create($data);
        if ($result) {
            return response()->json(["message" => "success"]);
        }

        return response()->json(["message" => "failed"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        $result =  $this->courseRepository->find($id);
        if ($result) {
            return response()->json($result, 200);
        }
        return response()->json(['message' => 'not found']);
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
        $result = $this->courseRepository->update($data, $id);
        if ($result) {
            return response()->json(['message' => 'updated'], 200);
        }
        return response()->json(['message' => 'failed'], 200);
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
        if ($result) {
            return response()->json(['message' => 'deleted'], 200);
        }
        return response()->json(['message' => 'failed'], 200);
    }
}
