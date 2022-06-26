@extends('adminlte::page')

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('title', 'Gramedia Maintenance')

@section('content_header')
<h1 class="m-0 text-dark">Equipment</h1>
@stop

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                {{-- <h2>Laravel 9 CRUD using DataTables Tutorial</h2> --}}
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('utilitas.create') }}">Tambah Equipment</a>
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
            <div class="form-group">
                <label><strong>Jenis Utilitas :</strong></label>
                <select id='jenis-select' class="form-control" style="width: 200px">
                    <option value="">Semua</option>
                    @foreach ($util as $item)
                        <option value="{{ $item->jenis_utilitas }}">{{ $item->jenis_utilitas }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered" id="datatable-crud">
                <thead>
                    <tr>
                        <th>No Utilitas</th>
                        <th>Lokasi Utilitas</th>
                        <th>Waktu Tanggal</th>
                        <th>Nama Teknisi</th>
                        <th>Status Utilitas</th>
                        <th>Keterangan</th>
                        <th>Action</th>
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
                url: "{{ url('utilitas') }}",
                data: function(d) {
                    d.jenis_utilitas = $('#jenis-select').val(),
                    d.search = $('input[type="search"]').val()
                }
            },
            columns: [{
                    data: 'no_util',
                    name: 'no_util'
                },
                {
                    data: 'lokasi_utilitas',
                    name: 'lokasi_utilitas'
                },
                {
                    data: 'tanggal',
                    name: 'tanggal'
                },
                {
                    data: 'nama_teknisi',
                    name: 'nama_teknisi'
                },
                {
                    data: 'status_utilitas',
                    name: 'status_utilitas'
                },
                {
                    data: 'keterangan',
                    name: 'keterangan'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
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
