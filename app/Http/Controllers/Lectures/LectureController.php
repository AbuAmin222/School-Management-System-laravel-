<?php

namespace App\Http\Controllers\Lectures;

use App\Http\Controllers\Controller;
use App\Models\Lecture;
use App\Models\Subject;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LectureController extends Controller
{
    function index()
    {
        $data = Subject::all();
        return view('dashboard.lectures.index', compact('data'));
    }
    function getdata(Request $request)
    {
        $data = Lecture::query();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('title', function ($query) {
                return $query->title;
            })
            ->addColumn('describtion', function ($query) {
                return $query->describtion;
            })
            ->addColumn('link', function ($query) {
                return $query->link;
            })
            ->addColumn('subject_id', function ($query) {
                return $query->subject->title;
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
            ->make(true);
    }

    function add(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'describtion' => 'required',
            'link' => 'required',
            'subject_id' => 'required'
        ], [
            'title.required' => 'The Title is required',
            'describtion.required' => 'The Describtion is required',
            'link.required' => 'The Link is required',
            'subject_id.required' => 'The Subject is required',
        ]);

        $subject = Subject::query()->findOrFail($request->subject_id);

        Lecture::create([
            'title' => $request->title,
            'describtion' => $request->describtion,
            'link' => $request->link,
            'subject_id' => $subject->id,
        ]);
        return response()->json(['success' => 'Success for adding new lecture:' . $request->title . '.']);
    }

    function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'describtion' => 'required',
            'link' => 'required',
            'subject_id' => 'required'
        ], [
            'title.required' => 'The Title is required',
            'describtion.required' => 'The Describtion is required',
            'link.required' => 'The Link is required',
            'subject_id.required' => 'The Subject is required',
        ]);

        $subject = Subject::query()->findOrFail($request->subject_id);
        $lecture = Lecture::query()->findOrFail($request->id);

        $lecture->update([
            'title' => $request->title,
            'describtion' => $request->describtion,
            'link' => $request->link,
            'subject_id' => $subject->id,
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
