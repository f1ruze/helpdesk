<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class TicketController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tickets index'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if (request()->ajax()) {
            $count = Ticket::count();
            $data = Ticket::latest()->get();
            return $this->dataTable($data, $count);
        }
        return view('backend.tickets.index');
    }
    public function show(Ticket $ticket): View
    {
        abort_if(Gate::denies('tickets index'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('backend.tickets.show', compact('ticket'));
    }


    public function destroy(Ticket $ticket)
    {
        abort_if(Gate::denies('tickets delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $ticket->delete();
        return response(['status' => 1]);
    }

    public function dataTable($data, $count)
    {
        return datatables()
            ->of($data)
            ->addColumn('image', function ($row) {
                $src = $row->first_image ? $row->first_image : asset('backend/img/noimage.jpg');
                return '<img src="' . $src . '" alt="' . $row->id . '" style="width:26px; object-fit: contain;">';
            })
            ->addColumn('faculty', function ($row) {
                return $row->faculty;
            })
            ->addColumn('department', function ($row) {
                return $row->department;
            })
            ->addColumn('category', function ($row) {
                return $row->category;
            })
            ->addColumn('type', function ($row) {
                return badge($row->type);
            })
            ->addColumn('teacher', function ($row) {
                return $row->teacher;
            })
            ->addColumn('student', function ($row) {
                return $row->student;
            })
            ->addColumn('email', function ($row) {
                return $row->email;
            })
            ->addColumn('priority', function ($row) {
                return badge($row->priority);
            })
            ->addColumn('message', function ($row) {
                return $row->message;
            })
            ->addColumn('actions', function ($row) {
                return $this->permissions($row->id);
            })
            ->rawColumns(['image','faculty','department','teacher','student','email','category','priority', 'message','type', 'actions'])
            ->skipPaging()
            ->setTotalRecords($count)
            ->setFilteredRecords($count)
            ->make(true);
    }

    protected function permissions($id)
    {
        $class = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('tickets index')) {
            $result .= "<a href='" . route('backend.tickets.show', ['ticket' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('tickets edit')) {
            $result .= "<a href='" . route('backend.tickets.edit', ['ticket' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('tickets delete')) {
            $result .= "<a href='" . route('backend.tickets.destroy', ['ticket' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }
}
