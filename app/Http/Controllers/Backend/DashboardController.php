<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Ticket;


class DashboardController extends Controller
{
    public function __invoke()
    {
//        $tickets_count = Ticket::count();
//        $faqs_count = Faq::count();

        return view('backend.dashboard.index');

    }
}
