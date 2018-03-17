@extends('base')

@section('title')
    {{ $category->ten }}
@endsection

@section('top-hot')

@endsection


@section('left')
    <div class="col-md-8">
        <h2 class="org-title">Thể loại: {{ $category->ten }}</h2>
        <div class="comic-list-page">
            <table class="comic-list-table table table-striped">
                <thead>
                <tr>
                    <th style="width: 10%;">#</th>
                    <th style="width: 45%;">Tên truyện</th>
                    <th style="width: 25%;">Mới nhất</th>
                </tr>
                </thead>

                @php
                    $stories = DB::table('truyen')
                ->select('truyen.*' )
                ->join('the_loai_truyen', 'truyen.id', '=', 'the_loai_truyen.truyen_id')
                ->join('the_loai', 'the_loai_truyen.the_loai_id', '=', 'the_loai.id')
                ->where('truyen.status', 1)
                ->where('the_loai.id', $category->id)
                ->get();

                @endphp
                <tbody>

                @foreach($stories as $key => $value  )
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        <img width="30%" src="{{ url('public/image/' . $value->image_link) }}" />
                        <a href="{{ url('truyen/' . $value->slug . '.html' ) }}"> {{ $value->ten }} </a>
                    </td>
                    <td>
                        <a href="{{ url('truyen/' . $value->slug . '/' . \App\Chapter::where('truyen_id', $value->id)->orderBy('ngay_them', "DESC")->firstOrFail()->slug . '.html' ) }}">
                            {{ \App\Chapter::where('truyen_id', $value->id)->orderBy('ngay_them', "DESC")->firstOrFail()->ten }}
                        </a>
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <div class="clearfix"></div>
    </div>
@endsection


@section('right')
    @parent
@endsection