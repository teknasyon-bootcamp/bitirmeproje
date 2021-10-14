@extends('layouts.master')


@section('content-title')
    @include('layouts.content-title',['title' =>'Ana Sayfa','first' => 'Ana Sayfa','second' => 'Raporlar'])
@endsection

@section('content')


    @foreach($data as $item)

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-calendar-day"></i>
                    {{$item['label']}}
                </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

            </div>

            <div class="card-body">
                <div class="row">
                    @foreach($item['info'] as $dayItem)
                        <div class="col-12 col-sm-6 {{$dayItem['length']}}">
                            <div class="d-flex flex-column">
                                <div class="info-box " data-toggle="collapse" href="#{{$dayItem['key']}}"
                                     aria-expanded="true">
                                    <span class="info-box-icon bg-{{$dayItem['class']}} elevation-1">
                                        <i class="{{$dayItem['icon']}}"></i>
                                    </span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">{{$dayItem['label']}}</span>
                                        <span class="info-box-number">
                                          {{$dayItem['value']}} Adet
                                        </span>

                                        <span class="info-box-number">
                                           {{$dayItem['amount']}} ₺

                                            <i class="fas fa-arrow-alt-circle-down"></i>

                                        </span>

                                    </div>

                                </div>

                                <div id="accordion">
                                    <div id="{{$dayItem['key']}}" class="collapse show" data-parent="#accordion" style="">
                                        <div class="col-md-12 ">
                                            @foreach($dayItem['ranges'] as $rangeItem)
                                                @if($rangeItem['value'] === 0) @continue @endif
                                                <div class="progress-group">
                                                    <span style="font-size: 10px">{{$rangeItem['label']}} - {{$rangeItem['amount']}} ₺</span>
                                                    <span class="float-right"
                                                          style="font-size: 10px"><b>{{$rangeItem['value']}}</b>/{{$dayItem['value']}}</span>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar {{$rangeItem['progress-color']}}"
                                                             style="width: {{$rangeItem['width']}}%"></div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach



{{--    <div class="card">--}}

{{--        <div class="card-header bg-primary">--}}
{{--            <h3 class="card-title">HAFTALIK GELIR-GIDER</h3>--}}

{{--            <div class="card-tools">--}}
{{--                <button type="button" class="btn btn-tool" data-card-widget="collapse">--}}
{{--                    <i class="fas fa-minus"></i>--}}
{{--                </button>--}}
{{--                <button type="button" class="btn btn-tool" data-card-widget="remove">--}}
{{--                    <i class="fas fa-times"></i>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="card-body">--}}
{{--            <div class="chart">--}}
{{--                <div class="chartjs-size-monitor">--}}
{{--                    <div class="chartjs-size-monitor-expand">--}}
{{--                        <div class=""></div>--}}
{{--                    </div>--}}
{{--                    <div class="chartjs-size-monitor-shrink">--}}
{{--                        <div class=""></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <canvas id="lineChart"--}}
{{--                        style="min-height: 500px; height: 500px; max-height: 500px; max-width: 100%; display: block; width: 479px;"--}}
{{--                        width="958" height="500" class="chartjs-render-monitor"></canvas>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


{{--    <div class="card">--}}

{{--        <div class="card-header bg-primary">--}}
{{--            <h3 class="card-title">AYLIK GELIR-GIDER</h3>--}}

{{--            <div class="card-tools">--}}
{{--                <button type="button" class="btn btn-tool" data-card-widget="collapse">--}}
{{--                    <i class="fas fa-minus"></i>--}}
{{--                </button>--}}
{{--                <button type="button" class="btn btn-tool" data-card-widget="remove">--}}
{{--                    <i class="fas fa-times"></i>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="card-body">--}}
{{--            <div class="chart">--}}
{{--                <div class="chartjs-size-monitor">--}}
{{--                    <div class="chartjs-size-monitor-expand">--}}
{{--                        <div class=""></div>--}}
{{--                    </div>--}}
{{--                    <div class="chartjs-size-monitor-shrink">--}}
{{--                        <div class=""></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <canvas id="lineChart2"--}}
{{--                        style="min-height: 250px; height: 350px; max-height: 350px; max-width: 100%; display: block; width: 479px;"--}}
{{--                        width="958" height="500" class="chartjs-render-monitor"></canvas>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}



@endsection


