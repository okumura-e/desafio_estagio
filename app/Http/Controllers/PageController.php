<?php

namespace App\Http\Controllers;
use App\Models\Notice;
use Illuminate\Support\Facades\DB;

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


    public function typography()
    {
        $teste = Notice::where('id', $id)->first(); 
        dd($teste);
        
        $notice = DB::select('select users.id, news.* from users inner join news on users.id 
        = news.user_id where news.id = ?', [$id]);
        
        return view('typography', ['notice'=>$notice] );
    }
       
    /**
     * Display maps page
     *
     * @return \Illuminate\View\View
     */
    public function maps()
    {
        return view('pages.maps');
    }

    /**
     * Display tables page
     *
     * @return \Illuminate\View\View
     */
    public function tables()
    {
        return view('pages.tables');
    }

    /**
     * Display notifications page
     *
     * @return \Illuminate\View\View
     */
    public function notifications()
    {
        return view('pages.notifications');
    }

    /**
     * Display rtl page
     *
     * @return \Illuminate\View\View
     */
    public function rtl()
    {
        return view('pages.rtl');
    }


    /**
     * Display upgrade page
     *
     * @return \Illuminate\View\View
     */
    public function upgrade()
    {
        return view('pages.upgrade');
    }
}
