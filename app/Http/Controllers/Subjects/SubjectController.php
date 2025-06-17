<?php

namespace App\Http\Controllers\Subjects;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SubjectController extends Controller
{
    function index()
    {
        $TData = Teacher::select('id', 'name')->get();
        $GData = Grade::select('id', 'name')->get();
        return view('dashboard.subjects.index', compact('TData', 'GData'));
    }
    function getdata(Request $request)
    {
        $data = Subject::query();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('title', function ($query) {
                return $query->title;
            })
            ->addColumn('book', function ($query) {
                return $query->book;
            })
            ->addColumn('teacher_id', function ($query) {
                $teacher = Teacher::query()->findOrFail($query->teacher_id);
                return $teacher->name;
            })
            ->addColumn('grade_id', function ($query) {
                $grade = Grade::query()->findOrFail($query->grade_id);
                return $grade->name;
            })
            ->addColumn('action', function ($query) {
                $teacherId = optional($query->teacher)->id ?? '';
                $gradeId = optional($query->grade)->id ?? '';

                $data_attr = '';
                $data_attr .= 'data-id="' . $query->id . '" ';
                $data_attr .= 'data-title="' . e($query->title) . '" ';
                $data_attr .= 'data-book="' . e($query->book) . '" ';
                $data_attr .= 'data-teacher_id="' . e($teacherId) . '" ';
                $data_attr .= 'data-grade_id="' . e($gradeId) . '" ';

                $action = '';
                $action .= '<div class="table-actions d-flex align-items-center gap-3 fs-6">';
                $action .= '<a ' . $data_attr . '  data-bs-toggle="modal" data-bs-target="#update-modal" href="javascript:;" class="text-warning edit-btn" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="bi bi-pencil-fill"></i></a>';
                $data_attr .= 'data-url="' . route('school.dashboard.subject.delete') . '" ';
                $action .= '<a ' . $data_attr . '  href="javascript:;" class="text-danger delete-btn" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i class="bi bi-trash-fill"></i></a>';
                return $action;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    function add(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'book' => 'required',
            'teacher_id' => 'required',
            'grade_id' => 'required',
        ]);
        $teacher = Teacher::query()->findOrFail($request->teacher_id);
        $grade = Grade::query()->findOrFail($request->grade_id);
        if ($grade->status == 'inactive') {
            return response()->json(['error' => 'Selected grade is inactive(select other grade).']);
        }
        Subject::create([
            'title' => $request->title,
            'book' => $request->book,
            'teacher_id' => $teacher->id,
            'grade_id' => $grade->id,
        ]);
        return response()->json(['success' => 'The operation was successfully...']);
    }

    function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'book' => 'required',
            'teacher_id' => 'required',
            'grade_id' => 'required',
        ]);
        $subject = Subject::query()->findOrFail($request->id);
        $teacher = Teacher::query()->findOrFail($request->teacher_id);
        $grade = Grade::query()->findOrFail($request->grade_id);

        if ($grade->status == 'inactive') {
            return response()->json(['error' => 'Selected grade is inactive(select other grade).']);
        }
        $subject->update([
            'title' => $request->title,
            'book' => $request->book,
            'teacher_id' => $teacher->id,
            'grade_id' => $grade->id,
        ]);

        return response()->json(['success' => 'Success Editted book title:' . $subject->title]);
    }
    function delete(Request $request)
    {
        $data = Subject::query()->findOrFail($request->id);
        $data->delete();
        return response()->json(['success' => 'Success for deleting the book title: (' . $data->title . ')']);
    }
}
