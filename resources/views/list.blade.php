@extends('base')

@section('title')
    Danh Sách Truyện
    @endsection


@section('top-hot')

@endsection


@section('left')

    <div class="col-md-8">
        <h2 class="org-title">Truyện xem nhiều</h2>
        <div class="comic-list">




            <div class="row responsive-row">

                @php


                    $chaps= \App\TopView::paginate(20);

                @endphp
                @foreach($chaps as $chap)

                    <?php
                        $chap = \App\Chapter::findOrFail($chap->chuong_id);

                    ?>

                    <div class="col-md-6 comic-item">
                        <div class="comic-img">
                            <a href="{{ url('truyen/' . \App\Story::findOrFail($chap->truyen_id)->slug . '.html' ) }}" title="{{ \App\Story::findOrFail($chap->truyen_id)->ten }}">
                                <img class="img-thumbnail" src="{{ url('public/image') }}/{{ \App\Story::findOrFail($chap->truyen_id)->image_link }}" alt="">
                            </a>
                        </div>
                        <div class="comic-title-link">
                            <a href="{{ url('truyen/' . \App\Story::findOrFail($chap->truyen_id)->slug . '.html' ) }}" title="{{ \App\Story::findOrFail($chap->truyen_id)->ten }}">
                                <h3 class="comic-title">
                                    {{ \App\Story::findOrFail($chap->truyen_id)->ten }}
                                </h3>
                            </a>
                            <a href="{{ url('truyen/' . \App\Story::findOrFail($chap->truyen_id)->slug . '/' . $chap->slug . '.html' ) }}">{{ $chap->ten }}</a>


                            <?php

                            $dt = new \Carbon\Carbon($chap->ngay_them);
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

                            <span class="uptime">
                                <i class="glyphicon glyphicon-time"></i> {{ $diffForHuman }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>



        </div>
        <div class="clearfix"></div>

    </div>

@endsection