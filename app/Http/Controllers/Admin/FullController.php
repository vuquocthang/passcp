<?php
/**
 * Created by PhpStorm.
 * User: vuquo
 * Date: 9/20/2017
 * Time: 2:17 PM
 */

namespace App\Http\Controllers\Admin;


use App\Full;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

class FullController extends Controller
{
    public function showAddForm(){
        return view('admin.full.add');
    }

    public function add(){
        $input = Request::all();

        Full::create($input);

        return redirect('admin/truyen-full/danh-sach');
    }

    public function index(){
        return view('admin.full.index');
    }

    public function delete($id){
        Full::destroy($id);

        return redirect('admin/truyen-full/danh-sach');
    }

    public function showEditForm($id){
        return view('admin.full.edit', ['id' => $id]);
    }

    public function edit($id){
        $input = Request::all();

        $topread = Full::findOrFail($id);

        $topread->fill($input);

        $topread->save();


        return redirect('admin/truyen-full/danh-sach');
    }

}