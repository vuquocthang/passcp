<?php

namespace App\Http\Controllers\Admin;

use App\Uid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    public function add(){

    }

    /**
     * //Thay đổi group của uid
     * @param Request $request
     */
    public function changeGroup(Request $request){

        foreach ($request->ids as $id){
            $uid = Uid::find($id);

            $uid->group_id = $request->change_group_id;
            $uid->save();
        }

    }
}
