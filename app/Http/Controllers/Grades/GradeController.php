<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\GradeSection;
use App\Models\Section;
use App\Models\Stage;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GradeController extends Controller
{
    /**
     * Gets dashboard page.
     */
    function index()
    {
        $Grade_data = Grade::query()->get();
        $Stage_data = Stage::query()->get();
        return view('dashboard.grades.index', compact('Grade_data', 'Stage_data'));
    }

    /**
     * Get data from Grade model in database,
     * Used Data-Table library,
     * Add column name 'stage',
     * Add column name 'status'.
     */
    function getdata(Request $request)
    {
        $data = Grade::select('grades.*', 'stages.name AS stage_name')
            ->join('stages', 'grades.stage_id', '=', 'stages.id');
        return DataTables::of($data)
            ->filter(function ($query) use ($request) {
                $filters = [
                    'grade',
                    'stage',
                    'status',
                ];
                foreach ($filters as $field) {
                    if ($request->filled('grade')) {
                        $query->where('grades.name', 'like', '%' . $request->grade . '%');
                    }

                    if ($request->filled('stage')) {
                        $query->where('stages.name', 'like', '%' . $request->stage . '%');
                    }

                    if ($request->filled('status')) {
                        $query->where('grades.status', $request->status);
                    }
                }
            })
            ->addIndexColumn()
            ->addColumn('grade', function ($query) {
                return $query->name;
            })
            ->addColumn('stage', function ($query) {
                return $query->stage_name;
            })
            ->addColumn('status', function ($query) {
                return $query->status === 'active' ? 'Active' : 'Inactive';

                // if ($query->status == 'active') {
                //     return 'Active';
                // } else {
                //     return 'Inactive';
                // }
            })
            ->addColumn('action', function ($query) {
                if ($query->status == 'active') {
                    return '<div data-bs-toggle="modal" data-grade-id = "' . $query->id . '" data-grade = "' . $query->tag . '" data-bs-target="#sectionModal" class="table-actions d-flex align-items-center gap-3 fs-6 btn-add-section">
                            <a href="javascript:;" class="text-success" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fadeIn animated bx bx-message-square-add"></i></a>
                        </div>
                       ';
                } else {
                    return
                        '<div>
                            <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom">
                                <i class="fadeIn animated bx bx-message-square-add"></i>
                            </a>
                        </div>';
                }
            })
            ->make(true);
    }

    /**
     * Return create php blade page,
     * Get all data from Stage model in database.
     */
    function create()
    {
        $data = Stage::all();
        return view('dashboard.grades.create', compact('data'));
    }

    /**
     * Valistion on (name, stage, status, tag) data was sended from php blade page(index/form),
     * Send error message if here error in labels value,
     * Store in (stage_id) the value of (stage-id) from Stage model by (getIdByTag) function,
     * Store in (status) the value of (status) from Grade model by (getStatusByCode) function,
     * Store in (grade) the all value of (grade row equal same tag) from Grade model by (where) function,
     * Update all data (name, stage_id, status, tag)from the database with send data by Grade model,
     * return (success) string message.
     */
    function add(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'stage' => 'required',
            'status' => 'required',
            'tag' => 'required',
        ], [
            'name.required' => 'Name label is required',
            'stage.required' => 'The Stage is required',
            'status.required' => 'The Status is required',
            'tag.required' => 'The Tag is required',
        ]);

        $satge_id = Stage::getIdByTag($request->stage);
        $status = Grade::getStatusByCode($request->status);
        $grade = Grade::query()->where('tag', $request->tag)->first();

        $grade->update([
            'name' => $request->name,
            'tag' => $request->tag,
            'stage_id' => $satge_id,
            'status' => $status,
        ]);
        return response()->json(['success' => 'تمت العملية بنجاح']);

        // // return redirect()->route('school.dashboard.grade.index');
    }

    /**
     *Save tags column data in ($data) variable <Data frim database>,
     *Return all data for tag column after changable it to json source,
     */
    function getactivestage()
    {
        $data = Stage::query()->where('status', 'active')->pluck('tag');
        return response()->json([
            'tags' => $data,
        ]);
    }
    function getactive()
    {
        $data = Grade::query()->where('status', 'active')->pluck('tag');
        // dd($data);
        return response()->json([
            'tags' => $data,
        ]);
    }
    function addsection(Request $request)
    {
        // dd($request->all());
        $section = Section::query()->where('name', $request->section)->first();
        $grade = Grade::query()->where('tag', $request->gradetag)->first();

        if (!$section || !$grade) {
            return response()->json(['error' => 'Grade or Section not found'], 404);
        }

        $status = $request->status == '1' ? 'active' : 'inactive';

        // if ($request->status == '1') {
        //     $status = 'active';
        // } else {
        //     $status = 'inactive';
        // }

        GradeSection::updateOrCreate([
            'grade_id' => $grade->id,
            'section_id' => $section->id,
        ], [
            'status' => $status,
        ]);
        return response()->json(['success' => 'تمت العملية بنجاح']);
    }
    function getactivesection(Request $request)
    {
        $data = GradeSection::query()->where('status', 'active')->where('grade_id', $request->gradeId)->get()->pluck('section.name');

        return response()->json([
            'names' => $data,
        ]);
    }
    function changemaster(Request $request)
    {
        $stage = Stage::query()->where('tag', $request->tag)->first();
        $gradeActive = Grade::query()->where('stage_id', $stage->id)->where('status', 'active')->get();

        if ($request->status == 1) {
            $stage->update([
                'status' => 'active',
            ]);
        } else {
            $stage->update([
                'status' => 'inactive',
            ]);
            foreach ($gradeActive as $grade) {
                $grade->update([
                    'status' => 'inactive',
                ]);
            }
        }
        return response()->json(['success' => 'تمت العملية بنجاح']);
    }
}
