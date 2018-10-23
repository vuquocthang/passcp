<?php

namespace App\Http\Controllers\Admin;


use App\Group;
use App\Http\Controllers\Controller;
use App\PassCheckpoint;
use App\Uid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.user');

    }

    public function index(){
        return redirect('clones');

        //return view('admin.base', []);
    }

    //them clone
    public function addForm(){
        return view('admin.add');
    }

    public function add(Request $request){
        $data = $request->data;

        try{
            $lines = explode("\n", $data);

            foreach ($lines as $line){
                try{
                    $clone = explode("|", $line);
                    $_uid = $clone[0];
                    $pw = $clone[1];
                    $token = $clone[2];

                    $uid = Uid::create([
                        'user_id' => $request->user()->id,
                        'uid' => $_uid,
                        'pw' => $pw,
                        'token' => $token,
                        'group_id' => $request->group_id
                    ]);

                    //kiểm tra checkpoint
                    $isCheckpoint = \Helpers::isCheckpoint($token);

                    //nếu bị checkpoint thì là loại NotBackup còn không thì là loại Backup
                    if( !$isCheckpoint){
                        $uid->type = 'LiveWhenSave';
                        $uid->status = "Live";
                    }else{
                        $uid->type = 'CheckpointWhenSave';
                        $uid->status = "Checkpoint";
                    }

                    $uid->save();
                }catch (\Exception $e){
                    echo $e;
                }
            }
        }catch (\Exception $e){
            echo $e;
        }


        return redirect('clones');
    }

    //danh sach clone
    public function clones(Request $request){

        $groupId = $request->get('group_id');

        $clones = $request->user()->uids();

        if ($groupId && $groupId != 'all'){
            $clones = $clones->where('group_id', $groupId);
        }

        $clones = $clones->get();

        return view('admin.clones', compact('clones'));
    }

    //xóa clone
    public function deleteClone(Request $request, $id){
        $request->user()->uids()->where('id', $id)->first()->photos()->update([
            'uid_id' => null
        ]);

        $request->user()->uids()->where('id', $id)->first()->friends()->update([
            'friend_of' => null
        ]);

        $request->user()->uids()->where('id', $id)->delete();

        return redirect()->back();
    }

    //backup clone
    public function backup(Request $request, $id){
        ini_set('max_execution_time', 30000);

        $clone = Uid::find($id);

        try{
            \Helpers::backup($clone->token, $clone->uid);
        }catch (\Exception $e){

        }

        return redirect()->back();
    }

    public function backupByFriend(Request $request, $id){
        try{
            $uid = Uid::find($id);
            $token = $request->token;

            $result = \Helpers::backupByFriend($uid, $token);

            return $result;
        }catch (\Exception $e){
            return "Có lỗi xảy ra vui lòng thử lại !";
        }
    }

    public function isCheckpoint($id){
        $uid = Uid::find($id);

        $check = \Helpers::isCheckpoint($uid->token);

        if ( !$check ){
            $uid->status = "Live";
        }else{
            $uid->status = "Checkpoint";
        }

        $uid->save();

        return $uid->status;
    }

    public function passCheckpoint($id){
        $uid = Uid::find($id);

        $status = $this->isCheckpoint($id);

        if($status == 'Live'){
            return "Live";
        }

        try{
            $PassCP = new PassCheckpoint($uid);
            //$PassCP->login(); //->next()->selectVerificationMethod();
            $PassCP->login()->next()->selectVerificationMethod()->pass()->pass()->pass()->pass()->pass();

            return "Đã xong";
        }catch (\Exception $e){
            return "Có lỗi";
        }
    }




    //group
    public function addGroup(Request $request){

        $input = $request->all();
        $input['user_id'] = $request->user()->id;

        $group = Group::create($input);

        return $group;
    }
}