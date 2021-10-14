@extends('layouts.master')


@section('content-title')
    @include('layouts.content-title',['title' =>'Loglari Listele','first' => '','second' => ''])
@endsection

@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card">


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
                                            Kullanici
                                        </th>


                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                            Olusturulma Tarihi
                                        </th>


                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                            Basarili Giris
                                        </th>


                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($logs as $key=>$domain)
                                        <tr class="{{$key % 2 === 0 ? 'even':'odd'}}">
                                            <td class="sorting_1 dtr-control">{{$domain->id}}</td>
                                            <td>{{$domain->user->username}}</td>
                                            <td>{{\Carbon\Carbon::createFromTimestamp($domain->timestamp )->toDateTimeString()}}</td>

                                            <td>
                                                @if($domain->is_succeeded )
                                                    <span class="badge bg-success">EVET</span>
                                                @else
                                                    <span class="badge bg-danger">HAYIR</span>
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
