<?php
/**
 * Created by PhpStorm.
 * User: vuquo
 * Date: 8/19/2017
 * Time: 4:08 PM
 */

namespace App\Http\Controllers\Admin;


use App\Category;
use App\Chapter;
use App\Http\Controllers\Controller;
use App\Story;
use Illuminate\Support\Facades\Request;

class ChapterController extends Controller
{
    public function index(){
        return view('admin.chapter.index');
    }

    public function showAddForm(){
        return view('admin.chapter.add');
    }

    public function add(Request $request){
        $input = Request::all();

        $input['ngay_them'] = date("Y-m-d H:i:s");

        $input['noi_dung'] = htmlentities($input['noi_dung']);

        Chapter::create($input);

        return redirect('admin/chuong/danh-sach');

    }

    public function delete($id){
        $chapter = Chapter::findOrFail($id);

        $chapter->status = -1;

        $chapter->save();

        return redirect('admin/chuong/danh-sach');
    }

    public function showEditForm($id){
        $chapter = Chapter::findOrFail($id);

        return view('admin.chapter.edit', ['chapter' => $chapter, 'id' => $id]);
    }

    public function edit($id){
        $input = Request::all();

        $chapter = Chapter::findOrFail($id);

        $input['noi_dung'] = htmlentities($input['noi_dung']);

        $chapter->fill($input);

        $chapter->save();

        return redirect('admin/chuong/danh-sach');
    }

    public function status($id){
        $chapter = Chapter::findOrFail($id);

        $chapter->status ==  1 ? $chapter->status = 0 : $chapter->status = 1;

        $chapter->save();

        return redirect('admin/chuong/danh-sach');
    }
}