@extends('layouts.master')


@section('content-title')
    @include('layouts.content-title',['title' =>'Haberleri Listele','first' => '','second' => ''])
@endsection

@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card">


                <div class="card-header text-right">
                    <a href="{{route('news.create')}}" type="button" class="btn btn-primary">
                        <i class="fa fa-plus-circle"></i> <strong>Yeni Kayit</strong></a>

                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                       role="grid" aria-describedby="example1_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                            rowspan="1" colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending"
                                            style="max-width: 20px">
                                            ID
                                        </th>

                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                            Baslik
                                        </th>

                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                            Aciklama
                                        </th>

                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                            Aktif Mi?
                                        </th>

                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                            Olusturulma Tarihi
                                        </th>

                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Engine version: activate to sort column ascending">
                                            ISLEMLER
                                        </th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($items as $key=>$domain)
                                        <tr class="{{$key % 2 === 0 ? 'even':'odd'}}">
                                            <td class="sorting_1 dtr-control">{{$domain->id}}</td>

                                            <td>{{$domain->title}}</td>
                                            <td>{{$domain->description}}</td>

                                            <td>
                                                @if($domain->is_active )
                                                    <span class="badge bg-success">EVET</span>
                                                @else
                                                    <span class="badge bg-danger">HAYIR</span>
                                                @endif
                                            </td>

                                            <td>{{$domain->created_at}}</td>

                                            <td class="d-flex justify-content-sm-around align-items-center">


                                                @if($domain->is_active )
                                                    <a class="btn btn-danger btn-sm "
                                                       href="{{route('news.activate',['id' => $domain->id])}}">
                                                        <i class="fas fa-trash">
                                                        </i>
                                                        Pasif et
                                                    </a>

                                                @else
                                                    <a class="btn btn-success btn-sm "
                                                       href="{{route('news.activate',['id' => $domain->id])}}">
                                                        <i class="fas fa-eye">
                                                        </i>
                                                        Aktif Et
                                                    </a>

                                                @endif

                                                @if(\Carbon\Carbon::now()->diffInDays($domain->created_at)<=7)
                                                    <a class="btn btn-info btn-sm "
                                                       href="{{route('news.edit',['id' => $domain->id])}}">
                                                        <i class="fas fa-edit">
                                                        </i>
                                                        Duzenle
                                                    </a>
                                                @endif
                                            </td>

                                        </tr>
                                    @endforeach

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>

        </div>
        <!-- /.col -->
    </div>

@endsection
