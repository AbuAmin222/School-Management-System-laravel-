<?php

namespace App\Http\Controllers\Lectures;

use App\Http\Controllers\Controller;
use App\Models\Lecture;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LectureController extends Controller
{
    function index()
    {
        $data = Subject::all();
        $dataTeacher = Teacher::all();
        return view('dashboard.lectures.index', compact('data', 'dataTeacher'));
    }
    function getdata(Request $request)
    {
        $data = Lecture::select('lectures.*', 'subjects.title as subject_title', 'teachers.name as teacher')
            ->join('subjects', 'subjects.id', '=', 'lectures.subject_id')
            ->join('teachers', 'teachers.id', '=', 'lectures.teacher_id');
        return DataTables::of($data)
            ->filter(function ($query) use ($request) {
                // Map request keys to DB columns
                $filters = [
                    'title'       => 'lectures.title',
                    'describtion' => 'lectures.describtion',
                    'link'        => 'lectures.link',
                    'subject_id'  => 'lectures.subject_id',
                    'teacher'     => 'teachers.name',
                ];

                foreach ($filters as $requestKey => $dbColumn) {
                    if ($request->filled($requestKey)) {
                        $query->where($dbColumn, 'like', '%' . $request->get($requestKey) . '%');
                    }
                }

            })
            ->addIndexColumn()
            ->addColumn('title', function ($query) {
                return $query->title;
            })
            ->addColumn('describtion', function ($query) {
                return $query->describtion;
            })
            ->addColumn('link', function ($query) {
                return '
                    <a href="' . $query->link . '" target="_blank" rel="noopener noreferrer"
                        class="btn btn-sm btn-outline-primary d-inline-flex align-items-center gap-1">
                        <i class="bi bi-play-circle-fill"></i> Show Lecture
                    </a>
                ';
            })
            ->addColumn('subject_id', function ($query) {
                return $query->subject_title;
            })
            ->addColumn('teacher', function ($query) {
                return $query->teacher;
            })
            ->addColumn('action', function ($query) {
                $data_attr = '';
                $data_attr .= 'data-id="' . $query->id . '" ';
                $data_attr .= 'data-title="' . e($query->title) . '" ';
                $data_attr .= 'data-describtion="' . e($query->describtion) . '" ';
                $data_attr .= 'data-link="' . e($query->link) . '" ';
                $data_attr .= 'data-subject_id="' . e($query->subject_id) . '" ';

                $action = '';
                $action .= '<div class="table-actions d-flex align-items-center gap-3 fs-6">';
                $action .= '<a ' . $data_attr . '  data-bs-toggle="modal" data-bs-target="#update-modal" href="javascript:;" class="text-warning edit-btn" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="bi bi-pencil-fill"></i></a>';

                $data_attr .= 'data-url="' . route('school.dashboard.lecture.delete') . '" ';
                $action .= '<a ' . $data_attr . '  href="javascript:;" class="text-danger delete-btn" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i class="bi bi-trash-fill"></i></a>';

                return $action;
            })
            ->rawColumns(['title', 'describtion', 'link', 'subject_id', 'teacher', 'action'])
            ->make(true);
    }

    function add(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'describtion' => 'required',
            'link' => ['required', 'url', 'regex:/^https:\/\/.*/i'],
            'subject_id' => 'required',
            'teacher' => 'required',
        ], [
            'title.required' => 'The Title is required',
            'describtion.required' => 'The Describtion is required',
            'link.required' => 'The Link is required',
            'link.url' => 'The Link must be a valid url',
            'subject_id.required' => 'The Subject is required',
            'teacher.required' => 'The Teacher is required',
        ]);

        $subject = Subject::query()->findOrFail($request->subject_id);
        $teacher = Teacher::query()->findOrFail($request->teacher);

        Lecture::create([
            'title' => $request->title,
            'describtion' => $request->describtion,
            'link' => $request->link,
            'subject_id' => $subject->id,
            'teacher_id' => $teacher->id
        ]);
        return response()->json(['success' => 'Success for adding new lecture:' . $request->title . '.']);
    }

    function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'describtion' => 'required',
            'link' => 'required',
            'link' => ['required', 'url', 'regex:/^https:\/\/.*/i'],
            'subject_id' => 'required',
            'teacher' => 'required',
        ], [
            'title.required' => 'The Title is required',
            'describtion.required' => 'The Describtion is required',
            'link.required' => 'The Link is required',
            'link.url' => 'The Link must be a valid url',
            'subject_id.required' => 'The Subject is required',
            'teacher.required' => 'The Teacher is required',
        ]);

        $subject = Subject::query()->findOrFail($request->subject_id);
        $lecture = Lecture::query()->findOrFail($request->id);
        $teacher = Teacher::query()->findOrFail($request->teacher);

        $lecture->update([
            'title' => $request->title,
            'describtion' => $request->describtion,
            'link' => $request->link,
            'subject_id' => $subject->id,
            'teacher_id' => $teacher->id
        ]);

        return response()->json(['success' => 'Success for updating the lecture:' . $lecture->title]);
    }

    function delete(Request $request)
    {
        $data = Lecture::query()->findOrFail($request->id);
        $data->delete();
        return response()->json(['success' => 'Success for deleting the lecture title: (' . $data->title . ')']);
    }
}
