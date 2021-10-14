@extends('layouts.master')


@section('content-title')
    @include('layouts.content-title',['title' =>'Yorum Duzenle','first' => '','second' => ''])
@endsection

@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">

                <!-- form start -->
                <form method="POST" action="{{route('comments.update',['id' => $theComment->id])}}">
                    @csrf
                    <div class="card-body">

                        <input type="text" style="display: none" name="comment_id" id="comment_id"
                               value="{{$theComment->id}}">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="min_withdraw">Yorum Icerik </label>
                                        <input name="content" class="form-control"
                                               type="text"
                                               placeholder="yorum giriniz"
                                               value="{{$theComment->content}}"
                                               required
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                        <span class="input-group-text">
                                          <input type="checkbox" name="is_active"
                                                 @if(isset($theComment) && $theComment->is_active)
                                                 checked
                                              @endif
                                          >
                                        </span>
                                </div>
                                <input type="text" class="form-control" value="Aktif Mi?" disabled>
                            </div>
                        </div>


                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Kaydet</button>
                    </div>
                </form>
            </div>

        </div>

    </div>



@endsection
