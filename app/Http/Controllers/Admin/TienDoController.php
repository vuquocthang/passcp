<?php
/**
 * Created by PhpStorm.
 * User: vuquo
 * Date: 3/16/2018
 * Time: 6:27 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\TienDo;
use Illuminate\Http\Request;

class TienDoController extends Controller
{
    public function index(){

        $datas = TienDo::orderBy('created_at', 'DESC')->get();

        return view('admin.tien-do.index', [
            'datas' => $datas
        ]);
    }



    public function showAddForm(){
        return view('admin.tien-do.add');
    }

    public function add(Request $request){
        TienDo::create($request->all());

        return redirect('tien-do');
    }

}