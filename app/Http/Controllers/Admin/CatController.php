<?php
/**
 * Created by PhpStorm.
 * User: vuquo
 * Date: 8/19/2017
 * Time: 4:08 PM
 */

namespace App\Http\Controllers\Admin;


use App\Cat;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CatController extends Controller
{
    public function index(){
        $cats = Cat::orderBy('parent_id' , 'ASC')->orderBy('order' , 'ASC')->get();

        return view('admin.cat.index',[
            'cats'=> $cats
        ]);
    }

    public function showAddForm(){
        return view('admin.cat.add');
    }

    public function add(Request $request){
        $input = \Illuminate\Support\Facades\Request::all();

        if ($request->parent_id == ''){
            $input['parent_id'] = null;
        }

        Cat::create($input);

        return redirect('admin/cat');
    }

    public function delete($id){
        Cat::destroy($id);

        return redirect('admin/cat');
    }

    public function showEditForm($id){
        $cat = Cat::findOrFail($id);

        return view('admin.cat.edit', ['cat' => $cat]);
    }

    public function edit($id, Request $request){
        $input = \Illuminate\Support\Facades\Request::all();

        if ($request->parent_id == ''){
            $input['parent_id'] = null;
        }

        $cat = Cat::find($id);

        $cat->fill($input);

        $cat->save();

        return redirect('admin/cat');
    }

    public function status($id){

        $category = Category::findOrFail($id);

        $category->status ==  1 ? $category->status = 0 : $category->status = 1;

        $category->save();

        return redirect('admin/the-loai/danh-sach');

    }



}