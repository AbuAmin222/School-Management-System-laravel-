<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class StudentController extends Controller
{
    function index()
    {
        $sections = Section::select('name', 'id')->get();
        $grades = Grade::select('name', 'id')->get();
        return view('dashboard.students.index', compact('sections', 'grades'));
    }
    function getdata(Request $request)
    {
        $data = Student::query();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('full_name', function ($query) {
                return $query->first_name . ' ' . $query->parent_name . ' ' . $query->last_name;
            })
            ->addColumn('parent_phone', function ($query) {
                return $query->parent_phone;
            })
            ->addColumn('date_of_birth', function ($query) {
                return $query->date_of_birth;
            })
            ->addColumn('email', function ($query) {
                return $query->user->email;
            })
            ->addColumn('section_id', function ($query) {
                return $query->section->name;
            })
            ->addColumn('grade_id', function ($query) {
                return $query->grade->name;
            })
            ->addColumn('gender', function ($query) {
                return $query->gender;
            })
            ->addColumn('action', function ($query) {
                $data_attr = '';
                $data_attr .= 'data-id="' . $query->id . '" ';
                $data_attr .= 'data-first_name="' . e($query->first_name) . '" ';
                $data_attr .= 'data-parent_name="' . e($query->parent_name) . '" ';
                $data_attr .= 'data-last_name="' . e($query->last_name) . '" ';
                $data_attr .= 'data-parent_phone="' . e($query->parent_phone) . '" ';
                $data_attr .= 'data-date_of_birth="' . e($query->date_of_birth) . '" ';
                $data_attr .= 'data-email="' . e($query->user->email) . '" ';
                $data_attr .= 'data-section="' . e($query->section->id) . '" ';
                $data_attr .= 'data-grade="' . e($query->grade->id) . '" ';
                $data_attr .= 'data-gender="' . e($query->gender) . '" ';

                $action = '';
                $action .= '<div class="table-actions d-flex align-items-center gap-3 fs-6">';
                $action .= '<a ' . $data_attr . '  data-bs-toggle="modal" data-bs-target="#update-modal" href="javascript:;" class="text-warning edit-btn" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="bi bi-pencil-fill"></i></a>';
                $data_attr .= 'data-url="' . route('school.dashboard.student.delete') . '" ';
                $action .= '<a ' . $data_attr . '  href="javascript:;" class="text-danger delete-btn" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i class="bi bi-trash-fill"></i></a>';
                return $action;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    function add(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'parent_name' => 'required',
            'last_name' => 'required',
            'parent_phone' => 'required',
            'date_of_birth' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'section' => 'required',
            'grade' => 'required',
            'gender' => 'required',
        ], [
            'first_name.required' => 'The First Name is required',
            'parent_name.required' => 'The Parent Name is required',
            'last_name.required' => 'The Last Name is required',
            'parent_phone.required' => 'The Parent Phone is required',
            'date_of_birth.required' => 'The Date Of Birth is required',
            'email.required' => 'The Email is required',
            'email.email' => 'The Email must be a valid email address',
            'email.unique' => 'The Email has already been taken',
            'password.required' => 'The Password is required',
            'section.required' => 'The Section is required',
            'grade.required' => 'The Grade is required',
            'gender.required' => 'The Gender is required',
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $section = Section::query()->findOrFail($request->section);
        $grade = Grade::query()->findOrFail($request->grade);

        Student::create([
            'first_name' => $request->first_name,
            'parent_name' => $request->parent_name,
            'last_name' => $request->last_name,
            'parent_phone' => $request->parent_phone,
            'date_of_birth' => $request->date_of_birth,
            'user_id' => $user->id,
            'section_id' => $section->id,
            'grade_id' => $grade->id,
            'gender' => $request->gender,
        ]);

        return response()->json(['success' => 'Adding student was successfully...']);
    }

    function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'parent_name' => 'required',
            'last_name' => 'required',
            'parent_phone' => 'required',
            'date_of_birth' => 'required',
            'email' => 'required|email|unique:users,email,',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
            'section' => 'required',
            'grade' => 'required',
            'gender' => 'required',
        ], [
            'first_name.required' => 'The First Name is required',
            'parent_name.required' => 'The Parent Name is required',
            'last_name.required' => 'The Last Name is required',
            'parent_phone.required' => 'The Parent Phone is required',
            'date_of_birth.required' => 'The Date Of Birth is required',
            'email.required' => 'The Email is required',
            'email.email' => 'The Email must be a valid email address',
            'email.unique' => 'The Email has already been taken',
            'new_password.required' => 'The New Password is required',
            'confirm_password.required' => 'The Confirm Password is required',
            'section.required' => 'The Section is required',
            'grade.required' => 'The Grade is required',
            'gender.required' => 'The Gender is required',
        ]);

        $user = User::query()->findOrFail($request->id);

        $user->update([
            'email' => $request->email,
            'new_password' => Hash::make($request->password),
        ]);
        $section = Section::query()->findOrFail($request->section);
        $grade = Grade::query()->findOrFail($request->grade);

        $student = Student::query()->findOrFail($request->id);
        $student->update([
            'first_name' => $request->first_name,
            'parent_name' => $request->parent_name,
            'last_name' => $request->last_name,
            'parent_phone' => $request->parent_phone,
            'date_of_birth' => $request->date_of_birth,
            'user_id' => $user->id,
            'section_id' => $section->id,
            'grade_id' => $grade->id,
            'gender' => $request->gender,
        ]);

        return response()->json(['success' => 'Updating student was successfully...']);
    }

    function delete(Request $request)
    {
        $student = Student::query()->findOrFail($request->id);
        $student->delete();

        return response()->json(['success' => 'Deleting student was successfully...']);
    }
}
