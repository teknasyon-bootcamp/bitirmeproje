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
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    input[type=text], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

</style>
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
    <!-- ################################################################################################ -->
    </header>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <section id="navwrapper" class="hoc clear">
        <!-- ################################################################################################ -->
        <nav id="mainav">
            <ul class="clear">
                <li class="active"><a href="{{url('/')}}">Home</a></li>
{{--                <li><a class="drop" href="#">Pages</a>--}}
{{--                    <ul>--}}
{{--                        <li><a href="{{route('profile.comments.index')}}">Tum Yorumlarim</a></li>--}}
{{--                        <li><a href="pages/full-width.html">Full Width</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
                <li><a href="{{route('home')}}">Panel</a></li>

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
            <p>{{$thePost->title}}</p>
            <p>{{$thePost->description}}</p>
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

        <form action="{{route('comments.store')}}" method="post" class="col-lg-12">
            @csrf
            <p>
                {{$thePost->content}}
            </p>

            <input type="hidden" id="post_id" value="{{$thePost->id}}" name="post_id" placeholder="Yorum Giriniz.."
                   required>


            <div class="form-group row mt-5">
                <div class="col-md-12">
                    <input type="text" id="lname" name="content" placeholder="Yorum Giriniz.." required>
                </div>
            </div>

            <div class="form-group row mt-5">
                <div class="col-md-12 d-flex flex-row justify-content-center"
                     style="display: flex;flex-direction: row;">
                    <input type="checkbox" id="is_hidden" class="col-lg-6" name="is_hidden">
                    <label class="col-lg-6" for="is_hidden"> Ismimi Gizle</label><br><br>
                </div>
            </div>

            <div class="form-group row mt-5">
                <div class="col-md-12">
                    <input type="submit" value="Submit">
                </div>
            </div>


        </form>


        <!-- ################################################################################################ -->
        <!-- / main body -->
        <div class="clear"></div>
    </main>
</div>

<main class="hoc container clear">

    <h4>Yorumlar</h4>


    <table>
        <tr>
            <th>Post</th>
            <th>Kullanici</th>
            <th>Icerik</th>
            <th>Tarih</th>
        </tr>
        @foreach($thePost->comments as $comment)
            <tr>
                <td>{{$thePost->title}}</td>
                <td>{{$comment->user && !$comment->is_hidden ? $comment->user->username : ' -- '}}</td>
                <td>{{$comment->content}}</td>
                <td>{{$thePost->created_at}}</td>
            </tr>
        @endforeach


    </table>

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
