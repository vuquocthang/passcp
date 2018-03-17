<?php
/**
 * Created by PhpStorm.
 * User: vuquo
 * Date: 3/16/2018
 * Time: 7:22 AM
 */

namespace App\Http\Controllers\Admin;


use App\Cat;
use App\Http\Controllers\Controller;
use App\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class TourController extends Controller
{
    public function __construct()
    {
        $cats = Cat::where('parent_id', null)->orderBy('order', 'ASC')->get();

        View::share('cats', $cats);
    }

    public function showAddForm(){


        return view('admin.tour.add', [

        ]);
    }

    public function add(Request $request){
        $input = \Illuminate\Support\Facades\Request::all();

        if ($request->img != null) {
            //neu ten khac voi anh cu
            if ($request->img->getClientOriginalName() != null) {

                $imageName = time() . '.' . $request->img->getClientOriginalExtension();
                $request->img->move('public/tours', $imageName);

                $input['img'] = $imageName;

            }

        }

        Tour::create($input);

        return redirect('admin/tour');
    }

    public function index(){
        $tours = Tour::orderBy('created_at', 'DESC')->get();

        return view('admin.tour.index',[
            'tours' => $tours
        ]);
    }

    function showEditForm($id){
        $tour = Tour::find($id);

        return view('admin.tour.edit', ['tour' => $tour ]);
    }

    function edit($id, Request $request){
        $input = \Illuminate\Support\Facades\Request::all();

        if ($request->img != null) {
            //neu ten khac voi anh cu
            if ($request->img->getClientOriginalName() != null) {

                $imageName = time() . '.' . $request->img->getClientOriginalExtension();
                $request->img->move('public/tours', $imageName);

                $input['img'] = $imageName;

            }

        }

        $input['khoi_hanh'] = null;
        $input['ngay_ve'] = null;

        $tour = Tour::find($id);

        $tour->fill($input);

        $tour->save();

        return redirect('admin/tour');


    }

    public function delete($id){
        DB::table('tour')->where('id', $id)->delete();

        return redirect('admin/tour');
    }

}