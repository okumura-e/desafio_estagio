<?php

namespace App\Http\Controllers;
use App\Models\Notice;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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


    public function typography($id)
    {
        $notice = Notice::where('id', $id)->first();
        return view('pages.typography', compact('notice'));
    }

    public function newedit($id)
    {
        $notice = Notice::where('id', $id)->first();
        return view('pages.editnew', compact('notice'));
    }

    public function newupdate(Request $request, $id)
    {
        $request->validate([
            'image'=>'required|image|mimes:jpeg,png,jpg,gif',
            'title'=>'required|min:5|',
            'text'=>'required',
        ]);
        $user = auth()->user();
        $new = $user->notice;
        if ($request->hasFile('image') && $request->file('image')->isValid())
        {
            $requestImg = $request->image;
            $extension = $requestImg->extension();
            $imageName = $requestImg->getClientOriginalName() . "." . $extension;
            $requestImg->move(public_path('white/img'), $imageName);
            $request->image = $imageName;
        }
        $edit = [
            'image'=> $request->image,
            'title'=> $request->title,
            'text'=> $request->text,
        ];
        Notice::where('id', $id)->update($edit);
        return redirect()->route('home');
    }

    public function newdelete($id)
    {
        Notice::where('id', $id)->delete();
        return redirect()->route('home');
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
