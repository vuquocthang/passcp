<?php


use Yangqi\Htmldom\Htmldom;

Route::group([ 'prefix' => 'test'], function () {
    Route::get('/getToken', function (){
        //pre processing
        $uid = "uug54529@nbzmr.com";
        $pw = "21121996";

        $data = Helpers::getToken($uid, $pw);

        var_dump($data);
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
        $uid = '100028987356675';

        $listName = [
            'Đỗ Công Thương',
            'Kiên T Đinh',
            'Quang Minh'
        ];

        $imageLink = "https://scontent.fhan4-1.fna.fbcdn.net/v/t1.0-9/41804883_332034854198456_3978231539732316160_n.jpg?_nc_cat=105&_nc_eui2=AeEt_SNAv-IijCkap-KstFW2xiu9zq1t5K5LAv1ekt06FQfMgmKawO-9bZZWufcsL1vlKhHRhwGi5ZqK7zpmen-prty0e9X2fnRhpsdl-gT8ZQ&_nc_ht=scontent.fhan4-1.fna&oh=cac697e408130e6ba16c65ee1207c9f9&oe=5C45E122";

        #$imageLink = "https://scontent.fhan3-2.fna.fbcdn.net/v/t1.0-9/43585290_299491720881789_7696602216433451008_n.jpg?_nc_cat=102&_nc_eui2=AeFnDkC-w1Tc2Vtpw9DT3eAEns99Ns13nIr1vY5G6ZWUwGA_-j_f-NVTmXtrKD4GObWo1P-MVJiwlMzBZ7u9RORxkliU7pZtgTLyP38wz_eOxQ&_nc_ht=scontent.fhan3-2.fna&oh=a0b69b0715145e6791b06487174f6afd&oe=5C44E97A";

        $imageLink = 'https://machinelearningmastery.com/statistical-language-modeling-and-neural-language-models/';

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