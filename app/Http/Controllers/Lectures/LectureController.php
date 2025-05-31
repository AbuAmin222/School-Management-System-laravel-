<?php

namespace App\Http\Controllers\Lectures;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LectureController extends Controller
{
        function index()
    {
        return view('dashboard.lectures.index');
    }
    // function getdata(Request $request)
    // {
    //     $data = Section::query();
    //     return DataTables::of($data)
    //         ->addIndexColumn()
    //         ->addColumn('name', function ($query) {
    //             return 'Section ' . ' ' . $query->name;
    //         })
    //         ->addColumn('status', function ($query) {
    //             if ($query->status == 'active') {
    //                 return 'Active';
    //             } else {
    //                 return 'Inactive';
    //             }
    //         })
    //         ->addColumn('action', function ($query) {
    //             $section = Section::query()->where('status', 'active')->orderBy('id', 'desc')->first();
    //             $sectiondisable = Section::query()->where('status', 'inactive')->first();
    //             if ($section->id == $query->id) {
    //                 return ' <div data-id="' . $query->id . '" class="form-check form-switch active-section-switch">
    //                         <input data-status="inactive" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
    //                     </div>';
    //             }
    //             if (@$sectiondisable->id == $query->id) {
    //                 return '<div data-status="active" data-id="' . $query->id . '" class="form-check form-switch active-section-switch">
    //                         <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
    //                     </div>';
    //             }
    //             return '<div class="form-check form-switch">
    //                         <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDisabled" disabled>
    //                     </div>';
    //         })
    //         ->make(true);
    // }

    // function add(Request $request)
    // {
    //     // dd($request);
    //     $newcount = (int)$request->count_section;
    //     $currentcount = Section::count();

    //     if ($newcount > $currentcount) {
    //         for ($i = $currentcount + 1; $i <= $newcount; $i++) {
    //             Section::create([
    //                 'name' => $i,
    //                 'status' => 'active'
    //             ]);
    //         }
    //         $sectionInActive = Section::query()->where('status', 'inactive')->get();
    //         foreach ($sectionInActive as $section) {
    //             $section->update([
    //                 'status' => 'active',
    //             ]);
    //         }
    //     } elseif ($newcount < $currentcount) {
    //         $limit = $currentcount - $newcount;
    //         $lastSections = Section::query()->orderBy('id', 'desc')->limit($limit)->get();
    //         // dd($lastSections);
    //         foreach ($lastSections as $section) {
    //             $section->update([
    //                 'status' => 'inactive',
    //             ]);
    //         }
    //     } elseif ($newcount == $currentcount) {
    //         $sectionInActives = Section::query()->where('status', 'inactive')->get();
    //         foreach ($sectionInActives as $sectionA) {
    //             $sectionA->update([
    //                 'status' => 'active',
    //             ]);
    //         }
    //     }
    //     return response()->json(['success' => 'The operation was successfully...']);
    // }

}
