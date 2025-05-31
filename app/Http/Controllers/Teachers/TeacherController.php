<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class TeacherController extends Controller
{
    function index()
    {
        return view('dashboard.teachers.index');
    }
    function getdata(Request $request)
    {
        $data = Teacher::query();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('name', function ($query) {
                return $query->name;
            })
            ->addColumn('phone', function ($query) {
                return $query->phone;
            })
            ->addColumn('email', function ($query) {
                return $query->user->email;
            })
            ->addColumn('specialization', function ($query) {
                return $query->specialization;
            })
            ->addColumn('date_of_birth', function ($query) {
                return $query->date_of_birth;
            })
            ->addColumn('hire_date', function ($query) {
                return $query->hire_date;
            })
            ->addColumn('qualification', function ($query) {
                return $query->getQualifications($query->qualification);
            })
            ->addColumn('gender', function ($query) {
                if ($query->gender == 'male')
                    return '<span class="badge bg-info text-light">Male</span>';
                else
                    return '<span class="badge text-light" style="background-color:rgb(218, 99, 145);">Female</span>';
            })
            ->addColumn('status', function ($query) {
                if ($query->status == 'active') {
                    return '<span class="badge bg-success text-light">Active</span>';
                } else {
                    return '<span class="badge bg-secondary text-light">In-Active</span>';
                }
            })
            ->addColumn('action', function ($query) {
                $data_attr = '';
                $data_attr .= 'data-id="' . $query->id . '" ';
                $data_attr .= 'data-name="' . $query->name . '" ';
                $data_attr .= 'data-email="' . $query->user->email . '" ';
                $data_attr .= 'data-phone="' . $query->phone . '" ';
                $data_attr .= 'data-specialization="' . $query->specialization . '" ';
                $data_attr .= 'data-date-of-birth="' . $query->date_of_birth . '" ';
                $data_attr .= 'data-hire-date="' . $query->hire_date . '" ';
                $data_attr .= 'data-qualification="' . $query->qualification . '" ';
                $data_attr .= 'data-gender="' . $query->gender . '" ';
                $data_attr .= 'data-status="' . $query->status . '" ';

                $action = '';
                $action .= '<div class="table-actions d-flex align-items-center gap-3 fs-6">';
                $action .= '<a ' . $data_attr . ' href="javascript:;" class="text-warning update_btn" data-bs-toggle="modal" data-bs-target="#update-modal" title="Edit">
                                <i class="bi bi-pencil-fill"></i>
                            </a>';
                if ($query->status == 'active') {
                    $action .= '<a data-id="' . $query->id . '" data-url="' . route('school.dashboard.teacher.delete') . '" href="javascript:;" class="text-danger delete-btn" title="Delete" data-bs-toggle="tooltip" data-bs-placement="bottom">
                                <i class="bi bi-trash-fill"></i>
                            </a>';
                } else {
                    $action .= '<a data-id="' . $query->id . '" data-url="' . route('school.dashboard.teacher.active') . '" href="javascript:;" class="text-success active-btn" title="Activate" data-bs-toggle="tooltip" data-bs-placement="bottom">
                                <i class="fadIn animated bx bx-check-square"></i>
                            </a>';
                }


                $action .= '</div>';
                return $action;
            })
            ->rawColumns(['gender', 'status', 'action'])
            ->make(true);
    }

    function add(Request $request)
    {

        $request->validate([
            'name' =>   'required',
            'email' =>  'required',
            'phone' =>  'required',
            'specialization' => 'required',
            'date_of_birth' => 'required',
            'hire_date' => 'required',
            'qualification' => 'required',
            'gender' => 'required',
        ]);
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->phone),
        ]);
        Teacher::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'phone' => $request->phone,
            'specialization' => $request->specialization,
            'date_of_birth' => $request->date_of_birth,
            'hire_date' => $request->hire_date,
            'qualification' => $request->qualification,
            'gender' => $request->gender,
            'status' => $request->status,
        ]);

        return response()->json(['success' => 'The operation was successfully...']);
    }
    function update(Request $request)
    {
        $teatcher = Teacher::query()->findOrFail($request->id);
        $user = User::query()->findOrFail($teatcher->user_id);

        $request->validate([
            'name' =>   'required',
            'email' =>  ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'phone' =>  ['required', Rule::unique('teachers', 'phone')->ignore($request->id)],
            'specialization' => 'required',
            'date_of_birth' => 'required',
            'hire_date' => 'required',
            'qualification' => 'required',
            'gender' => 'required',
        ]);

        $user->update([
            'email' => $request->email,
        ]);
        $teatcher->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'specialization' => $request->specialization,
            'date_of_birth' => $request->date_of_birth,
            'hire_date' => $request->hire_date,
            'qualification' => $request->qualification,
            'gender' => $request->gender,
            'status' => $request->status,
        ]);

        return response()->json(['success' => 'The operation was successfully...']);
    }

    function delete(Request $request)
    {
        $teacher = Teacher::query()->findOrFail($request->id);
        if ($teacher) {
            $teacher->update([
                'status' => 'inactive',
            ]);
        }
        return response()->json(['success' => 'The operation was successfully...']);
    }
    function active(Request $request)
    {
        $teacher = Teacher::query()->findOrFail($request->id);
        if ($teacher) {
            $teacher->update([
                'status' => 'active',
            ]);
        }
        return response()->json(['success' => 'The operation was successfully...']);
    }
}
