<?php
/**
 * Created by PhpStorm.
 * User: vuquo
 * Date: 9/5/2017
 * Time: 4:51 PM
 */

namespace App\Http\Controllers\Admin;


use App\Ads;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdsController extends Controller
{

    public function editForm(){
        return view('admin.ads.edit');
    }

    public function edit(Request $request){
        $input = \Illuminate\Support\Facades\Request::all();

        $ads = Ads::findOrFail(1);

        if ($request->image_link != null) {
            //neu ten khac voi anh cu
            if ($request->image_link->getClientOriginalName() != null) {

                    $imageName = time() . '.' . $request->image_link->getClientOriginalExtension();
                    $request->image_link->move('public/image', $imageName);

                    $input['image_link'] = $imageName;

            }

        }

        $ads->fill($input);

        $ads->save();

        return redirect('admin/quang-cao/sua');
    }
}