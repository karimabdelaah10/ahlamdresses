@extends('layouts.web-layout')
@section('content')

    <!-- Header Section Begin -->
    <header class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>
                            <a style="color: #ffffff"
                               href="https://wa.me/02{{$user->whats_app_number}}/?text={{$user->whats_app_message}}"
                               target="_blank">
                                <i class="fa fa-whatsapp " aria-hidden="true"></i>
                                يمكنكم التواصل معنا من خلال الواتساب بالضغط هنا
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
                                        $url = "https://wa.me/02" . $user->whats_app_number . "/?text=" . $user->whats_app_message;
                                        $icon = true;
                                        if (!empty($row->url)) {
                                            $url = $row->url;
                                            $icon = false;
                                        }
                                        ?>
                                    <h2>{{$row->title}}</h2>
                                    <a target="_blank" href="{{$url}}">
                                        @if($icon)
                                            <i style="color: #36e54d" class="fa fa-whatsapp" aria-hidden="true"></i>
                                        @endif
                                        تواصل معنا
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
                                        $url = "https://wa.me/02" . $user->whats_app_number . "/?text=" . $user->whats_app_message;
                                        $icon = true;
                                        if (!empty($row->url)) {
                                            $url = $row->url;
                                            $icon = false;
                                        }
                                        ?>
                                    <h2>{{$row->title}}</h2>
                                    <a target="_blank" href="{{$url}}">
                                        @if($icon)
                                            <i style="color: #36e54d" class="fa fa-whatsapp" aria-hidden="true"></i>
                                        @endif
                                        تواصل معنا
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
                                        $url = "https://wa.me/02" . $user->whats_app_number . "/?text=" . $user->whats_app_message;
                                        $icon = true;
                                        if (!empty($row->url)) {
                                            $url = $row->url;
                                            $icon = false;
                                        }
                                        ?>
                                    <h2>{{$row->title}}</h2>
                                    <a target="_blank" href="{{$url}}">
                                        @if($icon)
                                            <i style="color: #36e54d" class="fa fa-whatsapp" aria-hidden="true"></i>
                                        @endif
                                        تواصل معنا

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
    <!-- Banner Section End -->
    <section class="banner spad" style="padding: 0 0 20px 0 ;    margin-bottom: 50px;">
        <div class="container">
            <div style="background-color:#fff ;height: 30px ;font-size: 35px;text-align: center">
                تواصل معنا
                <br>
                <a style="color: #000" href="{{$user->insta_url}}" target="_blank">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
                <a style="color: #000;" href="{{$user->tiktok_url}}" target="_blank">
                    <i class="fab fa-tiktok" aria-hidden="true"></i>
                </a>
                <a style="color: #36e54d"
                   href="https://wa.me/02{{$user->whats_app_number}}/?text={{$user->whats_app_message}}"
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
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>
                            <a style="color: #ffffff"
                               href="https://wa.me/02{{$user->whats_app_number}}/?text={{$user->whats_app_message}}"
                               target="_blank">
                                <i class="fa fa-whatsapp " aria-hidden="true"></i>
                                يمكنكم التواصل معنا من خلال الواتساب بالضغط هنا
                            </a>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->
@endsection
