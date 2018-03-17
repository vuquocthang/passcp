<?php
/**
 * Created by PhpStorm.
 * User: vuquo
 * Date: 3/16/2018
 * Time: 4:10 AM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SliderController extends Controller
{

    public function showAddForm(){
        return view('admin.slider.add');
    }

    public function add(Request $request){
        $input = \Illuminate\Support\Facades\Request::all();

        if ($request->img != null) {
            //neu ten khac voi anh cu
            if ($request->img->getClientOriginalName() != null) {

                $imageName = time() . '.' . $request->img->getClientOriginalExtension();
                $request->img->move('public/sliders', $imageName);

                $input['img'] = $imageName;

            }

        }

        unset($input['_token']);

        DB::table('slider')->insert($input);

        return redirect('admin/slider');
    }

    public function index(){
        return view('admin.slider.index');
    }

    function showEditForm($id){
        $slider = DB::table('slider')->where('id', $id)->first();

        return view('admin.slider.edit', ['slider' => $slider ]);
    }

    function edit($id, Request $request){
        $input = \Illuminate\Support\Facades\Request::all();

        if ($request->img != null) {
            //neu ten khac voi anh cu
            if ($request->img->getClientOriginalName() != null) {

                $imageName = time() . '.' . $request->img->getClientOriginalExtension();
                $request->img->move('public/sliders', $imageName);

                $input['img'] = $imageName;

            }

        }

        unset($input['_token']);

        DB::table('slider')->where('id', $id)->update($input);

        return redirect('admin/slider');


    }

    public function delete($id){
        DB::table('slider')->where('id', $id)->delete();

        return redirect('admin/slider');
    }
}