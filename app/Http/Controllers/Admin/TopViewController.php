<?php
/**
 * Created by PhpStorm.
 * User: vuquo
 * Date: 9/18/2017
 * Time: 11:20 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\TopView;
use Illuminate\Support\Facades\Request;

class TopViewController extends Controller
{
    public function showAddForm(){
        return view('admin.top-view.add');
    }

    public function add(){
        $input = Request::all();

        TopView::create($input);

        return redirect('admin/truyen-xem-nhieu/danh-sach');
    }

    public function index(){
        return view('admin.top-view.index');
    }

    public function delete($id){
        TopView::destroy($id);

        return redirect('admin/truyen-xem-nhieu/danh-sach');
    }

    public function showEditForm($id){
        return view('admin.top-view.edit', ['id' => $id]);
    }

    public function edit($id){
        $input = Request::all();

        $topread = TopView::findOrFail($id);

        $topread->fill($input);

        $topread->save();


        return redirect('admin/truyen-xem-nhieu/danh-sach');
    }

}