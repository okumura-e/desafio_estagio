<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Notice;
use Illuminate\Support\Facades\DB;
use \Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {      
        $search = request('search');
        $user = auth()->user()->id;
        $complemento = "and users.id = ";
        if($search){
            $query = Notice::query();
            $query->where('title', 'LIKE', '%' . $search . '%');
            $notices = $query->paginate();
        }else{
            $notices = DB::select('select users.id, news.* from users inner join news on users.id = 
            news.user_id where users.id = ?', [$user]);
        }
        return view('dashboard', ['notices' => $notices]);
    }
}
