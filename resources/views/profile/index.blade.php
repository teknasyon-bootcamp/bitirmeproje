@extends('layouts.master')


@section('content-title')
    @include('layouts.content-title',['title' =>'','first' => '','second' => ''])
@endsection

@section('content')


    <div class="container">

        <div class="row">
            <!-- left column -->
            <div class="col-md-12">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Profil</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        <div class="card-body">
                            {{--                            <div class="form-group">--}}
                            {{--                                <label for="exampleInputEmail1">Ad-Soyad</label>--}}
                            {{--                                <input type="text" class="form-control" name="name"--}}
                            {{--                                       value="{{\Illuminate\Support\Facades\Auth::user()->name}}"--}}
                            {{--                                       placeholder="Ad-Soyad giriniz"--}}
                            {{--                                       required--}}

                            {{--                                >--}}
                            {{--                            </div>--}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kullanici Adi</label>
                                <input type="text" class="form-control" name="username"
                                       value="{{\Illuminate\Support\Facades\Auth::user()->username}}"
                                       placeholder="Kullanici Adi giriniz"
                                       required

                                >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" name="password"
                                       placeholder="Parola Giriniz">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Guncelle</button>
                            @if(\Illuminate\Support\Facades\Auth::user()->type_id=== 4)
                                @if(\Illuminate\Support\Facades\Auth::user()->delete_request === 1)
                                    <a class="btn btn-warning float-right">Silme Talebi Alindi</a>
                                @else
                                    <a href="{{route('profile.deactivate')}}" class="btn btn-danger float-right">Silme
                                        Talep Et</a>
                                @endif

                            @endif

                            @if(\Illuminate\Support\Facades\Auth::user()->type_id === 1 )

                                @if(isset($setting) && $setting->is_maintenance)
                                    <a class="btn btn-primary float-right" href="{{route('handle-maintenance')}}">Bakim
                                        Modunu Kapat</a>

                                @else
                                    <a class="btn btn-primary float-right" href="{{route('handle-maintenance')}}">Bakim
                                        Modu</a>

                                @endif
                            @endif
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>


@endsection


