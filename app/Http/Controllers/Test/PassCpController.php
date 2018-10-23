<?php
namespace App\Http\Controllers\Test;


use App\ChangeName;
use App\PassCheckpoint;
use App\Uid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class PassCpController
{
    private $uid;

    public function __construct()
    {
        $this->uid = new Uid([
            //'uid' => 'bdg36637@awsoo.com',
            //'pw' => '21121996'
            'uid' => 'emlahoa.hong.7',
            'pw' => 'vanhuan1992@@'
        ]);

    }


    public function login(){
        $PassCheckpointMonitor = new PassCheckpoint($this->uid);

        //login
        $PassCheckpointMonitor = $PassCheckpointMonitor->login();
        $loginRaw = $PassCheckpointMonitor->raw;
        Storage::disk('public_uploads')->put('login.html', $loginRaw);

        //next
        $PassCheckpointMonitor = $PassCheckpointMonitor->next();
        $nextRaw = $PassCheckpointMonitor->raw;
        Storage::disk('public_uploads')->put('next.html', $nextRaw);

        //select method
        $PassCheckpointMonitor = $PassCheckpointMonitor->selectVerificationMethod();
        $selectVerificationMethodRaw = $PassCheckpointMonitor->raw;
        Storage::disk('public_uploads')->put('method.html', $selectVerificationMethodRaw);

        return view('test.passcp');
    }
}