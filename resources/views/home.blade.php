@extends('base')


@section('top-hot')
    <div class="top-hot">
        <div id="owl-top-hot" class="owl-carousel">
            @foreach(\App\Slide::all() as $item)
                <div class="item">
                    <a href="{{ url('truyen/' . \App\Story::findOrFail($item->truyen_id)->slug . '.html') }}" title="{{ \App\Story::findOrFail($item->truyen_id)->ten }}">
                        <img class="img-thumbnail" src="{{ url('public/image/' . \App\Story::findOrFail($item->truyen_id)->image_link) }}" alt="{{ \App\Story::findOrFail($item->truyen_id)->ten }}">
                        <h3>{{ \App\Story::findOrFail($item->truyen_id)->ten }}</h3>
                    </a>

                    <a href="{{ url('truyen/' . \App\Story::findOrFail($item->truyen_id)->slug . '/' . $item->slug . '.html' ) }}">
                        <p class="chap"> {{ \App\Chapter::findOrFail($item->chuong_id)->ten  }}</p>

                        <?php

                        $dt = new \Carbon\Carbon( \App\Chapter::findOrFail($item->chuong_id)->ngay_them);
                        $now = \Carbon\Carbon::now();

                        $diffForHuman = '';


                        $diffInMinutes = $now->diffInMinutes($dt);
                        $diffInHours = $now->diffInHours($dt);
                        $diffInDays = $now->diffInDays($dt);

                        if ($diffInMinutes >= 0 && $diffInMinutes< 60){
                            $diffForHuman = $diffInMinutes .' phút trước';
                        }elseif ($diffInHours >= 0 && $diffInHours < 24){
                            $diffForHuman = $diffInHours .' giờ trước';
                        }elseif ($diffInDays >=0 && $diffInDays<= 7){
                            $diffForHuman = $diffInDays .' ngày trước';
                        }else{
                            $diffForHuman = $dt->format('d-m-Y');
                        }

                        ?>
                        <p class="chap-date"><i class="glyphicon glyphicon-time"></i> <?php echo $diffForHuman ?></p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

@endsection

@section('title')
Trang Chủ
@endsection

@section('container')

    @parent
@endsection


@section('sidebar')
    @parent
@endsection