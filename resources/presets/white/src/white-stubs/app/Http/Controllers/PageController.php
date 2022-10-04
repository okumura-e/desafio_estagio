<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    /**
     * Display icons page
     *
     * @return \Illuminate\View\View
     */
    public function icons()
    {
        return view('pages.icons');
    }

    /**
     * Display typography page
     *
     * @return \Illuminate\View\View
     */
    /*public function typography()
    {
        return view('typography');
    }*/

}
