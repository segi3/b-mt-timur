@extends('adminlte::page')

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('title', 'Gramedia Maintenance')

@section('content_header')
<h1 class="m-0 text-dark">Daftar Komplain</h1>
@stop

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                {{-- <h2>Laravel 9 CRUD using DataTables Tutorial</h2> --}}
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('komplain.create') }}">Buat komplain</a>
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
                        <th>Bidang Pekerjaan</th>
                        <th>Nama Pelapor</th>
                        <th>Tanggal Penyampaian</th>
                        <th>Uraian Pekerjaan</th>
                        <th>Progres</th>
                        <th>Teknisi</th>
                        <th>Aksi</th>
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
        $('#datatable-crud').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('komplain') }}",
            columns: [{
                    data: 'bidang_pekerjaan',
                    name: 'bidang_pekerjaan'
                },
                {
                    data: 'nama_pelapor',
                    name: 'nama_pelapor'
                },
                {
                    data: 'tgl_penyampaian',
                    name: 'tgl_penyampaian'
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
                    data: 'action',
                    name: 'action',
                    orderable: false
                },
            ],
            order: [
                [0, 'desc']
            ]
        });
    });

</script>
@stop
