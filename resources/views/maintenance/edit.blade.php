@extends('adminlte::page')

@section('title', 'Gramedia Maintenance')

@section('content_header')
<h1 class="m-0 text-dark">Edit Maintenance</h1>
@stop

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                {{-- <h2>Edit Company</h2> --}}
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('maintenance.index') }}" enctype="multipart/form-data"> Back</a>
            </div>
        </div>
    </div>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
    @endif
    <form action="{{ route('maintenance.update', $maintenance->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nomor Utilitas:</strong>
                    <select name="no_util" class="form-control">
                        <option value="-" disabled selected>Pilih Utilitas</option>
                        @foreach ($utilitas as $item)
                        <option value="{{ $item->no_util . "::" . $item->id }}">{{ $item->no_util }}</option>
                        @endforeach
                    </select>
                    @error('no_util')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jadwal Maintenance:</strong>
                    <input type="text" name="jadwal_maintenance" value="" class="form-control" />
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong>
                    <select name="status_pekerjaan" class="form-control">
                        <option value="Waiting">Waiting
                        </option>
                        <option value="On Progress">
                            On Progress</option>
                            <option value="Complete">Complete
                            </option>
                    </select>
                    @error('status_pekerjaan')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Uraian Pekerjaan:</strong>
                    <input type="text" name="uraian_pekerjaan" class="form-control" placeholder="uraian pekerjaan"
                    value='{{ $maintenance->uraian_pekerjaan }}'>
                    @error('uraian_pekerjaan')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Keterangan:</strong>
                    <input type="text" name="keterangan" class="form-control" placeholder="keterangan" value='{{ $maintenance->keterangan }}'>
                    @error('keterangan')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Teknisi:</strong>
                    <select name="nama_teknisi" class="form-control">
                        <option value="-">Pilih Tim</option>
                        <option value="Tim A" {{ $maintenance->nama_teknisi == 'Tim A' ? 'selected' : '' }} >Tim A</option>
                        <option value="Tim B" {{ $maintenance->nama_teknisi == 'Tim B' ? 'selected' : '' }} >Tim B</option>
                        <option value="Vendor" {{ $maintenance->nama_teknisi == 'Vendor' ? 'selected' : '' }}>Vendor</option>
                    </select>
                    @error('nama_teknisi')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </div>
    </form>
</div>
@stop
@section('js')
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script type="text/javascript">
    $(function () {
        $('input[name="jadwal_maintenance"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
            maxYear: parseInt(moment().format('YYYY'), 10),
            locale: {
                format: 'YYYY-MM-DD'
            }
        });
    });

</script>
@stop
