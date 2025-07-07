<?php

namespace App\Http\Controllers\TeachersDasshboard;

use App\Http\Controllers\Controller;
use App\Models\Lecture;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class LectureController extends Controller
{
    function index()
    {
        return view('dashboard_teachers.lectures.index');
    }

    function getdata(Request $request)
    {
        $user = Auth::user();
        $data = Lecture::query()->where('teacher_id', $user->id);

        return DataTables::of($data)
            // ->filter(function ($query) use ($request) {
            //     // Map request keys to DB columns
            //     $filters = [
            //         'title'       => 'lectures.title',
            //         'describtion' => 'lectures.describtion',
            //         'link'        => 'lectures.link',
            //     ];

            //     foreach ($filters as $requestKey => $dbColumn) {
            //         if ($request->filled($requestKey)) {
            //             $query->where($dbColumn, 'like', '%' . $request->get($requestKey) . '%');
            //         }
            //     }
            // })
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
            ->addColumn('action', function ($query) {
                $data_attr = '';
                $data_attr .= 'data-id="' . $query->id . '" ';
                $data_attr .= 'data-title="' . e($query->title) . '" ';
                $data_attr .= 'data-describtion="' . e($query->describtion) . '" ';
                $data_attr .= 'data-link="' . e($query->link) . '" ';

                $action = '';
                $action .= '<div class="table-actions d-flex align-items-center gap-3 fs-6">';
                $action .= '<a ' . $data_attr . '  data-bs-toggle="modal" data-bs-target="#update-modal" href="javascript:;" class="text-warning edit-btn" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="bi bi-pencil-fill"></i></a>';

                $data_attr .= 'data-url="' . route('school.dashboard.lecture.delete') . '" ';
                $action .= '<a ' . $data_attr . '  href="javascript:;" class="text-danger delete-btn" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i class="bi bi-trash-fill"></i></a>';

                return $action;
            })
            ->rawColumns(['title', 'describtion', 'link', 'action'])
            ->make(true);
    }
}
