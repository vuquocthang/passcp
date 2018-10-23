<?php


use Yangqi\Htmldom\Htmldom;

Route::group([ 'prefix' => 'test'], function () {
    Route::get('/getToken', function (){
        //pre processing
        $uid = "100007563310713";
        $pw = "vanhuan1992@@@";

        $token = Helpers::getToken($uid, $pw);

        return $token;
    });

    Route::get('/getListFriends', function (){

        $token = "EAAAAAYsX7TsBAO3dqGC1Y4QNELDblrXhPOu3Hgm7fuCVnbsafYZCknSFm4QgzZBhpuBhtkM0Y1hqD7t1nZBsmskAAvIrElYw3YXAosFj4aoXBsLvnqJSDlHm5OnO9BZAhX1VVoJCchgaZBjsM2CneaKujqlpZBcZBQil7ffLf7q5LmqZBUN7ZA55DYP3FQ0BGjd7b7KORODfNuqrSulZCGAarmusUKXH36XacZD";
        $uid = "me";

        $data = Helpers::getListFriends($token, $uid);

        return $data;

        //var_dump( json_decode($data) );
    });

    Route::get('/getListPhotos', function (){

        $token = "EAAAAAYsX7TsBAO3dqGC1Y4QNELDblrXhPOu3Hgm7fuCVnbsafYZCknSFm4QgzZBhpuBhtkM0Y1hqD7t1nZBsmskAAvIrElYw3YXAosFj4aoXBsLvnqJSDlHm5OnO9BZAhX1VVoJCchgaZBjsM2CneaKujqlpZBcZBQil7ffLf7q5LmqZBUN7ZA55DYP3FQ0BGjd7b7KORODfNuqrSulZCGAarmusUKXH36XacZD";
        $uid = "me";

        $data = Helpers::getListPhotos($token, $uid);

        var_dump( json_decode($data) );
    });

    Route::get('/isCheckpoint', function (){

        $token = "1EAAAAAYsX7TsBAO3dqGC1Y4QNELDblrXhPOu3Hgm7fuCVnbsafYZCknSFm4QgzZBhpuBhtkM0Y1hqD7t1nZBsmskAAvIrElYw3YXAosFj4aoXBsLvnqJSDlHm5OnO9BZAhX1VVoJCchgaZBjsM2CneaKujqlpZBcZBQil7ffLf7q5LmqZBUN7ZA55DYP3FQ0BGjd7b7KORODfNuqrSulZCGAarmusUKXH36XacZD";

        $data = Helpers::isCheckpoint($token);

        var_dump($data);
    });

    Route::get('/backup', function (){

        ini_set('max_execution_time', 30000);

        $uid = "100028987356675";
        $token = "EAAAAAYsX7TsBABAc0nMPSEFwGeZCFCjzZBig2DPjsFm7aRcq2CvfPDgqQSFZCUE4GoMz3HT2cZBHCw2pBDliXHbjsvnaFKJ3WmNWPyCkiruftowtgarsPTFAUmZCp1HJPuTpnAHNP9WRGcefX9Ov3vy6AI41RTUB8Ntc5cpmkEn7RqyQtOVExgJBxDf1SkLtWT2V1syNiMJq5fRSDf5VH";
        Helpers::backup($token, $uid);


    });


    Route::get('/passcp', function (){
        $PassCP = new \App\PassCheckpoint(null);

        $PassCP->login()->next()->selectVerificationMethod()->pass()->pass()->pass()->pass()->pass();
    });

    Route::get('/getVerificationMethods', function (){
        $html = new Htmldom("verification_method.html");

        $rs = [];

        foreach ($html->find("select[name=verification_method] option") as $element){
            $rs[] = $element->innerText;
        }

        return $rs;
    });

    Route::get('/listPhotoFromChoicesName', function (){
        $uid = \App\Uid::with('friends')->where('pw', '!=', null)->first();

        $names = [
            'Ho Ngoc Ha',
            'Em Nho Anh'
        ];

        return $uid->getListPhoto($names);
    });

    Route::get('/birthdayDay', function (){
        $uid = \App\Uid::with('friends')->where('pw', '!=', null)->first();


        return $uid->birthdayDay();
    });

    Route::get('/process', function (){
        $choicesName = [
            'Ho Ngoc Ha',
            'Em Nho Anh',
            'Lê Thúy Hạnh',
            'Băng Cũng Đã Tan',
            'Nguyễn Mạnh Hiếu',
            'Thùy Phương Trần',
            'Kim Ngọc'
        ];

        $imageLink = "https://scontent.fhan3-3.fna.fbcdn.net/v/t1.0-9/10686995_294614984073057_6878726299304048617_n.jpg?_nc_cat=100&oh=0d42bafc1a17a3ceb578417a4a6abab6&oe=5C3E33A7";

        $imageLink = "https://scontent.fhan3-1.fna.fbcdn.net/v/t1.0-9/934846_894741847237293_9135490607444035629_n.jpg?_nc_cat=102&oh=2d9010483f21185f545251ebf8a0dac1&oe=5C3D1D4A";

        $imageLink = "https://scontent.fhan3-2.fna.fbcdn.net/v/t1.0-0/p206x206/43514640_2111734795823346_1372624986061144064_n.jpg?_nc_cat=107&oh=f6fca69f97c15f8e2dc9f0afea0882ed&oe=5C4220E5";

        $imageLink = "https://scontent.fhan3-3.fna.fbcdn.net/v/t1.0-9/43236096_2110118602651632_770504509993517056_n.jpg?_nc_cat=100&oh=70af4550bce2f042a9318bf5f6240b16&oe=5C49AEA4";

        $uid = \App\Uid::find(254);

        $uid->detectImage($choicesName, $imageLink);


    });

    Route::get('/process2', function (){

        ini_set('max_execution_time', 30000);

        $uid = '100007563310713';

        /*
        $listName = [
            'Đỗ Công Thương',
            'Kiên T Đinh',
            'Quang Minh',
            'Đỗ Trọng Sang Xuân',
            'Tien Phan',
            'Thuyền Nguyễn',
            'Nguyễn Anh Tuấn',
            'An Trần',
            'Mong Mit Nguyen',
            'Nguyễn Vạn Toàn'
        ];

        $listName = [
            'Truong Thi',
            'Tổng Đài Messenger',
            'Hỏi Làm Chi',
            'Lê Sandy',
            'Heo Lỳ',
            'Minh Thư Nguyễn',
            'Dung Nguyễn'
        ];*/

        $listName = [
            'Kẹo Đắng',
            'Linh Lớn',
            'Khang Kundy',
            'Statusi Đểu Và Chất',
            'Jonny Nguyễn',
            'Bảo Nam',
            '吳榮霖',
        ];

        $listName = [
            'Pé Ti',
            'Phượng Nguyễn',
            'Sang Nguyen',
            'Daniel Phan vỢ tHằng',
            'Lo Bay',
            'Nguyễn Thị Vy',
            'Trúc Trần'
        ];

        $listName = [
            'Người đứng Sau Hp',
            'Giọt Nước Rơi',
            'Tuấn Anh Sky',
            'Cường Lord',
            'Nguyễn Thế Điệp',
            'Hoàng Minh',
            'Hoang Nguyen',
            'Đồng Cường'
        ];


        //$imageLink = 'https://www.facebook.com/captcha/friend_name_image.php?m=1&tag=AZl-HXBPcOr9mPfUN2Tm1ZB0SZRX7vXRw71VnUtE2c8VH74b6v_18m1Byl-pSSA4TV0x8zg5y9r8k1toqu8M6fm1RdokHkLFXlbbcnhLCryWhkuba5dQsTh88nrMpb0ZF5LaH9ibpyQx2GEms7vYwYxkrWekIAo1B5E6nRMHQE9pCzBCHGW0-DWuUg-0bwrrnqJ2cDE2SjCASSguCRRQta3UftaLRqm2G99GmDuMkutJCH8_GI9Sxw7Kx20QpuyQyP1Av5K1-wfJtS1HGkQUxHJccTI06JZ0--yBT8t7a_Xvk7ic8LnOFyKU1hO8emZjQvHHe_pXJ0DodF-M28JwEcwEqFi_3TJlnZ4wIz4hlHbEq3jI7G8GjSY7-NvIaQy_ckKAi0qIhbfONPzTJu-yntLBiwMw3p1Qa48hTxtG5r3gsmGHVzH5qs16Y8yjlUqf7UBe7JfDGgUqRqUg1Te2_xgZ&w=275';

        $imageLink = 'https://www1.xup.in/exec/ximg.php?fid=19276239';

        $imageLink = 'https://scontent.fhan3-1.fna.fbcdn.net/v/t1.0-9/23318983_360776704347883_4188700453161196186_n.jpg?_nc_cat=110&_nc_ht=scontent.fhan3-1.fna&oh=7f63abaf54057aed4139efbfd4d5dded&oe=5C3FC3D0';

        echo \App\PassCheckpointHelper::checkImage($uid, $listName, $imageLink);

    });

    Route::get('/changeName', function (){

        $uid = \App\Uid::find(254);

        $uid->uid = '1000289873566751';
        $uid->pw = '21121996';

        $CN = new \App\ChangeName($uid);

        $login = $CN->login(); //->changeName();

        if ($login === false){
            echo "Không thể login";
        }else{
            $login->changeName();
        }

    });

    Route::get('/generateEmail', function (){
        $uid = \App\Uid::find(254);

        $CE = new \App\ChangeEmail($uid);

        echo $CE->createEmail("abc.com");

    });


});