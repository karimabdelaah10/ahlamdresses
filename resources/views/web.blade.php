@extends('layouts.web-layout')
@section('content')

    <!-- Header Section Begin -->
    <header class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <p>
                            <a style="color: #ffffff"
                               href="https://wa.me/{{$user->whats_app_number}}/?text={{$user->whats_app_message}}"
                               target="_blank">
                                <i class="fa fa-whatsapp " aria-hidden="true"></i>
                                {{$user->header_footer_qut ?? ''}}
                            </a>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Banner Section Begin -->
    <section class="banner spad">
        <div class="container">
            <div class="row">
                <?php
                $i = 1;
                ?>
                @foreach($rows as $row)
                    @if($i == 1)
                        <div class=" col-lg-7 offset-lg-4 ">
                            <div class="banner__item">
                                <div class="banner__item__pic">
                                    <img src="{{image($row->path ,'large')}}" alt="{{$row->title}}">
                                </div>
                                <div class="banner__item__text">
                                        <?php
                                        $url = "https://wa.me/" . $user->whats_app_number . "/?text=" . $user->whats_app_message;
                                        $icon = true;
                                        $linkQut = 'تواصل معنا';
                                        if (!empty($row->url)) {
                                            $url = $row->url;
                                            $icon = false;
                                            $linkQut = 'للمزيد';
                                        }
                                        ?>
                                    <h2>{{$row->title}}</h2>
                                    <a target="_blank" href="{{$url}}">
                                        @if($icon)
                                            <i style="color: #36e54d" class="fa fa-whatsapp" aria-hidden="true"></i>
                                        @endif
                                        {{$linkQut}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @elseif($i%2 == 0)
                        <div class="col-lg-5">
                            <div class="banner__item banner__item--middle">
                                <div class="banner__item__pic">
                                    <img src="{{image($row->path ,'large')}}" alt="{{$row->title}}">
                                </div>
                                <div class="banner__item__text">
                                        <?php
                                        $url = "https://wa.me/" . $user->whats_app_number . "/?text=" . $user->whats_app_message;
                                        $icon = true;
                                        $linkQut = 'تواصل معنا';
                                        if (!empty($row->url)) {
                                            $url = $row->url;
                                            $icon = false;
                                            $linkQut = 'للمزيد';
                                        }
                                        ?>
                                    <h2>{{$row->title}}</h2>
                                    <a target="_blank" href="{{$url}}">
                                        @if($icon)
                                            <i style="color: #36e54d" class="fa fa-whatsapp" aria-hidden="true"></i>
                                        @endif
                                        {{$linkQut}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @elseif($i%3 == 0)
                        <div class="col-lg-7">
                            <div class="banner__item banner__item--last">
                                <div class="banner__item__pic">
                                    <img src="{{image($row->path ,'large')}}" alt="{{$row->title}}">
                                </div>
                                <div class="banner__item__text">
                                        <?php
                                        $url = "https://wa.me/" . $user->whats_app_number . "/?text=" . $user->whats_app_message;
                                        $icon = true;
                                        $linkQut = 'تواصل معنا';
                                        if (!empty($row->url)) {
                                            $url = $row->url;
                                            $icon = false;
                                            $linkQut = 'للمزيد';
                                        }
                                        ?>
                                    <h2>{{$row->title}}</h2>
                                    <a target="_blank" href="{{$url}}">
                                        @if($icon)
                                            <i style="color: #36e54d" class="fa fa-whatsapp" aria-hidden="true"></i>
                                        @endif
                                        {{$linkQut}}

                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                        <?php $i++ ?>
                @endforeach
            </div>
        </div>
    </section>
    <section class="testimonial">
        <div class="container-fluid">
            <div class="row">
                <div
                    @if($user->youtube_vid_url)
                        class="col-lg-6 p-0"
                @else
                    class="col-lg-12 p-0"
                    @endif
                >
                    <div class="testimonial__text">
                        <span class="icon_quotations"></span>
                        <p>“
                            هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر
                            إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما،
                            عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص.
                            بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم
                            إيبسوم نفسه عدة مرات بما تتطلبه الحاجة.”
                        </p>
                        <div class="testimonial__author">
                            <div class="testimonial__author__pic">
                                <img src="/assets/img/logo.jpg" alt="">
                            </div>
                            <div class="testimonial__author__text">
                                <h5>أحلام رزق الله</h5>
                                <p>مصممة أزياء</p>
                            </div>
                        </div>
                    </div>
                </div>
                @if($user->youtube_vid_url)
                    <div class="col-lg-6 p-0">
                        <div class="testimonial__pic set-bg" style="">
                            <iframe width="100%" height="100%"
                                    src="{{$user->youtube_vid_url}}"
                                    title="YouTube video player"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen>

                            </iframe>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- Banner Section End -->
    <section class="banner spad" style="padding: 0 0 20px 0 ;margin-bottom: 10px;">
        <div class="container">
            <div style="background-color:#fff ;height: 30px ;font-size: 20px;text-align: center">
                <br>
                <a style="color: #000" href="{{$user->insta_url}}" target="_blank">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
                <a style="color: #000;" href="{{$user->tiktok_url}}" target="_blank">
                    <i class="fab fa-tiktok" aria-hidden="true"></i>
                </a>
                <a style="color: #000"
                   href="https://wa.me/{{$user->whats_app_number}}/?text={{$user->whats_app_message}}"
                   target="_blank">
                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                </a>

            </div>
        </div>
    </section>
    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <p>
                            <a style="color: #ffffff"
                               href="https://wa.me/{{$user->whats_app_number}}/?text={{$user->whats_app_message}}"
                               target="_blank">
                                <i class="fa fa-whatsapp " aria-hidden="true"></i>
                                {{$user->header_footer_qut ?? ''}}
                            </a>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->
@endsection
