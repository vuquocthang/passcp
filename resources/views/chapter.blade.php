@extends('base')

@section('title')
    {{ $story->ten . ' | ' . \App\Chapter::findBySlugOrFail($chapterSlug)->ten }}
    @endsection

@section('breadcrumb')

        <ul class="breadcrumb">
            <li><a href="{{ url('') }}"><i class="glyphicon glyphicon-home"></i> Trang chủ</a></li>
            <li><a href="{{ url('truyen/' . $story->slug . '.html') }}">{{ $story->ten }}</a></li>
            <li class="active"><a href="{{ url('truyen/' . $story->slug . '/' . \App\Chapter::findBySlugOrFail($chapterSlug)->slug . '.html') }}">{{ $story->ten }} – {{ \App\Chapter::findBySlugOrFail($chapterSlug)->ten }}</a></li>
        </ul>
        <h2 class="info-title single-title text-center"> {{ $story->ten }} – {{ \App\Chapter::findBySlugOrFail($chapterSlug)->ten }}</h2>
        <div class="text-center select-chapter">
            <div class="btn-group single-select-group">
                <button type="button" class="select-button btn-snazzy light-green dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Chọn chapter <span class="down-icon"><i class="glyphicon glyphicon-chevron-down"></i></span> </button>
                <ul class="dropdown-menu chap-selecter" role="menu">
                    @foreach(\App\Chapter::where('status', 1)->where('truyen_id', $story->id)->orderBy('ngay_them', 'ASC')->get() as $item )
                    <li><a href="{{ url('truyen/' . $story->slug . '/' . $item->slug . '.html' ) }}">{{ $story->ten }} – {{ $item->ten }}</a></li>
                        @endforeach
                </ul>
            </div>
            <div class="block-15px">
            </div>
            <a class="btn-snazzy light-blue" id="prev-link" href="https://www.a3manga.com/cam-ly-quy-chap-4/">← Chap trước</a>
            <a class="btn-snazzy light-blue" id="next-link" href="#">Chap sau →</a>
        </div>
        <div class="like-share-top text-center">
            <div class="fb-like fb_iframe_widget" data-href="https://www.a3manga.com/cam-ly-quy-chap-5/" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=988671374579758&amp;container_width=980&amp;href=https%3A%2F%2Fwww.a3manga.com%2Fcam-ly-quy-chap-5%2F&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=false"><span style="vertical-align: bottom; width: 122px; height: 20px;"><iframe name="fc31549d5fc00c" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like Facebook Social Plugin" src="https://www.facebook.com/v2.10/plugins/like.php?action=like&amp;app_id=988671374579758&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F0sTQzbapM8j.js%3Fversion%3D42%23cb%3Df2e68129d2ee3f4%26domain%3Dwww.a3manga.com%26origin%3Dhttps%253A%252F%252Fwww.a3manga.com%252Ff1dc3673eb2b6a4%26relation%3Dparent.parent&amp;container_width=980&amp;href=https%3A%2F%2Fwww.a3manga.com%2Fcam-ly-quy-chap-5%2F&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=false" style="border: none; visibility: visible; width: 122px; height: 20px;" class=""></iframe></span></div> &nbsp;
            <div class="fb-send fb_iframe_widget" data-href="https://www.a3manga.com/cam-ly-quy-chap-5/" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=988671374579758&amp;container_width=980&amp;href=https%3A%2F%2Fwww.a3manga.com%2Fcam-ly-quy-chap-5%2F&amp;locale=vi_VN&amp;sdk=joey"><span style="vertical-align: bottom; width: 47px; height: 20px;"><iframe name="f266951f4ad5b54" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:send Facebook Social Plugin" src="https://www.facebook.com/v2.10/plugins/send.php?app_id=988671374579758&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F0sTQzbapM8j.js%3Fversion%3D42%23cb%3Df2e13c7a4788544%26domain%3Dwww.a3manga.com%26origin%3Dhttps%253A%252F%252Fwww.a3manga.com%252Ff1dc3673eb2b6a4%26relation%3Dparent.parent&amp;container_width=980&amp;href=https%3A%2F%2Fwww.a3manga.com%2Fcam-ly-quy-chap-5%2F&amp;locale=vi_VN&amp;sdk=joey" style="border: none; visibility: visible; width: 47px; height: 20px;" class=""></iframe></span></div> &nbsp;
            <div class="d-inline hidden-xs"><span class="PIN_1504597570933_button_pin PIN_1504597570933_beside PIN_1504597570933_save PIN_1504597570933_padded" data-pin-log="button_pinit_bookmarklet" data-pin-href="https://www.pinterest.com/pin/create/button/" data-pin-x="0"><span class="PIN_1504597570933_count" data-pin-href="https://www.pinterest.com/pin/create/button/" data-pin-log="button_pinit_bookmarklet" data-pin-x="0">0</span>Lưu</span>
            </div> &nbsp;
            <div class="d-inline hidden-xs">
                <div id="___plusone_0" style="text-indent: 0px; margin: 0px; padding: 0px; background: transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 32px; height: 20px;">
                    <iframe ng-non-bindable="" frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 32px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 20px;" tabindex="0" vspace="0" width="100%" id="I0_1504597570699" name="I0_1504597570699" src="https://apis.google.com/u/0/se/0/_/+1/fastbutton?usegapi=1&amp;size=medium&amp;origin=https%3A%2F%2Fwww.a3manga.com&amp;url=https%3A%2F%2Fwww.a3manga.com%2Fcam-ly-quy-chap-5%2F&amp;gsrc=3p&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.vi.RZKvKmzJOL8.O%2Fm%3D__features__%2Fam%3DEQ%2Frt%3Dj%2Fd%3D1%2Frs%3DAGLTcCPFZM6jtvLb-jsYZkaz34D_6a9rmg#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1504597570699&amp;parent=https%3A%2F%2Fwww.a3manga.com&amp;pfname=&amp;rpctoken=21866149" data-gapiattached="true" title="G+"></iframe>
                </div>
            </div>
        </div>
        <div class="widget text-center force-center more-a">



        </div>
        @endsection

@section('top-hot')

    @endsection


@section('left')

    @endsection

@section('right')

    @endsection

@section('middle')
   <section id="view-chapter" class="text-center view-chapter">
       <?php  echo (html_entity_decode( \App\Chapter::findBySlugOrFail($chapterSlug)->noi_dung)); ?>
   </section>
@endsection

@section('bottom')
    <section class="container">
        <div class="like-share-bottom text-center">
            <div class="fb-like fb_iframe_widget" data-href="https://www.a3manga.com/cam-ly-quy-chap-5/" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=988671374579758&amp;container_width=980&amp;href=https%3A%2F%2Fwww.a3manga.com%2Fcam-ly-quy-chap-5%2F&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=false"><span style="vertical-align: bottom; width: 122px; height: 20px;"><iframe name="f3cd3fe43c35fd" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like Facebook Social Plugin" src="https://www.facebook.com/v2.10/plugins/like.php?action=like&amp;app_id=988671374579758&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F0sTQzbapM8j.js%3Fversion%3D42%23cb%3Df68bd91fc6c334%26domain%3Dwww.a3manga.com%26origin%3Dhttps%253A%252F%252Fwww.a3manga.com%252Ff1dc3673eb2b6a4%26relation%3Dparent.parent&amp;container_width=980&amp;href=https%3A%2F%2Fwww.a3manga.com%2Fcam-ly-quy-chap-5%2F&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=false" style="border: none; visibility: visible; width: 122px; height: 20px;" class=""></iframe></span></div> &nbsp;
            <div class="fb-send fb_iframe_widget" data-href="https://www.a3manga.com/cam-ly-quy-chap-5/" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=988671374579758&amp;container_width=980&amp;href=https%3A%2F%2Fwww.a3manga.com%2Fcam-ly-quy-chap-5%2F&amp;locale=vi_VN&amp;sdk=joey"><span style="vertical-align: bottom; width: 47px; height: 20px;"><iframe name="f1a4c8deb9d2684" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:send Facebook Social Plugin" src="https://www.facebook.com/v2.10/plugins/send.php?app_id=988671374579758&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F0sTQzbapM8j.js%3Fversion%3D42%23cb%3Df32142b8856bf8%26domain%3Dwww.a3manga.com%26origin%3Dhttps%253A%252F%252Fwww.a3manga.com%252Ff1dc3673eb2b6a4%26relation%3Dparent.parent&amp;container_width=980&amp;href=https%3A%2F%2Fwww.a3manga.com%2Fcam-ly-quy-chap-5%2F&amp;locale=vi_VN&amp;sdk=joey" style="border: none; visibility: visible; width: 47px; height: 20px;" class=""></iframe></span></div> &nbsp;
             &nbsp;
            <div class="d-inline hidden-xs">
                <div id="___plusone_1" style="text-indent: 0px; margin: 0px; padding: 0px; background: transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 32px; height: 20px;">
                    <iframe ng-non-bindable="" frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 32px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 20px;" tabindex="0" vspace="0" width="100%" id="I1_1504597570701" name="I1_1504597570701" src="https://apis.google.com/u/0/se/0/_/+1/fastbutton?usegapi=1&amp;size=medium&amp;origin=https%3A%2F%2Fwww.a3manga.com&amp;url=https%3A%2F%2Fwww.a3manga.com%2Fcam-ly-quy-chap-5%2F&amp;gsrc=3p&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.vi.RZKvKmzJOL8.O%2Fm%3D__features__%2Fam%3DEQ%2Frt%3Dj%2Fd%3D1%2Frs%3DAGLTcCPFZM6jtvLb-jsYZkaz34D_6a9rmg#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I1_1504597570701&amp;parent=https%3A%2F%2Fwww.a3manga.com&amp;pfname=&amp;rpctoken=29106657" data-gapiattached="true" title="G+"></iframe>
                </div>
            </div>
        </div>
        <div class="block-15px"></div>
        <div class="text-center select-chapter"> <a class="btn-snazzy light-blue" href="https://www.a3manga.com/cam-ly-quy-chap-4/">← Chap trước</a> <a class="btn-snazzy light-blue" href="#">Chap sau →</a>
            <div class="block-15px"></div>
            <div class="btn-group single-select-group">
                <button type="button" class="select-button btn-snazzy light-green dropdown-toggle" data-toggle="dropdown"> Chọn chapter <span class="down-icon"><i class="glyphicon glyphicon-chevron-down"></i></span> </button>
                <ul class="dropdown-menu chap-selecter" role="menu">
                    @foreach(\App\Chapter::where('status', 1)->where('truyen_id', $story->id)->orderBy('ngay_them', 'ASC')->get() as $item )
                        <li><a href="{{ url('truyen/' . $story->slug . '/' . $item->slug . '.html' ) }}">{{ $story->ten }} – {{ $item->ten }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="block-15px"></div>

            <!-- <form action="https://docs.google.com/forms/d/1sVDrOZOcNgVBXVboJsT08CneXVDPw9jt0boUWRU6Qxc/formResponse" method="POST" target="_blank" id="ss-form">
                <input type="hidden" name="entry.2025259344" value="Cẩm Lý Quy – Chap 5" id="entry_2025259344">
                <input type="hidden" name="entry.1037048843" value="https://www.a3manga.com/cam-ly-quy-chap-5/" id="entry_1037048843">
                <button type="submit" class="btn-snazzy red"><i class="glyphicon glyphicon-exclamation-sign"></i> Báo truyện hỏng</button>
            </form> -->
        </div>
        <div class="widget text-center force-center more-a">


        </div>

        <div class="widget">
            <div class="bs-callout bs-callout-danger info">
                <img style="width: 50%; margin: auto; display: block" src="{{ url('public/image/' . \App\Ads::findOrFail(3)->image_link) }}">
            </div>
        </div>
        
        <div>
            <h3 class="org-title">Bình luận</h3>
            <div class="row">
                <div class="col-md-6 margin-bottom-15px">
                    <div class="fb-comments fb_iframe_widget" data-href="https://www.a3manga.com/cam-ly-quy-chap-5/" data-numposts="100" data-colorscheme="light" data-width="475" fb-xfbml-state="rendered"><span style="height: 252px; width: 475px;"><iframe id="f1c4bc69bafbfb" name="fc6ccd1860fb78" scrolling="no" title="Facebook Social Plugin" class="fb_ltr" src="https://www.facebook.com/plugins/comments.php?api_key=988671374579758&amp;channel_url=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F0sTQzbapM8j.js%3Fversion%3D42%23cb%3Df3b116899e0278%26domain%3Dwww.a3manga.com%26origin%3Dhttps%253A%252F%252Fwww.a3manga.com%252Ff1dc3673eb2b6a4%26relation%3Dparent.parent&amp;colorscheme=light&amp;href=https%3A%2F%2Fwww.a3manga.com%2Fcam-ly-quy-chap-5%2F&amp;locale=vi_VN&amp;numposts=100&amp;sdk=joey&amp;skin=light&amp;version=v2.10&amp;width=475" style="border: none; overflow: hidden; height: 252px; width: 475px;"></iframe></span></div>
                </div>

                
            </div>
        </div>
    </section>

    @endsection