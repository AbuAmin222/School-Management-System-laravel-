<?php

namespace App\Http\Controllers\Subjects;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Lecture;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SubjectController extends Controller
{
    function index()
    {
        $TData = Teacher::select('id', 'name')->distinct('title')->get(); // يضمن عدم تكرار العنوان
        $GData = Grade::select('id', 'name')->distinct('name')->get();
        return view('dashboard.subjects.index', compact('TData', 'GData'));
    }
    function getdata(Request $request)
    {
        $data = Subject::select('subjects.*', 'teachers.name as teacher_name', 'grades.name as grade_name')
            ->join('teachers', 'subjects.teacher_id', '=', 'teachers.id')
            ->join('grades', 'subjects.grade_id', '=', 'grades.id');

        return DataTables::of($data)
            ->filter(function ($query) use ($request) {
                if ($request->filled('title')) {
                    $query->where('subjects.title', 'like', '%' . $request->title . '%');
                }

                if ($request->filled('book')) {
                    $query->where('subjects.book', 'like', '%' . $request->book . '%');
                }

                if ($request->filled('teacher')) {
                    $query->where('subjects.teacher_id', $request->teacher); // من قائمة المعلمين
                }

                if ($request->filled('grade')) {
                    $query->where('subjects.grade_id', $request->grade); // من قائمة الصفوف
                }
            })
            ->addIndexColumn()
            ->addColumn('title', function ($query) {
                return $query->title;
            })
            ->addColumn('book', function ($query) {
                if ($query->book) {
                    $url = route('school.dashboard.subject.download', ['file_name' => $query->book]);
                    $fileName = basename($query->book); // Get just the file name
                    return '<a href="' . $url . '" class="btn btn-outline-info" download="' . e($fileName) . '">' . e($fileName) . '</a>';
                } else {
                    return '<span class="btn btn-outline-light">No File</span>';
                }
            })
            ->addColumn('lecture', function ($query) {
                return '<a href="' . route('school.dashboard.subject.course_lecture', $query->id) . '" class="btn btn-outline-success"> Course Lectures </a>';
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
            ->rawColumns(['title', 'lecture', 'book', 'teacher_id', 'grade_id', 'action'])
            ->make(true);
    }
    function add(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'book' => 'required|mimes:pdf,doc,docx,epub,mobi,txt|max:5120',
            'teacher_id' => 'required',
            'grade_id' => 'required',
        ], [
            'title.required' => 'The Title is required',
            'book.required' => 'The Book is required',
            'book.mimes' => 'The Book must be a pdf, doc, docx, epub, mobi, txt file',
            'teacher_id.required' => 'The Teacher is required',
            'grade_id.required' => 'The Grade is required',
        ]);

        $name = 'LearnSchool_' . time() . '_' . rand() . $request->file('book')->getClientOriginalName();
        $request->file('book')->move(public_path('uploads\books'), $name);


        $teacher = Teacher::query()->findOrFail($request->teacher_id);
        $grade = Grade::query()->findOrFail($request->grade_id);

        if ($grade->status == 'inactive') {
            return response()->json(['error' => 'The Garde was selected is inactive(Please select grade active).']);
        }
        Subject::create([
            'title' => $request->title,
            'book' => $name,
            'teacher_id' => $teacher->id,
            'grade_id' => $grade->id,
        ]);
        return response()->json(['success' => 'Subject ( ' . $request->title . ') added successfully...']);
    }

    function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'book' => 'required|mimes:pdf,doc,docx,epub,mobi,txt|max:5120',
            'teacher_id' => 'required',
            'grade_id' => 'required',
        ], [
            'title.required' => 'The Title is required',
            'book.required' => 'The Book is required',
            'book.mimes' => 'The Book must be a pdf, doc, docx, epub, mobi, txt file',
            'teacher_id.required' => 'The Teacher is required',
            'grade_id.required' => 'The Grade is required',
        ]);

        $name = 'LearnSchool_' . time() . '_' . rand() . $request->file('book')->getClientOriginalName();
        $request->file('book')->move(public_path('uploads\books'), $name);


        $subject = Subject::query()->findOrFail($request->id);
        $teacher = Teacher::query()->findOrFail($request->teacher_id);
        $grade = Grade::query()->findOrFail($request->grade_id);

        if ($grade->status == 'inactive') {
            return response()->json(['error' => 'Selected grade is inactive(select other grade).']);
        }

        $subject->update([
            'title' => $request->title,
            'book' => $name,
            'teacher_id' => $teacher->id,
            'grade_id' => $grade->id,
        ]);

        return response()->json(['success' => 'Subject ( ' . $request->title . ') edited successfully...']);
    }
    function delete(Request $request)
    {
        $data = Subject::query()->findOrFail($request->id);
        $data->delete();
        return response()->json(['success' => 'Success for deleting the book title: (' . $data->title . ')']);
    }

    function download($file_name)
    {
        $path = public_path('uploads/books/' . $file_name);
        if (file_exists($path)) {
            return response()->download($path);
        }

        abort(404, 'File not found.');
        return response()->json(['error' => 'File not found.']);
    }
    function course_lecture($id)
    {
        $subject_data = Subject::query()->findOrFail($id);
        $teacher_data = Teacher::query()->get();
        return view('dashboard.subjects.lectures', compact('subject_data', 'teacher_data'));
    }

    function getdatalectures(Request $request)
    {
        $subject_data = Subject::query()->findOrFail($request->id);
        $data = Lecture::select('lectures.*', 'subjects.title as subject_title', 'teachers.name as teacher_name')
            ->join('subjects', 'subjects.id', '=', 'lectures.subject_id')
            ->join('teachers', 'teachers.id', '=', 'lectures.teacher_id')
            ->where('subjects.title', $subject_data->title);
        return DataTables::of($data)
            ->filter(function ($query) use ($request) {
                // Map request keys to DB columns
                $filters = [
                    'title'       => 'lectures.title',
                    'describtion' => 'lectures.describtion',
                    'teacher_name'     => 'teachers.name',
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
            ->addColumn('lecture_link', function ($query) {
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
                return $query->teacher_name;
            })
            ->rawColumns(['title', 'describtion', 'lecture_link', 'subject_id', 'teacher'])
            ->make(true);
    }
}
