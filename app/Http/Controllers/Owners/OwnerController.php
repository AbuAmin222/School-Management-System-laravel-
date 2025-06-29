<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class OwnerController extends Controller
{
    public function index()
    {
        return view('dashboard.Owners.index');
    }

    public function getdata(Request $request)
    {
        $data = Owner::select('owners.*', 'users.email')
            ->join('users', 'owners.user_id', '=', 'users.id');
        return DataTables::of($data)
            ->filter(function ($query) use ($request) {
                $filters = [
                    'username',
                    'email',
                    'phone',
                    'address',
                    'permission',
                    'status'
                ];
                foreach ($filters as $field) {
                    if ($request->filled($field)) {
                        $query->where($field, 'like', '%' . $request->get($field) . '%');
                    }
                }
                if ($request->filled('email')) {
                    $query->where('users.email', 'like', '%' . $request->get('email') . '%');
                }
            })
            ->addIndexColumn()
            ->addColumn('image', function ($query) {
                $url = asset('uploads/owners/' . $query->image); // adjust the path as needed
                return '<img src="' . $url . '" width="50" height="50" class="rounded-circle"/>';
            })
            ->addColumn('username', function ($query) {
                return $query->username;
            })
            ->addColumn('email', function ($query) {
                return $query->user->email;
            })
            ->addColumn('phone', function ($query) {
                return $query->phone;
            })
            ->addColumn('address', function ($query) {
                return $query->address;
            })
            ->addColumn('permission', function ($query) {
                return $query->permission;
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
                $data_attr .= 'data-image="' . $query->image . '" ';
                $data_attr .= 'data-username="' . $query->username . '" ';
                $data_attr .= 'data-email="' . $query->user->email . '" ';
                $data_attr .= 'data-phone="' . $query->phone . '" ';
                $data_attr .= 'data-address="' . $query->address . '" ';
                $data_attr .= 'data-permission="' . $query->permission . '" ';
                $data_attr .= 'data-status="' . $query->status . '" ';
                $data_attr .= 'data-user_id="' . $query->user->id . '" ';

                $action = '';
                $action .= '<div class="table-actions d-flex align-items-center gap-3 fs-6">';
                $action .= '<a ' . $data_attr . ' href="javascript:;" class="text-warning update_btn" data-bs-toggle="modal" data-bs-target="#update-modal" title="Edit">
                                <i class="bi bi-pencil-fill"></i>
                            </a>';
                if ($query->status == 'active') {
                    $action .= '<a data-id="' . $query->id . '" data-url="' . route('school.dashboard.owner.delete') . '" href="javascript:;" class="text-danger delete-btn" title="Delete" data-bs-toggle="tooltip" data-bs-placement="bottom">
                                <i class="bi bi-trash-fill"></i>
                            </a>';
                } else {
                    $action .= '<a data-id="' . $query->id . '" data-url="' . route('school.dashboard.owner.active') . '" href="javascript:;" class="text-success active-btn" title="Activate" data-bs-toggle="tooltip" data-bs-placement="bottom">
                                <i class="fadIn animated bx bx-check-square"></i>
                            </a>';
                }


                $action .= '</div>';
                return $action;
            })
            ->rawColumns(['image', 'status', 'action'])
            ->make(true);
    }

    public function add(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|unique:users,email,except,id',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'phone' => 'required',
            'address' => 'required',
            'permission' => 'required',
            'status' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'username.required' => 'The Username is required',
            'email.required' => 'The Email is required',
            'email.unique' => 'The Email already exists',
            'password.required' => 'The Password is required',
            'confirm_password.required' => 'The Confirm Password is required',
            'phone.required' => 'The Phone is required',
            'address.required' => 'The Address is required',
            'permission.required' => 'The Permission is required',
            'status.required' => 'The Status is required',
            'image.required' => 'The Image is required',
            'image.image' => 'The Image must be an image',
            'image.mimes' => 'The Image must be a file of type: jpg, jpeg, png',
            'image.max' => 'The Image may not be greater than 2MB',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/owners'), $imageName); // Save to public/uploads/owners
        }

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Owner::create([
            'user_id' => $user->id,
            'username' => $request->username,
            'phone' => $request->phone,
            'address' => $request->address,
            'permission' => $request->permission,
            'status' => $request->status,
            'image' => $imageName,
        ]);

        return response()->json(['success' => 'Owner (' . $request->username . ') added successfully...']);
    }


    public function update(Request $request)
    {
        $request->validate([
            'username' => 'nullable',
            'email' => 'nullable',
            'password' => 'nullable',
            'confirm_password' => 'nullable|same:password',
            'phone' => ['nullable', Rule::unique('owners', 'phone')->ignore($request->id)],
            'address' => 'nullable',
            'permission' => 'nullable',
            'status' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'username.required' => 'The Username is required',
            'email.required' => 'The Email is required',
            'email.email' => 'The Email must be a valid email address',
            'email.unique' => 'The Email already exists',
            'password.required' => 'The Password is required',
            'confirm_password.required' => 'The Confirm Password is required',
            'phone.required' => 'The Phone is required',
            'phone.unique' => 'The Phone already exists',
            'address.required' => 'The Address is required',
            'permission.required' => 'The Permission is required',
            'status.required' => 'The Status is required',
            'image.image' => 'The Image must be an image',
            'image.mimes' => 'The Image must be a file of type: jpg, jpeg, png',
            'image.max' => 'The Image may not be greater than 2MB',
        ]);

        $owner = Owner::findOrFail($request->id);
        $user = User::findOrFail($owner->user_id);

        // تحديث المستخدم
        $user->update([
            'email' => $request->email ?? $user->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        // تجهيز البيانات لتحديث المالك
        $data = $request->only(['username', 'phone', 'address', 'permission', 'status']);

        // معالجة الصورة إن وُجدت
        if ($request->hasFile('image')) {
            if ($owner->image && file_exists(public_path('uploads/owners/' . $owner->image))) {
                unlink(public_path('uploads/owners/' . $owner->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/owners'), $imageName);
            $data['image'] = $imageName;
        }

        $owner->update($data);


        // $owner = Owner::query()->findOrFail($request->id);

        // $user = User::query()->findOrFail($owner->user_id);

        // if ($request->email != $user->email) {
        //     $user->update([
        //         'email' => $request->email,
        //     ]);
        // }
        // if ($request->password) {
        //     $user->update([
        //         'password' => Hash::make($request->password),
        //     ]);
        // }
        // if ($request->username) {
        //     $owner->update([
        //         'username' => $request->username,
        //     ]);
        // }
        // if ($request->phone) {
        //     $owner->update([
        //         'phone' => $request->phone,
        //     ]);
        // }
        // if ($request->address) {
        //     $owner->update([
        //         'address' => $request->address,
        //     ]);
        // }
        // if ($request->permission) {
        //     $owner->update([
        //         'permission' => $request->permission,
        //     ]);
        // }
        // if ($request->status) {
        //     $owner->update([
        //         'status' => $request->status,
        //     ]);
        // }
        // if ($request->image) {
        //     $imageName = null;

        //     if ($request->hasFile('image')) {
        //         $image = $request->file('image');
        //         $imageName = time() . '_' . uniqid() . '_' . $image->getClientOriginalName();
        //         $image->move(public_path('uploads/owners'), $imageName); // Save to public/uploads/owners

        //         $owner->update([
        //             'image' => $imageName,
        //         ]);
        //     }
        // }

        return response()->json(['success' => 'Owner (' . $request->username . ') updated successfully...']);
    }

    public function delete(Request $request)
    {
        $owner = Owner::query()->findOrFail($request->id);

        $username = $owner->username;

        $owner->status = 'inactive';
        $owner->save();

        return response()->json(['success' => 'Owner (' . $username . ') has been in-active...']);
    }

    public function active(Request $request)
    {
        $owner = Owner::query()->findOrFail($request->id);

        $username = $owner->username;

        $owner->status = 'active';
        $owner->save();

        return response()->json(['success' => 'Owner (' . $username . ') has been active...']);
    }
}
