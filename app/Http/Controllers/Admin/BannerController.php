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

class BannerController extends Controller
{

    public function showAddForm(){
        return view('admin.banner.add');
    }

    public function add(Request $request){
        $input = \Illuminate\Support\Facades\Request::all();

        if ($request->img != null) {
            //neu ten khac voi anh cu
            if ($request->img->getClientOriginalName() != null) {

                $imageName = time() . '.' . $request->img->getClientOriginalExtension();
                $request->img->move('public/banners', $imageName);

                $input['img'] = $imageName;

            }

        }

        unset($input['_token']);

        DB::table('banner')->insert($input);

        return redirect('admin/banner');
    }

    public function index(){
        $banners = DB::table('banner')->orderBy('type', 'ASC')->orderBy('order', 'ASC')->get();

        return view('admin.banner.index',[
            'banners' => $banners
        ]);
    }

    function showEditForm($id){
        $banner = DB::table('banner')->where('id', $id)->first();

        return view('admin.banner.edit', ['banner' => $banner ]);
    }

    function edit($id, Request $request){
        $input = \Illuminate\Support\Facades\Request::all();

        if ($request->img != null) {
            //neu ten khac voi anh cu
            if ($request->img->getClientOriginalName() != null) {

                $imageName = time() . '.' . $request->img->getClientOriginalExtension();
                $request->img->move('public/banners', $imageName);

                $input['img'] = $imageName;

            }

        }

        unset($input['_token']);

        DB::table('banner')->where('id', $id)->update($input);

        return redirect('admin/banner');


    }

    public function delete($id){
        DB::table('banner')->where('id', $id)->delete();

        return redirect('admin/banner');
    }
}