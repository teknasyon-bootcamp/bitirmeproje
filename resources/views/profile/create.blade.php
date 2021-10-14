@extends('layouts.master')


@section('content-title')
    @include('layouts.content-title',['title' =>'Alan Adi Ekle','first' => '','second' => ''])
@endsection

@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">

                <!-- form start -->
                            <form method="POST" action="{{route('profile.store')}}">

                                @csrf
                                <div class="card-body">

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="min_withdraw">Haber Tipi </label>
                                                <select class="custom-select form-control-border border-width-2"
                                                        name="type_id">
                                                    @foreach($selects as $select)
                                                        <option
                                                            value="{{$select['id']}}">{{$select['label']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="min_withdraw">Kullanici Adi </label>
                                                    <input name="username" class="form-control"
                                                           type="text"
                                                           placeholder="Kullanici Adi Giriniz"
                                                           required
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="min_withdraw">E-mail </label>
                                                    <input name="email" class="form-control"
                                                           type="text"
                                                           placeholder="E-mail Giriniz"
                                                           required
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="min_withdraw">Sifre </label>
                                                    <input name="password" class="form-control"
                                                           type="password"
                                                           placeholder="Sifre  Giriniz"
                                                           required
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Izni Onayla</button>
                                </div>
                            </form>
            </div>

        </div>

    </div>



@endsection
