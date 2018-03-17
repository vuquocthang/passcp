<?php
/**
 * Created by PhpStorm.
 * User: vuquo
 * Date: 9/12/2017
 * Time: 3:24 PM
 */

namespace App\Http\Controllers\Admin;


use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

class AdminGroupController extends Controller
{
    function index(){
        return view('admin.group-admin.index');
    }

    function showAddForm(){
        return view('admin.group-admin.add');
    }

    function add(\Illuminate\Http\Request $request){
        $input = Request::all();

        $this->validate($request,[
            'username' => 'required|min:6|max:35|unique:admin,username',
            'password' => 'required|min:6|max:20',
            'confirm_password' => 'required|min:6|max:20|same:password',

        ],[
            'username.required' => 'Username không để trống',
            'username.unique' => 'Username bị trùng',
            'password.required' => 'Password không để trống',
            'confirm_password.required' => 'Confirm Password không để trống',
            'username.min' => 'Username ít nhất 6 ký tự',
            'confirm_password.same' => 'Mật khẩu không khớp',
            'password.min' => 'Mật khẩu ít nhất 6 ký tự'

        ]);

        $input['password'] = bcrypt($request->password);

        Admin::create($input);

        return redirect('admin/group-admin/danh-sach');
    }

    function delete($id){
        if ($id != 1){
            Admin::destroy($id);
        }
        return redirect('admin/group-admin/danh-sach');
    }
}