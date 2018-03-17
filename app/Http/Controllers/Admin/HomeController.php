<?php
/**
 * Created by PhpStorm.
 * User: vuquo
 * Date: 8/19/2017
 * Time: 10:53 AM
 */

namespace App\Http\Controllers\Admin;


use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function index(){
        return view('admin.base');
    }

    public function changePassword(Request $request){
        //$input = Request::all();

        $admin = Admin::findOrFail(1);

        if (bcrypt($request->old_password) == $admin->password){
            echo "equal";
        }

        echo bcrypt($request->old_password) . '</br>';
        echo $admin->password;

    }
}