<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormFacultyRequest;
use App\Http\Requests\Backend\FormNewsRequest;
use App\Http\Requests\Backend\FormPackageRequest;
use App\Models\Category;
use App\Models\Faculty;
use App\Models\Language;
use App\Models\News;
use App\Models\Package;
use App\Services\UploadImagesService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class FacultyController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('faculties index'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if (request()->ajax()) {
            $count = Faculty::count();
            $data = Faculty::latest()->get();
            return $this->dataTable($data, $count);
        }
        return view('backend.faculties.index');
    }

    public function create()
    {
        abort_if(Gate::denies('faculties create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $edit = false;
        $langs = Language::active()->get();
        return view('backend.faculties.form', compact('edit', 'langs'));
    }

    public function store(FormFacultyRequest $request)
    {
        abort_if(Gate::denies('faculties create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = $request->validated();
        DB::beginTransaction();
        try {
            $faculty = Faculty::create([
                'status' => $data['status'],
            ]);
            foreach (Cache::get('active_langs') as $lang) {
                $faculty->translations()->create([
                    'locale' => $lang->code,
                    'name' => $data['name:' . $lang->code],
                ]);
            }
            DB::commit();
            return redirect(route('backend.faculties.index'))->withSuccess(trans('backend.messages.success.create'));
        } catch (\Exception $e) {
            DB::rollback();
            Log::channel('frontend')->error($e->getMessage());
            return redirect()->back()->withWarning(trans('backend.messages.error'));
        }
    }

    public function show(Faculty $faculty): View
    {
        abort_if(Gate::denies('faculties index'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('backend.faculties.show', compact('faculty'));
    }

    public function edit(Faculty $faculty)
    {
        abort_if(Gate::denies('faculties edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $edit = true;
        $langs = Language::active()->get();
        return view('backend.faculties.form', compact('faculty', 'edit', 'langs'));
    }

    public function update(FormFacultyRequest $request,Faculty $faculty)
    {
        abort_if(Gate::denies('faculties edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = $request->validated();
        DB::beginTransaction();
        try {
            $faculty->update([
                'status' => $data['status'],
            ]);
            foreach (Cache::get('active_langs') as $lang) {
                $faculty->translations()->updateOrcreate(
                    ['locale' => $lang->code],
                    [
                        'name' => $data['name:' . $lang->code],
                    ]
                );
            }
            DB::commit();
            return redirect(route('backend.faculties.index'))->withSuccess(trans('backend.messages.success.update'));
        } catch (\Exception $e) {
            DB::rollback();
            Log::channel('frontend')->error($e->getMessage());
            return redirect()->back()->withWarning(trans('backend.messages.error'));
        }
    }


    public function destroy(Faculty $faculty)
    {
        abort_if(Gate::denies('faculties delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $faculty->delete();
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

        if (admin()->can('faculties index')) {
            $result .= "<a href='" . route('backend.faculties.show', ['faculty' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('faculties edit')) {
            $result .= "<a href='" . route('backend.faculties.edit', ['faculty' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('faculties delete')) {
            $result .= "<a href='" . route('backend.faculties.destroy', ['faculty' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }
}
