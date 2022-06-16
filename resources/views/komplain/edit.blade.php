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
                <a class="btn btn-primary" href="{{ route('komplain.index') }}" enctype="multipart/form-data"> Back</a>
            </div>
        </div>
    </div>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
    @endif
    <form action="{{ route('komplain.update', $komplain->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Role:</strong>
                    <select name="status_pekerjaan" class="form-control">
                        <option value="">Pilih Status</option>
                        <option value="Waiting">Waiting</option>
                        <option value="On Progress">On Progress</option>
                        <option value="Complete">Complete</option>
                    </select>
                    @error('status_pekerjaan')
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
                            <option value="{{ $u->name }}" {{ $komplain->nama_teknisi == $u->name ? 'selected' : '' }}>{{ $u->name }}</option>
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
</div>
@stop
