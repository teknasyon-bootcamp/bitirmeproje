<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{url('img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{url('img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{\Illuminate\Support\Facades\Auth::user()->username}}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
    {{--        <div class="form-inline">--}}
    {{--            <div class="input-group" data-widget="sidebar-search">--}}
    {{--                <input class="form-control form-control-sidebar" type="search" placeholder="Search"--}}
    {{--                       aria-label="Search">--}}
    {{--                <div class="input-group-append">--}}
    {{--                    <button class="btn btn-sidebar">--}}
    {{--                        <i class="fas fa-search fa-fw"></i>--}}
    {{--                    </button>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{url('/')}}"
                       class="nav-link">
                        <i class="nav-icon fas fa-running"></i>
                        <p>
                            Siteye Git
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('home')}}"
                       class="nav-link {{\Illuminate\Support\Facades\Request::is('home')  ? 'active' : ''}}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Ana Sayfa
                        </p>
                    </a>
                </li>

                @if( in_array(\Illuminate\Support\Facades\Auth::user()->type_id,[1,2]))
                    <li class="nav-item menu-{{\Illuminate\Support\Facades\Request::is('permissions') || \Illuminate\Support\Facades\Request::is('permissions/*') ? 'open' : ''}}">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-building"></i>
                            <p>
                                Editor Yonetimi
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('permissions.index')}}"
                                   class="nav-link {{\Illuminate\Support\Facades\Request::is('permissions') || \Illuminate\Support\Facades\Request::is('permissions/index')  ? 'active' : ''}}">
                                    <i class="fas fa-list nav-icon"></i>
                                    <p>Izinleri Listele</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('permissions.create')}}"
                                   class="nav-link {{\Illuminate\Support\Facades\Request::is('permissions/create') || \Illuminate\Support\Facades\Request::is('permissions/create/*')  ? 'active' : ''}}">
                                    <i class="fas fa-list nav-icon"></i>
                                    <p>Izin Olustur</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if( in_array(\Illuminate\Support\Facades\Auth::user()->type_id,[1,3]))
                    <li class="nav-item menu-{{\Illuminate\Support\Facades\Request::is('news') || \Illuminate\Support\Facades\Request::is('news/*') ? 'open' : ''}}">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-building"></i>
                            <p>
                                Haber Yonetimi
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('news.index')}}"
                                   class="nav-link {{\Illuminate\Support\Facades\Request::is('news') || \Illuminate\Support\Facades\Request::is('news/index')  ? 'active' : ''}}">
                                    <i class="fas fa-list nav-icon"></i>
                                    <p>Haberleri Listele</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('news.create')}}"
                                   class="nav-link {{\Illuminate\Support\Facades\Request::is('news/create') || \Illuminate\Support\Facades\Request::is('news/create/*')  ? 'active' : ''}}">
                                    <i class="fas fa-list nav-icon"></i>
                                    <p>Haber Ekle</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif


                @if( in_array(\Illuminate\Support\Facades\Auth::user()->type_id,[1,2]))
                    <li class="nav-item menu-{{\Illuminate\Support\Facades\Request::is('profile') || \Illuminate\Support\Facades\Request::is('profile/*') ? 'open' : ''}}">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-building"></i>
                            <p>
                                Kullanici Yonetimi
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{route('profile.list')}}"
                                   class="nav-link {{\Illuminate\Support\Facades\Request::is('profile/list') ? 'active' : ''}}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Kullanicilar
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('profile.delete_reqs')}}"
                                   class="nav-link {{\Illuminate\Support\Facades\Request::is('profile/delete_reqs') ? 'active' : ''}}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Hesap Silme Talepleri
                                    </p>
                                </a>
                            </li>
                            @if( in_array(\Illuminate\Support\Facades\Auth::user()->type_id,[1,2]))
                                <li class="nav-item">
                                    <a href="{{route('profile.create')}}"
                                       class="nav-link {{\Illuminate\Support\Facades\Request::is('profile/create') ? 'active' : ''}}">
                                        <i class="nav-icon fas fa-user-astronaut"></i>
                                        <p>
                                            Yonetici Olustur
                                        </p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif


                @if( in_array(\Illuminate\Support\Facades\Auth::user()->type_id,[1,2]))
                    <li class="nav-item menu-{{\Illuminate\Support\Facades\Request::is('logs') || \Illuminate\Support\Facades\Request::is('logs/*') ? 'open' : ''}}">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-building"></i>
                            <p>
                                Loglamalar
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('logs.index')}}"
                                   class="nav-link {{\Illuminate\Support\Facades\Request::is('logs') ? 'active' : ''}}">
                                    <i class="nav-icon fas fa-user-astronaut"></i>
                                    <p>
                                        Loglari Listele
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif



                @if( in_array(\Illuminate\Support\Facades\Auth::user()->type_id,[4]))
                    <li class="nav-item menu-{{\Illuminate\Support\Facades\Request::is('history') || \Illuminate\Support\Facades\Request::is('history/*') ? 'open' : ''}}">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-building"></i>
                            <p>
                                Gecmis
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('history.index')}}"
                                   class="nav-link {{\Illuminate\Support\Facades\Request::is('history') ? 'active' : ''}}">
                                    <i class="nav-icon fas fa-user-astronaut"></i>
                                    <p>
                                        Gecmisi Listele
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if( in_array(\Illuminate\Support\Facades\Auth::user()->type_id,[4]))
                    <li class="nav-item menu-{{\Illuminate\Support\Facades\Request::is('favorites') || \Illuminate\Support\Facades\Request::is('favorites/*') ? 'open' : ''}}">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-building"></i>
                            <p>
                                Favoriler
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('favorites.index')}}"
                                   class="nav-link {{\Illuminate\Support\Facades\Request::is('favorites') ? 'active' : ''}}">
                                    <i class="nav-icon fas fa-user-astronaut"></i>
                                    <p>
                                        Favorileri Listele
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif


                <li class="nav-item menu-{{\Illuminate\Support\Facades\Request::is('profile/comments')
 || \Illuminate\Support\Facades\Request::is('comments/*') ? 'open' : ''}}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-building"></i>
                        <p>
                            Yorum Yonetimi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('profile.comments.index')}}"
                               class="nav-link {{\Illuminate\Support\Facades\Request::is('profile/comments')
 || \Illuminate\Support\Facades\Request::is('profile/comments/*')? 'active' : ''}}">
                                <i class="nav-icon fas fa-comment"></i>
                                <p>
                                    Yorumlarim
                                </p>
                            </a>
                        </li>
                        @if( in_array(\Illuminate\Support\Facades\Auth::user()->type_id,[1,2]))
                            <li class="nav-item">
                                <a href="{{route('comments.index')}}"
                                   class="nav-link {{\Illuminate\Support\Facades\Request::is('comments/index')
|| \Illuminate\Support\Facades\Request::is('comments/index/*')? 'active' : ''}}">
                                    <i class="nav-icon fas fa-comment"></i>
                                    <p>
                                        Tum Yorumlar
                                    </p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="{{route('profile.index')}}"
                       class="nav-link {{\Illuminate\Support\Facades\Request::is('profile/index') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-user-alt"></i>
                        <p>
                            Profil
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/logout"
                       class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Cikis Yap
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
