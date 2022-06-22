@extends('adminlte::page')

@section('title', 'Gramedia Maintenance')

@section('content_header')
<h1 class="m-0 text-dark">Buat Komplain</h1>
@stop

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2">
                {{-- <h2>Add Company</h2> --}}
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('komplain.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
    @endif
    <form action="{{ route('komplain.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Pelapor:</strong>
                    <input type="text" name="nama_pelapor" class="form-control" value='{{old('nama_pelapor')}}'>
                    @error('nama_pelapor')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Uraian Pekerjaan:</strong>
                    <input type="text" name="uraian_pekerjaan" class="form-control" value='{{old('uraian_pekerjaan')}}'>
                    @error('uraian_pekerjaan')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Role:</strong>
                    <select name="bidang_pekerjaan" class="form-control">
                        <option value="">Pilih Bidang</option>
                        <option value="Mekanikal">Mekanikal</option>
                        <option value="Elektrikal">Elektrikal</option>
                        <option value="Arsitektur">Arsitektur</option>
                        <option value="Plumbing">Plumbing</option>
                        <option value="Sipil">Sipil</option>
                    </select>
                    @error('bidang_pekerjaan')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Teknisi:</strong>
                    <select name="nama_teknisi" class="form-control">
                        <option value="">Pilih Teknisi</option>
                        @foreach ($user as $u)
                            <option value="{{ $u->name }}">{{ $u->name }}</option>
                        @endforeach
                    </select>
                    @error('nama_teknisi')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </div>
    </form>
    @stop
