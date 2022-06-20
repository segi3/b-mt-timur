@extends('adminlte::page')

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('title', 'Gramedia Maintenance')

@section('content_header')
<h1 class="m-0 text-dark">Rekap Konsumsi Energi</h1>
@stop

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                {{-- <h2>Laravel 9 CRUD using DataTables Tutorial</h2> --}}
            </div>
            {{-- <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('maintenance.create') }}">Tambah Maintenance</a>
            </div> --}}
            <div class="pull-right mb-2">
                <a class="btn btn-primary" href="{{ route('energy.index') }}">Kembali</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered" id="datatable-crud">
                <thead>
                    <tr>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Konsumsi Listrik (KWH)</th>
                        <th>Konsumsi Air (m3)</th>
                        <th>Konsumsi Gas (KG)</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

</div>
@stop

@section('js')
<script type="text/javascript">
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('#datatable-crud').DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            ajax: {
                url: "{{ url('energy/rekap') }}",
                data: function(d) {
                    d.bulan = $('#jenis-select').val(),
                    d.search = $('input[type="search"]').val()
                }
            },
            columns: [{
                    data: 'tahun',
                    name: 'tahun'
                },
                {
                    data: 'bulan',
                    name: 'bulan'
                },
                {
                    data: 'sum_listrik',
                    name: 'sum_listrik'
                },
                {
                    data: 'sum_air',
                    name: 'sum_air'
                },
                {
                    data: 'sum_gas',
                    name: 'sum_gas'
                },
            ],
            order: [
                [0, 'desc']
            ]
        });
        $('#jenis-select').change(function(){
            table.draw();
        });
    });

</script>
@stop
