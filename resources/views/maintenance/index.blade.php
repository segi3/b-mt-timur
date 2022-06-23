@extends('adminlte::page')

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('title', 'Gramedia Maintenance')

@section('content_header')
<h1 class="m-0 text-dark">Maintenance</h1>
@stop

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                {{-- <h2>Laravel 9 CRUD using DataTables Tutorial</h2> --}}
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('maintenance.create') }}">Tambah Maintenance</a>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-primary" href="{{ route('maintenance.rekap') }}">Rekap Maintenance</a>
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
                <label><strong>Bulan :</strong></label>
                <select id='jenis-select' class="form-control" style="width: 200px">
                    <option value="">Semua</option>
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
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
                        <th>Tanggal</th>
                        <th>Lokasi</th>
                        <th>Uraian Pekerjaan</th>
                        <th>Status</th>
                        <th>Teknisi</th>
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
                url: "{{ url('maintenance') }}",
                data: function(d) {
                    d.bulan = $('#jenis-select').val(),
                    d.search = $('input[type="search"]').val()
                }
            },
            columns: [{
                    data: 'no_util',
                    name: 'no_util'
                },
                {
                    data: 'jadwal_maintenance',
                    name: 'jadwal_maintenance'
                },
                {
                    data: 'lokasi',
                    name: 'lokasi'
                },
                {
                    data: 'uraian_pekerjaan',
                    name: 'uraian_pekerjaan'
                },
                {
                    data: 'status_pekerjaan',
                    name: 'status_pekerjaan'
                },
                {
                    data: 'nama_teknisi',
                    name: 'nama_teknisi'
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
