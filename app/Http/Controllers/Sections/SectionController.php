<?php

namespace App\Http\Controllers\Sections;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SectionController extends Controller
{
    function index()
    {
        $data = Section::query()->get();
        return view('dashboard.sections.index', compact('data'));
    }
    function getdata(Request $request)
    {
        $data = Section::query();
        return DataTables::of($data)
            ->filter(function ($query) use ($request) {
                $filters = [
                    'name',
                    'status',
                ];
                foreach ($filters as $field) {
                    if ($request->filled('status')) {
                        $query->where('status', $request->status); // تطابق تام، بدون like
                    }
                    if ($request->filled($field)) {
                        $query->where($field, 'like', '%' . $request->get($field) . '%');
                    }
                }
            })
            ->addIndexColumn()
            ->addColumn('name', function ($query) {
                return 'Section ' . ' ' . $query->name;
            })
            ->addColumn('status', function ($query) {
                if ($query->status == 'active') {
                    return 'Active';
                } else {
                    return 'Inactive';
                }
            })
            ->addColumn('action', function ($query) {
                $section = Section::where('status', 'active')->orderBy('id', 'desc')->first();
                $sectiondisable = Section::where('status', 'inactive')->first();

                if ($section && $section->id == $query->id) {
                    return '
                        <div data-id="' . $query->id . '" class="form-check form-switch active-section-switch">
                            <input data-status="inactive" class="form-check-input" type="checkbox" role="switch" checked>
                        </div>
                    ';
                }

                if ($sectiondisable && $sectiondisable->id == $query->id) {
                    return '
                        <div data-status="active" data-id="' . $query->id . '" class="form-check form-switch active-section-switch">
                            <input class="form-check-input" type="checkbox" role="switch">
                        </div>
                    ';
                }

                // في حال لا يوجد أي قسم active أو inactive (احتياطيًا)
                return '
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" disabled>
                    </div>
                ';
            })
            ->make(true);
    }

    function add(Request $request)
    {
        $newcount = (int)$request->count_section;
        $currentcount = Section::count();

        if ($newcount > $currentcount) {
            for ($i = $currentcount + 1; $i <= $newcount; $i++) {
                Section::create([
                    'name' => $i,
                    'status' => 'active'
                ]);
            }
            $sectionInActive = Section::query()->where('status', 'inactive')->get();
            foreach ($sectionInActive as $section) {
                $section->update([
                    'status' => 'active',
                ]);
            }
        } elseif ($newcount < $currentcount) {
            $limit = $currentcount - $newcount;
            $lastSections = Section::query()->orderBy('id', 'desc')->limit($limit)->get();
            // dd($lastSections);
            foreach ($lastSections as $section) {
                $section->update([
                    'status' => 'inactive',
                ]);
            }
        } elseif ($newcount == $currentcount) {
            $sectionInActives = Section::query()->where('status', 'inactive')->get();
            foreach ($sectionInActives as $sectionA) {
                $sectionA->update([
                    'status' => 'active',
                ]);
            }
        }
        return response()->json(['success' => 'The operation was successfully...']);
    }

    function changestatus(Request $request)
    {
        $section = Section::query()->findOrFail($request->id);
        if ($request->status == 'active') {
            $section->update([
                'status' => 'active',
            ]);
        } else {
            $section->update([
                'status' => 'inactive',
            ]);
        }
        return response()->json(['success' => 'The operation was successfully...']);
    }
}
