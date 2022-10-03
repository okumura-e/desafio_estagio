<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;
use App\Models\User;


class PostController extends Controller
{
    public function addnew(Request $request)
    {
        $request->validate([
            'image'=>'required|image|mimes:jpeg,png,jpg,gif',
            'title'=>'required|min:5|',
            'text'=>'required',
        ]);
        if ($request->hasFile('image') && $request->file('image')->isValid())
        {
            $requestImg = $request->image;
            $extension = $requestImg->extension();
            $imageName = $requestImg->getClientOriginalName() . "." . $extension;
            $requestImg->move(public_path('white/img'), $imageName);
            $request->image = $imageName;
        }
        $post = new Notice();
        $user = auth()->user()->id;
        $post->user_id = $user;
        $post->image = $imageName;
        $post->title = $request->title;
        $post->text = $request->text;
        $post->save();
        return redirect('/home');
    }

}
