@extends('layouts.master')


@section('content-title')
    @include('layouts.content-title',['title' =>'Alan Adi Ekle','first' => '','second' => ''])
@endsection

@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">

                <!-- form start -->
                            <form method="POST" action="{{route('permissions.store')}}"
                                  enctype="multipart/form-data">

                                @csrf
                                <div class="card-body">

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="min_withdraw">Haber Tipi </label>
                                                <select class="custom-select form-control-border border-width-2"
                                                        name="category_id">
                                                    @foreach($categories as $category)
                                                        <option
                                                            @if(isset($thePost) && $thePost->category_id === $category->id)
                                                            selected
                                                            @endif
                                                            value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="min_withdraw">Editor Seciniz </label>
                                                <select class="custom-select form-control-border border-width-2"
                                                        name="user_id">
                                                    @foreach($editors as $editor)
                                                        <option
                                                            value="{{$editor->id}}">{{$editor->username}}</option>
                                                    @endforeach
                                                </select>
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
