@extends('adminlte::page')

@section('title', 'Gramedia Maintenance')

@section('content_header')
<h1 class="m-0 text-dark">Edit Utilitas</h1>
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
                    <strong>Bidang Utilitas:</strong>
                    <select name="bidang_utilitas" class="form-control">
                        <option value="Elektrikal" {{ $utilita->bidang_utilitas == 'Elektrikal' ? 'selected' : '' }}>Elektrikal</option>
                        <option value="Mekanikal" {{ $utilita->bidang_utilitas == 'Mekanikal' ? 'selected' : '' }}>Mekanikal</option>
                        <option value="Plumbing" {{ $utilita->bidang_utilitas == 'Plumbing' ? 'selected' : '' }}>Plumbing</option>
                    </select>
                    @error('bidang_utilitas')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jenis Utilitas:</strong>
                    <select name="jenis_utilitas" class="form-control">
                        <option value="AC Split 2,5PK" {{ $utilita->jenis_utilitas == 'AC Split 2,5PK' ? 'selected' : '' }}>AC Split 2,5PK</option>
                        <option value="Genset " {{ $utilita->jenis_utilitas == 'Genset ' ? 'selected' : '' }}>Genset </option>
                        <option value="UPS" {{ $utilita->jenis_utilitas == 'UPS' ? 'selected' : '' }}>UPS</option>
                        <option value="AHU" {{ $utilita->jenis_utilitas == 'AHU' ? 'selected' : '' }}>AHU</option>
                        <option value="Fire Alarm" {{ $utilita->jenis_utilitas == 'Fire Alarm' ? 'selected' : '' }}>Fire Alarm</option>

                        <option value="Gondola" {{ $utilita->jenis_utilitas == 'Gondola' ? 'selected' : '' }}>Gondola</option>
                        <option value="Lift" {{ $utilita->jenis_utilitas == 'Lift' ? 'selected' : '' }}>Lift</option>
                        <option value="Escalator" {{ $utilita->jenis_utilitas == 'Escalator' ? 'selected' : '' }}>Escalator</option>

                        <option value="Pompa Boster" {{ $utilita->jenis_utilitas == 'Pompa Boster' ? 'selected' : '' }}>Pompa Boster</option>
                        <option value="Pompa Distribusi" {{ $utilita->jenis_utilitas == 'Pompa Distribusi' ? 'selected' : '' }}>Pompa Distribusi</option>
                        <option value="Pompa Transfer" {{ $utilita->jenis_utilitas == 'Pompa Transfer' ? 'selected' : '' }}>Pompa Transfer</option>
                        <option value="Pompa Cooling Tower" {{ $utilita->jenis_utilitas == 'Pompa Cooling Tower' ? 'selected' : '' }}>Pompa Cooling Tower</option>
                        <option value="Pompa Hydrant Diesel" {{ $utilita->jenis_utilitas == 'Pompa Hydrant Diesel' ? 'selected' : '' }}>Pompa Hydrant Diesel</option>
                        <option value="Pompa Hydrant Elektrik" {{ $utilita->jenis_utilitas == 'Pompa Hydrant Elektrik' ? 'selected' : '' }}>Pompa Hydrant Elektrik</option>
                        <option value="Pompa Jokey" {{ $utilita->jenis_utilitas == 'Pompa Jokey' ? 'selected' : '' }}>Pompa Jokey</option>
                    </select>
                    @error('jenis_utilitas')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>No Util:</strong>
                    <select name="no_util" class="form-control">
                        <option value="-">Pilih</option>
                        <option value="E124392 - E124348" {{ $utilita->no_util == 'Siap Operasional' ? 'selected' : '' }}>E124392 - E124348 - Air Conditioner 2,5 pk</option>
                        <option value="E015214 - E014928" {{ $utilita->no_util == 'E015214 - E014928' ? 'selected' : '' }}>E015214 - E014928 - Air Conditioner 2,5 pk</option>
                        <option value="E032020 - E038356" {{ $utilita->no_util == 'E032020 - E038356' ? 'selected' : '' }}>E032020 - E038356 - Air Conditioner 2,5 pk</option>
                        <option value="E032458 -  E036665" {{ $utilita->no_util == 'E032458 -  E036665' ? 'selected' : '' }}>E032458 -  E036665 - Air Conditioner 2,5 pk</option>
                        <option value="E001471 -  E000357" {{ $utilita->no_util == 'E001471 -  E000357' ? 'selected' : '' }}>E001471 -  E000357 - Air Conditioner 2,5 pk</option>
                        <option value="E030675 -E015889" {{ $utilita->no_util == 'E030675 -E015889' ? 'selected' : '' }}>E030675 -E015889 - Air Conditioner 2,5 pk</option>
                        <option value="E009456 - E009362" {{ $utilita->no_util == 'E009456 - E009362' ? 'selected' : '' }}>E009456 - E009362 - Air Conditioner 2,5 pk</option>
                        <option value="E010063 - E009393" {{ $utilita->no_util == 'E010063 - E009393' ? 'selected' : '' }}>E010063 - E009393 - Air Conditioner 2,5 pk</option>
                        <option value="JGBF5005F10017A" {{ $utilita->no_util == 'JGBF5005F10017A' ? 'selected' : '' }}>JGBF5005F10017A - Genset</option>
                        <option value="JGBF5005U10019A" {{ $utilita->no_util == 'JGBF5005U10019A' ? 'selected' : '' }}>JGBF5005U10019A - Genset</option>
                        <option value="52186037" {{ $utilita->no_util == '52186037' ? 'selected' : '' }}>52186037 - Genset</option>
                        <option value="1H1KT2000397"> {{ $utilita->no_util == '1H1KT2000397' ? 'selected' : '' }}1H1KT2000397 - UPS</option>
                        <option value="1H1KT1800883" {{ $utilita->no_util == '1H1KT1800883' ? 'selected' : '' }}>1H1KT1800883 - UPS</option>
                        <option value="1H1KT1800884" {{ $utilita->no_util == '1H1KT1800884' ? 'selected' : '' }}>1H1KT1800884 - UPS</option>
                        <option value="142090145" {{ $utilita->no_util == '142090145' ? 'selected' : '' }}>142090145 - UPS</option>
                        <option value="143082012" {{ $utilita->no_util == '143082012' ? 'selected' : '' }}>143082012 - UPS</option>
                        <option value="21J5U69158" {{ $utilita->no_util == '21J5U69158' ? 'selected' : '' }}>21J5U69158 - AHU</option>
                        <option value="21H568534" {{ $utilita->no_util == '21H568534' ? 'selected' : '' }}>21H568534 - AHU</option>
                        <option value="502725" {{ $utilita->no_util == '502725' ? 'selected' : '' }}>502725 - AHU</option>
                        <option value="502774" {{ $utilita->no_util == '502774' ? 'selected' : '' }}>502774 - AHU</option>
                        <option value="BC802-1/E;Z024500586779012" {{ $utilita->no_util == '5027BC802-1/E;Z02450058677901274' ? 'selected' : '' }}>BC802-1/E;Z024500586779012 - Fire control</option>
                        <option value="400" {{ $utilita->no_util == '400' ? 'selected' : '' }}>400 - Gondola</option>
                        <option value="401" {{ $utilita->no_util == '401' ? 'selected' : '' }}>401 - Gondola</option>
                        <option value="00500F1931" {{ $utilita->no_util == '00500F1931' ? 'selected' : '' }}>00500F1931 - Lift</option>
                        <option value="BS121600" {{ $utilita->no_util == 'BS121600' ? 'selected' : '' }}>BS121600 - Lift</option>
                        <option value="FS2000" {{ $utilita->no_util == 'FS2000' ? 'selected' : '' }}>FS2000 - Lift</option>
                        <option value="HTC12001" {{ $utilita->no_util == 'HTC12001' ? 'selected' : '' }}>HTC12001 - Escalator</option>
                        <option value="HTC21002" {{ $utilita->no_util == 'HTC21002' ? 'selected' : '' }}>HTC21002 - Escalator</option>
                        <option value="HYD23001" {{ $utilita->no_util == 'HYD23001' ? 'selected' : '' }}>HYD23001 - Escalator</option>
                        <option value="HYD32002" {{ $utilita->no_util == 'HYD32002' ? 'selected' : '' }}>HYD32002 - Escalator</option>
                        <option value="HYD34001" {{ $utilita->no_util == 'HYD34001' ? 'selected' : '' }}>HYD34001 - Escalator</option>
                        <option value="HYD43002" {{ $utilita->no_util == 'HYD43002' ? 'selected' : '' }}>HYD43002 - Escalator</option>
                        <option value="MN50750-4" {{ $utilita->no_util == 'MN50750-4' ? 'selected' : '' }}>MN50750-4 - Pompa booster</option>
                        <option value="MN50750-12" {{ $utilita->no_util == 'MN50750-12' ? 'selected' : '' }}>MN50750-12 - Pompa booster</option>
                        <option value="85U051052314390123" {{ $utilita->no_util == '85U051052314390123' ? 'selected' : '' }}>85U051052314390123 - Pompa booster</option>
                        <option value="85U051052314390116" {{ $utilita->no_util == '85U051052314390116' ? 'selected' : '' }}>85U051052314390116 - Pompa booster</option>
                        <option value="504677" {{ $utilita->no_util == '504677' ? 'selected' : '' }}>504677 - Pompa Distribusi</option>
                        <option value="1118542" {{ $utilita->no_util == '1118542' ? 'selected' : '' }}>1118542 - Pompa Distribusi</option>
                        <option value="1113575" {{ $utilita->no_util == '1113575' ? 'selected' : '' }}>1113575 - Pompa Distribusi</option>
                        <option value="1502012P40221" {{ $utilita->no_util == '1502012P40221' ? 'selected' : '' }}>1502012P40221 - Pompa Transfer</option>
                        <option value="1502012P40204" {{ $utilita->no_util == '1502012P40204' ? 'selected' : '' }}>1502012P40204 - Pompa Transfer</option>
                        <option value="65C5440036" {{ $utilita->no_util == '65C5440036' ? 'selected' : '' }}>65C5440036 - Pompa Cooling Tower</option>
                        <option value="65C5440018" {{ $utilita->no_util == '65C5440018' ? 'selected' : '' }}>65C5440018 - Pompa Cooling Tower</option>
                        <option value="65C5440046" {{ $utilita->no_util == '65C5440046' ? 'selected' : '' }}>65C5440046 - Pompa Cooling Tower</option>
                        <option value="65C5440060" {{ $utilita->no_util == '65C5440060' ? 'selected' : '' }}>65C5440060 - Pompa Cooling Tower</option>
                        <option value="65C5440088" {{ $utilita->no_util == '65C5440088' ? 'selected' : '' }}>65C5440088 - Pompa Cooling Tower</option>
                        <option value="DD21357" {{ $utilita->no_util == 'DD21357' ? 'selected' : '' }}>DD21357 - Hydrant Diesel Pump</option>
                        <option value="ID280S-2" {{ $utilita->no_util == 'ID280S-2' ? 'selected' : '' }}>ID280S-2 - Hydrant Electric Pump</option>
                        <option value="85415510" {{ $utilita->no_util == '85415510' ? 'selected' : '' }}>85415510 - Hydrant Jockey Pump</option>
                    </select>
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
            {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Teknisi:</strong>
                    <select name="nama_teknisi" class="form-control">
                        <option value="-">Pilih Tim</option>
                        <option value="Tim A" {{ $utilita->nama_teknisi == 'Tim A' ? 'selected' : '' }} >Tim A</option>
                        <option value="Tim B" {{ $utilita->nama_teknisi == 'Tim B' ? 'selected' : '' }} >Tim B</option>
                        <option value="Vendor" {{ $utilita->nama_teknisi == 'Vendor' ? 'selected' : '' }}>Vendor</option>
                    </select>
                    @error('nama_teknisi')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div> --}}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Teknisi:</strong>
                    <select name="nama_teknisi" class="form-control">
                        <option value="">Pilih Teknisi</option>
                        @foreach ($user as $u)
                            <option value="{{ $u->name }}" {{ $utilita->nama_teknisi == $u->name ? 'selected' : '' }}>{{ $u->name }}</option>
                        @endforeach
                    </select>
                    @error('nama_teknisi')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong>
                    <select name="status_utilitas" class="form-control">
                        <option value="Normal" {{ $utilita->role == 'Normal' ? 'selected' : '' }}>Normal
                        </option>
                        <option value="Failure" {{ $utilita->role == 'Failure' ? 'selected' : '' }}>
                            Failure</option>
                    </select>
                    @error('status_utilitas')
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
