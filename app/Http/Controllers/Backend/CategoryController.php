<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormCategoryRequest;
use App\Models\Category;
use App\Models\Language;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('categories index'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if (request()->ajax()) {
            $count = Category::count();
            $data = Category::latest()->get();
            return $this->dataTable($data, $count);
        }
        return view('backend.categories.index');
    }

    public function create()
    {
        abort_if(Gate::denies('categories create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $edit = false;
        $langs = Language::active()->get();
        return view('backend.categories.form', compact('edit', 'langs'));
    }

    public function store(FormCategoryRequest $request)
    {
        abort_if(Gate::denies('categories create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = $request->validated();
        DB::beginTransaction();
        try {
            $category = Category::create([
                'status' => $data['status'],
            ]);
            foreach (Cache::get('active_langs') as $lang) {
                $category->translations()->create([
                    'locale' => $lang->code,
                    'type' => $data['type:' . $lang->code],
                    'name' => $data['name:' . $lang->code],
                ]);
            }
            DB::commit();
            return redirect(route('backend.categories.index'))->withSuccess(trans('backend.messages.success.create'));
        } catch (\Exception $e) {
            DB::rollback();
            Log::channel('frontend')->error($e->getMessage());
            return redirect()->back()->withWarning(trans('backend.messages.error.create'));
        }
    }

    public function show(Category $category): View
    {
        abort_if(Gate::denies('categories index'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('backend.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        abort_if(Gate::denies('categories edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $edit = true;
        $langs = Language::active()->get();
        return view('backend.categories.form', compact('category', 'edit', 'langs'));
    }

    public function update(FormCategoryRequest $request,Category $category)
    {
        abort_if(Gate::denies('categories edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = $request->validated();
        DB::beginTransaction();
        try {
            $category->update([
                'status' => $data['status'],
            ]);
            foreach (Cache::get('active_langs') as $lang) {
                $category->translations()->updateOrcreate(
                    ['locale' => $lang->code],
                    [
                        'type' => $data['type:' . $lang->code],
                        'name' => $data['name:' . $lang->code],
                    ]
                );
            }

            DB::commit();
            return redirect(route('backend.categories.index'))->withSuccess(trans('backend.messages.success.update'));
        } catch (\Exception $e) {
            DB::rollback();
            Log::channel('frontend')->error($e->getMessage());
            return redirect()->back()->withWarning(trans('backend.messages.error.update'));
        }
    }


    public function destroy(Category $category)
    {
        abort_if(Gate::denies('categories delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $category->delete();
        return response(['status' => 1]);
    }

    public function dataTable($data, $count)
    {
        return datatables()
            ->of($data)
            ->editColumn('status', function ($row) {
                return  badge($row->status);
            })
            ->editColumn('type', function ($row) {
                return  $row->translation->type;
            })
            ->editColumn('name', function ($row) {
                return  $row->translation->name;
            })
            ->editColumn('actions', function ($row) {
                return $this->permissions($row->id);
            })
            ->rawColumns(['type','name','status','actions'])
            ->skipPaging()
            ->setTotalRecords($count)
            ->setFilteredRecords($count)
            ->make(true);
    }

    public function permissions($id): string
    {
        $class = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('categories index')) {
            $result .= "<a href='" . route('backend.categories.show', ['category' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('categories edit')) {
            $result .= "<a href='" . route('backend.categories.edit', ['category' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('categories delete')) {
            $result .= "<a href='" . route('backend.categories.destroy', ['category' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }
}
