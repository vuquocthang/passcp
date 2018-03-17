@extends('base')

@section('title')
    Danh Sách Thể Loại
    @endsection

@section('top-hot')


    @endsection

@section('left')
    <div class="col-md-8">
        <h2 class="org-title">Danh Sách Thể loại</h2>
        <div class="comic-list-page">
            <table class="comic-list-table table table-striped">
                <thead>
                <tr>
                    <th style="width: 10%;">#</th>
                    <th style="width: 45%;">Tên thể loại</th>

                </tr>
                </thead>
                <tbody>
                @foreach(\App\Category::where('status' , 1)->get() as $key => $value  )
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td><a href="{{ url('the-loai/' . $value->slug . '.html' ) }}"> {{ $value->ten }} </a></td>

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