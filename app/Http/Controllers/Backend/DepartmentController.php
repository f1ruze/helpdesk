<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormDepartmentRequest;
use App\Models\Department;
use App\Models\Language;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class DepartmentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('departments index'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if (request()->ajax()) {
            $count = Department::count();
            $data = Department::latest()->get();
            return $this->dataTable($data, $count);
        }
        return view('backend.departments.index');
    }

    public function create()
    {
        abort_if(Gate::denies('departments create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $edit = false;
        $langs = Language::active()->get();
        return view('backend.departments.form', compact('edit', 'langs'));
    }

    public function store(FormDepartmentRequest $request)
    {
        abort_if(Gate::denies('departments create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = $request->validated();
        DB::beginTransaction();
        try {
            $department = Department::create([
                'status' => $data['status'],
            ]);
            foreach (Cache::get('active_langs') as $lang) {
                $department->translations()->create([
                    'locale' => $lang->code,
                    'name' => $data['name:' . $lang->code],
                ]);
            }
            DB::commit();
            return redirect(route('backend.departments.index'))->withSuccess(trans('backend.messages.success.create'));
        } catch (\Exception $e) {
            DB::rollback();
            Log::channel('frontend')->error($e->getMessage());
            return redirect()->back()->withWarning(trans('backend.messages.error'));
        }
    }

    public function show(Department $department): View
    {
        abort_if(Gate::denies('departments index'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('backend.departments.show', compact('department'));
    }

    public function edit(Department $department)
    {
        abort_if(Gate::denies('departments edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $edit = true;
        $langs = Language::active()->get();
        return view('backend.departments.form', compact('department', 'edit', 'langs'));
    }

    public function update(FormDepartmentRequest $request,Department $department)
    {
        abort_if(Gate::denies('departments edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = $request->validated();
        DB::beginTransaction();
        try {
            $department->update([
                'status' => $data['status'],
            ]);
            foreach (Cache::get('active_langs') as $lang) {
                $department->translations()->updateOrcreate(
                    ['locale' => $lang->code],
                    [
                        'name' => $data['name:' . $lang->code],
                    ]
                );
            }
            DB::commit();
            return redirect(route('backend.departments.index'))->withSuccess(trans('backend.messages.success.update'));
        } catch (\Exception $e) {
            DB::rollback();
            Log::channel('frontend')->error($e->getMessage());
            return redirect()->back()->withWarning(trans('backend.messages.error'));
        }
    }


    public function destroy(Department $department)
    {
        abort_if(Gate::denies('departments delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $department->delete();
        return response(['status' => 1]);
    }

    public function dataTable($data, $count)
    {
        return datatables()
            ->of($data)
            ->editColumn('status', function ($row) {
                return  badge($row->status);
            })
            ->editColumn('name', function ($row) {
                return  $row->translation->name;
            })
            ->editColumn('actions', function ($row) {
                return $this->permissions($row->id);
            })
            ->rawColumns(['name','status','actions'])
            ->skipPaging()
            ->setTotalRecords($count)
            ->setFilteredRecords($count)
            ->make(true);
    }

    public function permissions($id): string
    {
        $class = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('departments index')) {
            $result .= "<a href='" . route('backend.departments.show', ['department' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('departments edit')) {
            $result .= "<a href='" . route('backend.departments.edit', ['department' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('departments delete')) {
            $result .= "<a href='" . route('backend.departments.destroy', ['department' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }
}
