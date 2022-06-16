@extends('adminlte::page')

@section('title', 'Gramedia Maintenance')

@section('content_header')
<h1 class="m-0 text-dark">Edit User</h1>
@stop

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                {{-- <h2>Edit Company</h2> --}}
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('utilitas.index') }}" enctype="multipart/form-data"> Back</a>
            </div>
        </div>
    </div>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
    @endif
    <form action="{{ route('utilitas.update', $utilita->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>No Util:</strong>
                    <input type="text" name="no_util" class="form-control" placeholder="No Util"
                        value='{{ $utilita->no_util }}'>
                    @error('no_util')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Lokasi Utilitas:</strong>
                    <input type="text" name="lokasi_utilitas" class="form-control" placeholder="lokasi_utilitas"
                        value='{{ $utilita->lokasi_utilitas }}'>
                    @error('lokasi_utilitas')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Keterangan:</strong>
                    <input type="text" name="keterangan" class="form-control" placeholder="keterangan"
                        value='{{ $utilita->keterangan }}'>
                    @error('keterangan')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal:</strong>
                    <input type="text" name="tanggal" value="" class="form-control"/>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong>
                    <select name="status_utilitas" class="form-control">
                        <option value="Siap Pakai" {{ $utilita->role == 'Siap Pakai' ? 'selected' : '' }}>Siap Pakai
                        </option>
                        <option value="Dalam Perbaikan" {{ $utilita->role == 'Dalam Perbaikan' ? 'selected' : '' }}>
                            Dalam Perbaikan</option>
                    </select>
                    @error('status_utilitas')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong>
                    <select name="jenis_utilitas" class="form-control">
                        <option value="air_conditioning" {{ $utilita->role == 'air_conditioning' ? 'selected' : '' }}>
                            Air Conditioning</option>
                        <option value="lampu" {{ $utilita->role == 'lampu' ? 'selected' : '' }}>Lampu</option>
                    </select>
                    @error('jenis_utilitas')
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
        $('input[name="tanggal"]').daterangepicker({
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
