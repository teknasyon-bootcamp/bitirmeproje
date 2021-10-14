@extends('layouts.master')

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

@section('content-title')
    @include('layouts.content-title',['title' =>'Alan Adi Ekle','first' => '','second' => ''])
@endsection

@section('content')


    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">

                    <!-- form start -->
                    @if(isset($thePost))

                        <form method="POST" action="{{route('news.update',['id' => $thePost->id])}}"
                              enctype="multipart/form-data">

                            @else

                                <form method="POST" action="{{route('news.store')}}"
                                      enctype="multipart/form-data">

                                    @endif


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
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="min_withdraw">Haber Baslik </label>
                                                        <input name="title" class="form-control"
                                                               @if(isset($thePost))
                                                               value="{{$thePost->title}}"
                                                               @endif
                                                               type="text"
                                                               placeholder="Haber baslik giriniz"
                                                               required
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @if(isset($thePost))
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Haber
                                                    Gorseli</label>
                                                <div class="col-sm-10">
                                                    <img src="{{env('MAIN_DOMAIN') . $thePost->image}}"
                                                         alt="{{$thePost->image}}"
                                                         style="width: 100px;height: 50px"
                                                    >
                                                </div>
                                            </div>
                                        @endif


                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="image">Haber Gorsel </label>
                                                        <input name="image" class="form-control"
                                                               type="file"
                                                               @if(!isset($thePost))
                                                               required
                                                            @endif
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="min_withdraw">Haber Aciklama </label>
                                                        <input name="description" class="form-control"
                                                               type="text"
                                                               @if(isset($thePost))
                                                               value="{{$thePost->description}}"
                                                               @endif
                                                               placeholder="Haber aciklama giriniz"
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
                                                        <label for="min_withdraw">Haber Icerik </label>
                                                        <textarea name="content" id="content" cols="30" rows="10"
                                                                  class="form-control"
                                                                  placeholder="icerik giriniz !"
                                                        >
                                               @if(isset($thePost))

                                                                {!! $thePost->content !!}
                                                            @endif

                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                        <span class="input-group-text">
                                          <input type="checkbox" name="is_active"
                                                 @if(isset($thePost) && $thePost->is_active)
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
    </div>


    @if(isset($thePost))

    <main class="hoc container clear">

        <h4>Yorumlar</h4>


        <table>
            <tr>
                <th>Post</th>
                <th>Kullanici</th>
                <th>Icerik</th>
                <th>Tarih</th>
                <th>Islemler</th>
            </tr>
            @foreach($thePost->comments as $comment)
                <tr>
                    <td>{{$thePost->title}}</td>
                    <td>{{$comment->user && !$comment->is_hidden ? $comment->user->username : ' -- '}}</td>
                    <td>{{$comment->content}}</td>
                    <td>{{$thePost->created_at}}</td>
                    <td>

                        @if($comment->is_active )
                            <a class="btn btn-danger btn-sm "
                               href="{{route('comments.activate',['id' => $comment->id])}}">
                                <i class="fas fa-trash">
                                </i>
                                Pasif et
                            </a>

                        @else
                            <a class="btn btn-success btn-sm "
                               href="{{route('comments.activate',['id' => $comment->id])}}">
                                <i class="fas fa-eye">
                                </i>
                                Aktif Et
                            </a>

                        @endif
                    </td>
                </tr>
            @endforeach


        </table>

        <!-- ################################################################################################ -->
        <!-- / main body -->
        <div class="clear"></div>
    </main>
    @endif

@endsection
