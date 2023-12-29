<?php

namespace App\Http\Controllers;

use App\Http\Requests\Instructor\Courses\StoreRequest;
use App\Models\Category;
use App\Models\CourseGoal;
use App\Models\Courses;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $courses = $user->courses;
        return view('instructor.courses.index', compact('courses'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('instructor.courses.create', compact('categories'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $data['instructor_id'] = Auth::user()->id;
        $data['name_slug'] = strtolower(str_replace(' ', '-', $data['name']));
        $data['status'] = 1;
        $image = $data['image'];
        $data['image'] = 'upload/courses/thumbnail/image_'. time() . '.' . $data['image']->getClientOriginalExtension();
        $image->move(public_path('upload/courses/thumbnail'), $data['image']);

        $video = $data['video'];
        $data['video'] = 'upload/courses/video/video_'. time() . '.' . $data['video']->getClientOriginalExtension();
        $video->move(public_path('upload/courses/video'), $data['video']);

        $course = Courses::create($data);

    //Course Goals Add
        $goalsCount = count($request->course_goals);

        if ($goalsCount != 0){
            $goals = new CourseGoal();
            for ($i = 0; $i < $goalsCount; $i++){
                $goals = new CourseGoal();
                $goals->course_id = $course->id;
                $goals->goal = $request->course_goals[$i];
                $goals->save();
            }
        }
    //Course Goals End

    $notification = [
        'message' => 'Course Inserted Successfully',
        'alert-type' => 'success'
    ];

        return redirect()->route('instructor.course.index')->with($notification);
    }


    public function getSubCategories($category_id)
    {
        $subcat = SubCategory::where('category_id', $category_id)->orderBy('title', 'ASC')->get();
        return json_encode($subcat);
    }
}
