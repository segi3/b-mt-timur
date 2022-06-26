@extends('adminlte::page')

@section('title', 'Gramedia Maintenance')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 div-nav">
                            <img src="{{ asset('img/ph-home-1.png') }}" alt="" style="max-width: 100%;">
                            <div style="text-align: center;">
                                Operasional
                            </div>
                            <a href="/utilitas"></a>
                        </div>

                        <div class="col-lg-3 div-nav">
                            <img src="{{ asset('img/energy-og.jpeg') }}" alt="" style="max-width: 100%;">
                            <div style="text-align: center;">
                                Konsumsi Energi
                            </div>
                            <a href="/energy"></a>
                        </div>
                        <div class="col-lg-3 div-nav">
                            <img src="{{ asset('img/operasional-og.jpeg') }}" alt="" style="max-width: 100%;">
                            <div style="text-align: center;">
                                Maintenance
                            </div>
                            <a href="/maintenance"></a>
                        </div>
                        <div class="col-lg-3 div-nav">
                            <img src="{{ asset('img/ph-home-4.png') }}" alt="" style="max-width: 100%;">
                            <div style="text-align: center;">
                                Pengaduan
                            </div>
                            <a href="/komplain"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
<script type="text/javascript">

$(".div-nav").click(function() {
  window.location = $(this).find("a").attr("href");
  return false;
});
</script>
@stop
