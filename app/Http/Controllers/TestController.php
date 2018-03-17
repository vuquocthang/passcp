<?php
/**
 * Created by PhpStorm.
 * User: vuquo
 * Date: 9/3/2017
 * Time: 10:51 PM
 */

namespace App\Http\Controllers;

use App\Chapter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function upload(Request $request){

        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        echo $request->file->getClientOriginalName();

        $imageName = time().'.'.$request->file->getClientOriginalExtension();

        $request->file->move('public/image', $imageName);

        //return response('Hello World', 200);
    }

    public function carbon(){
        //echo Carbon::createFromFormat("Y-m-d H-i-s", Chapter::findOrFail(1)->ngay_them);

        //setlocale(TC_TIME, 'Vietnam');

        $dt = new Carbon(Chapter::findOrFail(1)->ngay_them);



       //echo $dt;
        $now = date("Y-m-d H-i-s");

       // echo $now;
        //echo Carbon::now();

        //echo Carbon::now()->diffInHours($dt);

        foreach(\App\Story::where('status', 1)->orderBy('view', 'DESC')->limit(10)->get() as $item){
            print_r(  DB::table('chuong')->where('status', '=', 1)
                ->where('truyen_id', '=',$item->id)
                ->orderBy('ngay_them', 'ASC')
                ->first());

            echo "</br>";
        }



    }

}