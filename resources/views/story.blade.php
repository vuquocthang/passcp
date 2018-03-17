@extends('base')

@section('title')
    {{ $story->ten }}
@endsection

@section('top-hot')

    @endsection

@section('breadcrumb')
        <ul class="breadcrumb">
            <li>
                <a href="{{ url('') }}"><i class="glyphicon glyphicon-home"></i> Trang chủ</a>
            </li>
            <li class="active">
                <a href="{{ url('truyen/' . $story->slug. '.html') }}">{{ $story->ten }}</a>
            </li>
        </ul>


@endsection

@section('left')
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-6 margin-bottom-15px">
                <img class="img-thumbnail" src="{{ url('public/image/' . $story->image_link) }}" alt="{{ $story->ten }}">
            </div>
            <div class="col-md-6 comic-info">
                <h2 class="info-title">{{ $story->ten }}</h2>
                <p>
                    <strong>Tên khác:</strong>
                    <span>{{ $story->ten_khac }}</span>
                    <br> <strong>Tác giả:</strong> <span class="green"> Đang cập nhật
                                </span>
                    <br> <strong>Lượt xem:</strong> {{ $story->view }}
                    <br> <strong>Thể loại:</strong>
                    @foreach(\App\CategoryStory::where('truyen_id', $story->id)->get() as $item)
                        <a href="{{ url('the-loai/' . \App\Category::findOrFail($item->the_loai_id)->slug) .'.html' }}">{{ \App\Category::findOrFail($item->the_loai_id)->ten }}</a> ,
                    @endforeach
                    <br> <strong>Nhóm dịch:</strong> {{ $story->nhom_dich }}
                    <br> <strong>Tình trạng:</strong> <span>{{ $story->tinh_trang }}</span>
                    <br> <strong>Nguồn:</strong>
                    <span class="org">
                        {{ $story->nguon }}
                    </span>
                    <br> <strong>Ngày thêm:</strong> {{ (new \Carbon\Carbon($story->ngay_them))->format('d/m/Y') }}</p>
                <div class="margin-bottom-15px">
                    <div class="fb-like fb_iframe_widget" data-href="https://www.a3manga.com/truyen-tranh/cam-ly-quy/" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=988671374579758&amp;container_width=307&amp;href=https%3A%2F%2Fwww.a3manga.com%2Ftruyen-tranh%2Fcam-ly-quy%2F&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=false"><span style="vertical-align: bottom; width: 128px; height: 20px;"><iframe name="f14738fdb679a24" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like Facebook Social Plugin" src="https://www.facebook.com/v2.10/plugins/like.php?action=like&amp;app_id=988671374579758&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F0sTQzbapM8j.js%3Fversion%3D42%23cb%3Df3081006bab63%26domain%3Dwww.a3manga.com%26origin%3Dhttps%253A%252F%252Fwww.a3manga.com%252Ff2201538a4f3f7c%26relation%3Dparent.parent&amp;container_width=307&amp;href=https%3A%2F%2Fwww.a3manga.com%2Ftruyen-tranh%2Fcam-ly-quy%2F&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=false" style="border: none; visibility: visible; width: 128px; height: 20px;" class=""></iframe></span></div> &nbsp;
                    <div class="fb-send fb_iframe_widget" data-href="" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=988671374579758&amp;container_width=307&amp;href=https%3A%2F%2Fwww.a3manga.com%2Ftruyen-tranh%2Fcam-ly-quy%2F&amp;locale=vi_VN&amp;sdk=joey"><span style="vertical-align: bottom; width: 47px; height: 20px;"><iframe name="f3274ddefef8fb4" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:send Facebook Social Plugin" src="https://www.facebook.com/v2.10/plugins/send.php?app_id=988671374579758&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F0sTQzbapM8j.js%3Fversion%3D42%23cb%3Df135fab8b7328%26domain%3Dwww.a3manga.com%26origin%3Dhttps%253A%252F%252Fwww.a3manga.com%252Ff2201538a4f3f7c%26relation%3Dparent.parent&amp;container_width=307&amp;href=https%3A%2F%2Fwww.a3manga.com%2Ftruyen-tranh%2Fcam-ly-quy%2F&amp;locale=vi_VN&amp;sdk=joey" style="border: none; visibility: visible; width: 47px; height: 20px;" class=""></iframe></span></div> &nbsp;
                    <div class="d-inline hidden-xs">
                        <div id="___plusone_0" style="text-indent: 0px; margin: 0px; padding: 0px; background: transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 32px; height: 20px;">
                            <iframe ng-non-bindable="" frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 32px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 20px;" tabindex="0" vspace="0" width="100%" id="I0_1504596799326" name="I0_1504596799326" src="https://apis.google.com/u/0/se/0/_/+1/fastbutton?usegapi=1&amp;size=medium&amp;origin=https%3A%2F%2Fwww.a3manga.com&amp;url=https%3A%2F%2Fwww.a3manga.com%2Ftruyen-tranh%2Fcam-ly-quy%2F&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.vi.RZKvKmzJOL8.O%2Fm%3D__features__%2Fam%3DEQ%2Frt%3Dj%2Fd%3D1%2Frs%3DAGLTcCPFZM6jtvLb-jsYZkaz34D_6a9rmg#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1504596799326&amp;parent=https%3A%2F%2Fwww.a3manga.com&amp;pfname=&amp;rpctoken=12154387" data-gapiattached="true" title="G+"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="widget">
            <div class="margin-bottom-15px">
                <p>
                    {{ $story->mo_ta }}
                </p>
                <div class="widget text-center force-center more-a">

                    <img style="width: 50%; margin: auto" src="{{ url('public/image/' . \App\Ads::findOrFail(2)->image_link) }}">
                </div>

            </div>
        </div>

        <div class="widget">
            <h3 class="org-title">Danh sách tập truyện</h3>
            <div class="table-wrapper">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Chapter</th>
                        <th>Ngày đăng</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach(\App\Chapter::where('status', 1)->where('truyen_id', $story->id)->orderBy('ngay_them', 'DESC')->get() as $item )
                    <tr>
                        <td>
                            <a href="{{ url('truyen/' . $story->slug . '/' . $item->slug . '.html') }}">{{ $story->ten }} – {{$item->ten}}</a>
                        </td>

                        <td>{{ (new \Carbon\Carbon($item->ngay_them))->format('d/m/Y') }}</td>
                    </tr>
                   @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="widget">
            <h3 class="org-title">Bình luận</h3>
            <div class="fb-comments fb_iframe_widget" data-href="{{ \Illuminate\Support\Facades\Request::url() }}" data-numposts="25" data-colorscheme="light" data-width="643" fb-xfbml-state="rendered"><span style="height: 328px; width: 643px;"><iframe id="f34ccfd180e08a4" name="f2a6b5a61923968" scrolling="no" title="Facebook Social Plugin" class="fb_ltr" src="https://www.facebook.com/plugins/comments.php?api_key=988671374579758&amp;channel_url=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F0sTQzbapM8j.js%3Fversion%3D42%23cb%3Df2386941281b528%26domain%3Dwww.a3manga.com%26origin%3Dhttps%253A%252F%252Fwww.a3manga.com%252Ff2201538a4f3f7c%26relation%3Dparent.parent&amp;colorscheme=light&amp;href=https%3A%2F%2Fwww.a3manga.com%2Ftruyen-tranh%2Fcam-ly-quy%2F&amp;locale=vi_VN&amp;numposts=25&amp;sdk=joey&amp;skin=light&amp;version=v2.10&amp;width=643" style="border: none; overflow: hidden; height: 328px; width: 643px;"></iframe></span></div>
        </div>
    </div>
@endsection

@section('right')
    @parent
@endsection