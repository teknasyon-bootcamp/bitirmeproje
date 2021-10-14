<!DOCTYPE html>
<!--
Template Name: Foxclore
Author: <a href="https://www.os-templates.com/">OS Templates</a>
Author URI: https://www.os-templates.com/
Copyright: OS-Templates.com
Licence: Free to use under our free template licence terms
Licence URI: https://www.os-templates.com/template-terms
-->
<html lang="">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->
<head>
    <title>Haber Kaynak</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="{{asset('layout/styles/layout.css')}}" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- Top Background Image Wrapper -->
<div class="bgded overlay" style="background-image:url({{asset('images/demo/backgrounds/01.png')}});">
    <!-- ################################################################################################ -->
    <header id="header" class="hoc clear">
        <!-- ################################################################################################ -->
        <div id="logo" class="one_quarter first">
            <h1><a href="{{url('/')}}">Haber Kaynak</a></h1>
            <p>en guvenilir en hizli</p>
        </div>
        {{--        <div class="three_quarter">--}}
        {{--            <ul class="nospace clear">--}}
        {{--                <li class="one_third first">--}}
        {{--                    <div class="block clear"><a href="#"><i class="fas fa-phone"></i></a> <span><strong>Give us a call:</strong> +00 (123) 456 7890</span></div>--}}
        {{--                </li>--}}
        {{--                <li class="one_third">--}}
        {{--                    <div class="block clear"><a href="#"><i class="fas fa-envelope"></i></a> <span><strong>Send us a mail:</strong> support@domain.com</span></div>--}}
        {{--                </li>--}}
        {{--                <li class="one_third">--}}
        {{--                    <div class="block clear"><a href="#"><i class="fas fa-clock"></i></a> <span><strong> Mon. - Sat.:</strong> 08.00am - 18.00pm</span></div>--}}
        {{--                </li>--}}
        {{--            </ul>--}}
        {{--        </div>--}}
    </header>
    <section id="navwrapper" class="hoc clear">
        <!-- ################################################################################################ -->
        <nav id="mainav">
            <ul class="clear">
                <li class="active"><a href="{{url('/')}}">Ana Sayfa</a></li>


                @if(\Illuminate\Support\Facades\Auth::user())
                    <li><a href="{{route('home')}}">Panel</a></li>
                @else
                    <li><a href="{{route('register-ui')}}">Kayit Ol</a></li>
                @endif
                <li><a class="drop" href="#">Kategoriler</a>
                    <ul>
                        @foreach($categories as $category)
                            <li>
                                <a href="{{route('favorite',['id' => $category->id])}}">{{$category->name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- ################################################################################################ -->
        <div id="searchform">
            <div>
                <form action="#" method="post">
                    <fieldset>
                        <legend>Quick Search:</legend>
                        <input type="text" placeholder="Enter search term&hellip;">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </fieldset>
                </form>
            </div>
        </div>
        <!-- ################################################################################################ -->
    </section>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <div id="pageintro" class="hoc clear">
        <!-- ################################################################################################ -->
        <article>
            {{--            <p>Aliquam sapien</p>--}}
            <h3 class="heading">Guncel ve Detayli </h3>
            @if(isset($isFav) && isset($categoryName))
                <h3>{{$categoryName}}</h3>
            @endif


            <p>En guvenilir ve hizli haberler simdi hizmetinizde</p>
        </article>
        <!-- ################################################################################################ -->
    </div>
    <!-- ################################################################################################ -->
</div>
<!-- End Top Background Image Wrapper -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
    <main class="hoc container clear">
        <!-- main body -->
        <!-- ################################################################################################ -->
        <section id="introblocks">
            <ul class="nospace group">
                @foreach($posts as $key=>$post)
                    <li class="one_third">
                        <figure>
                            <a class="imgover" href="{{route('posts.detail',['id' => $post->id])}}">
                                <img src="{{env('MAIN_DOMAIN')}}{{$post->image}}" alt=""
                                     style="height: 300px;width: 400px"
                                ></a>
                            <figcaption>
                                <h6 class="heading">{{$post->title}}</h6>
                                <p>{{$post->description}}</p>
                            </figcaption>
                        </figure>
                    </li>
                @endforeach
            </ul>
        </section>
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                {{$posts->links("pagination::bootstrap-4")}}
            </ul>
        </div>

        <!-- ################################################################################################ -->
        <!-- / main body -->
        <div class="clear"></div>
    </main>
</div>

<!-- JAVASCRIPTS -->
<script src="{{asset('layout/scripts/jquery.min.js')}}"></script>
<script src="{{asset('layout/scripts/jquery.backtotop.js')}}"></script>
<script src="{{asset('layout/scripts/jquery.mobilemenu.js')}}"></script>
</body>
</html>
