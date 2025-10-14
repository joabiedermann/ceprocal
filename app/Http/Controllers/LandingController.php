<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use App\Models\Course;
use App\Models\CourseStudent;

class LandingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index () 
    {
        return view('landings.index');
    }

    public function search_course(Request $request) 
    {
        try {
            if ($request->curso == '') {
                return back();
            }
            $courses = Course::with('teacher')->where('name', 'LIKE', '%' . str_replace(' ', '%', $request->curso) . '%')->where('status', '1')->get();

            return view('landings.courses')->with(compact('courses'));

        } catch (\Exception $e) {
            return back();
        }
    }

    public function show_course($id) 
    {
        try {
            $course = Course::with('modules', 'teacher')->findOrFail($id);

            return view('landings.show_course')->with(compact('course'));

        } catch (\Exception $e) {
            return back();
        }
    }

    public function verificate_certificate($student, $course, $hash) 
    {
        try {
            $course_student = CourseStudent::where('course_id', $course)->where('student_id', $student)->first();
            if ($course_student) {
                dd(Hash::check($course_student->hash_certificate, $hash));
            } else {
                dd('hola');
            }

        } catch (\Exception $e) {
            return back();
        }
    }
}