<?php
/**
 * Created by PhpStorm.
 * User: vuquo
 * Date: 8/19/2017
 * Time: 4:08 PM
 */

namespace App\Http\Controllers\Admin;


use App\Category;
use App\CategoryStory;
use App\Http\Controllers\Controller;
use App\Story;
use Illuminate\Support\Facades\Request;

class StoryController extends Controller
{
    public function index(){
        return view('admin.story.index');
    }

    public function showAddForm(){
        return view('admin.story.add');
    }

    public function add(\Illuminate\Http\Request $request){
        $input = Request::all();

        $imageName = time().'.'.$request->image_link->getClientOriginalExtension();
        $request->image_link->move('public/image', $imageName);

        $input['image_link'] = $imageName;
        $input['ngay_them'] = date('Y-m-d H:i:s');

        Story::create($input);

        $lastStory = Story::orderBy('id', 'DESC' )->first();


            foreach ($request->the_loai_ids as $value){
                CategoryStory::create(['the_loai_id' => $value, 'truyen_id' => $lastStory->id]);
            }


        return redirect('admin/truyen/danh-sach');
    }

    public function delete($id){

        $story = Story::findOrFail($id);

        $story->status = -1;

        $story->save();

        return redirect('admin/truyen/danh-sach');
    }

    public function showEditForm($id){
        $story = Story::findOrFail($id);

        $categoryStory = CategoryStory::where('truyen_id', $id)->pluck('the_loai_id')->toArray();

        //print_r($categoryStory);

        return view('admin.story.edit', ['story' => $story, 'id' => $id, 'categoryStory' => $categoryStory]);
    }

    public function edit($id, \Illuminate\Http\Request $request){
        $input = Request::all();

        $story = Story::findOrFail($id);


        //check upload image
        if ($request->image_link != null) {
            //neu ten khac voi anh cu
            if ($request->image_link->getClientOriginalName() != null) {
                if ($request->image_link->getClientOriginalName() != $story->image_link) {
                    $imageName = time() . '.' . $request->image_link->getClientOriginalExtension();
                    $request->image_link->move('public/image', $imageName);

                    $input['image_link'] = $imageName;
                }
            }

        }

        CategoryStory::where('truyen_id', $id)->delete();

        foreach ($request->the_loai_ids as $value){
            CategoryStory::create(['the_loai_id' => $value, 'truyen_id' => $id]);
        }

        $story->fill($input);

        $story->save();

        return redirect('admin/truyen/danh-sach');
    }

    public function status($id){
        $story = Story::findOrFail($id);

        $story->status ==  1 ? $story->status = 0 : $story->status = 1;

        $story->save();

        return redirect('admin/truyen/danh-sach');
    }

}