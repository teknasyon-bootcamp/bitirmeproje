@extends('layouts.master')


@section('content-title')
    @include('layouts.content-title',['title' =>'Profil Bilgileri','first' => 'Profil','second' => 'Info'])
@endsection

@section('content')

    <div class="row">
        <div class="col-md-6">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Client Info</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{url('profile/update')}}">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">E-mail</label>
                            <input type="email"
                                   required
                                   value="{{\Illuminate\Support\Facades\Auth::user()->email}}"
                                   class="form-control" name="email"
                                   placeholder="Enter email"
                            >
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text" class="form-control" name="username"
                                       required
                                       value="{{\Illuminate\Support\Facades\Auth::user()->username}}"
                                       placeholder="Enter email">
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" name="name"
                                       required
                                       value="{{\Illuminate\Support\Facades\Auth::user()->name}}"
                                       placeholder="Enter email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="password"
                                   placeholder="Password">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>

        <div class="col-md-6">

            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Client Api Info</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form>
                    <div class="card-body">

                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="exampleInputEmail1">Payment Key</label>
                                <input type="text" class="form-control" name="key"
                                       value="{{\Illuminate\Support\Facades\Auth::user()->key}}"
                                       placeholder="Enter email">
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="exampleInputEmail1">BackOffice ip</label>
                                <input type="text" class="form-control" name="ip"
                                       value="{{\Illuminate\Support\Facades\Auth::user()->ip}}"
                                       placeholder="Enter ip">
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Callback URL</label>
                            <input type="text" class="form-control"
                                   value="{{\Illuminate\Support\Facades\Auth::user()->callback_url}}"
                                   name="callback_url" placeholder="Enter Callback URL">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Check URL</label>
                            <input type="text" class="form-control" name="check_url"
                                   value="{{\Illuminate\Support\Facades\Auth::user()->check_url}}"
                                   placeholder="Enter Check URL">
                        </div>


                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>

    </div>

@endsection
