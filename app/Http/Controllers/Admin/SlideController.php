<?php
/**
 * Created by PhpStorm.
 * User: vuquo
 * Date: 9/7/2017
 * Time: 3:17 AM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SlideController extends Controller
{
    public function showAddForm(){
        return view('admin.slide.add');
    }

    public function add(Request $request){
        $input = \Illuminate\Support\Facades\Request::all();

        $input['truyen_id'] = explode('-', $request->value)[0];
        $input['chuong_id'] = explode('-', $request->value)[1];

        Slide::create($input);

        return redirect('admin/slide/danh-sach');
    }

    public function index(){
        return view('admin.slide.index');
    }

    function showEditForm($id){
        return view('admin.slide.edit', ['id' => $id ]);
    }

    function edit($id, Request $request){
        $input = \Illuminate\Support\Facades\Request::all();

        $slide = Slide::findOrFail($id);

        $input['truyen_id'] = explode('-', $request->value)[0];
        $input['chuong_id'] = explode('-', $request->value)[1];

        $slide->fill($input);
        $slide->save();

        return redirect('admin/slide/danh-sach');


    }

    public function delete($id){
        Slide::destroy($id);

        return redirect('admin/slide/danh-sach');
    }

}