<?php
/**
 * Created by PhpStorm.
 * User: vuquo
 * Date: 3/16/2018
 * Time: 4:41 AM
 */

namespace App\Http\Controllers;


use App\Cat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{


    public function __construct()
    {
        $sliders = DB::table('slider')->orderBy('order', 'ASC')->get();
        $main_cats = Cat::where('parent_id', null)->orderBy('order', 'ASC')->get();
        $top_banner = DB::table('banner')->where('type', 'top')->orderBy('order', 'ASC')->first();
        $bottom_banners = DB::table('banner')->where('type', 'bottom')->orderBy('order', 'ASC')->limit(4)->get();


        View::share('sliders', $sliders);
        View::share('main_cats', $main_cats);
        View::share('top_banner', $top_banner);
        View::share('bottom_banners', $bottom_banners);
    }

    public function index(){


        return view('site.base', [

        ]);
    }

    public function cat($cat){
        return view('site.cat');
    }
}