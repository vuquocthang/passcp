<?php

namespace App\Http\Controllers\Admin;

use App\ChangeName;
use App\Uid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class NameController extends Controller
{
    //tên
    public function addForm(Request $request){
        $directory = $request->user()->id;

        $files = Storage::files($directory);

        //dd($files);

        return view('admin.names', [
            'files' => $files
        ]);
    }

    public function add(Request $request){
        $path = $request->file('file')->store($request->user()->id);

        return redirect()->back();
    }

    public function delete(Request $request, $path){
        Storage::delete( $request->user()->id . "/" . $path);

        return redirect()->back();
    }

    public function view($path){

    }

    //thay đổi tên của uid
    public function change(Request $request){
        //return $request->all();

        $uids = Uid::whereIn('id', $request->ids)
            ->where('status', 'Live')
            ->get();

        //return $uids;

        foreach ($uids as $uid){

            try{
                $CN = new ChangeName($uid);
                $CN->login()->changeName();
            }catch (\Exception $e){

            }
        }

        return "done";
    }
}
