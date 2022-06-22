@extends('adminlte::page')

@section('title', 'Gramedia Maintenance')

@section('content_header')
<h1 class="m-0 text-dark">Tambah Utilitas Baru</h1>
@stop

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2">
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('utilitas.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
    @endif
    <form action="{{ route('utilitas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Bidang Utilitas:</strong>
                    <select name="bidang_utilitas" class="form-control">
                        <option value="-" disabled selected>Pilih Bidang</option>
                        <option value="Elektrikal">Elektrikal</option>
                        <option value="Mekanikal">Mekanikal</option>
                        <option value="Plumbing">Plumbing</option>
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
                        <option value="-" disabled selected>Pilih Jenis</option>

                        <option value="AC Split 2,5PK">AC Split 2,5PK</option>
                        <option value="Genset">Genset </option>
                        <option value="UPS">UPS</option>
                        <option value="AHU">AHU</option>
                        <option value="Fire Alarm">Fire Alarm</option>

                        <option value="Gondola">Gondola</option>
                        <option value="Lift">Lift</option>
                        <option value="Escalator">Escalator</option>

                        <option value="Pompa Boster">Pompa Boster</option>
                        <option value="Pompa Distribusi">Pompa Distribusi</option>
                        <option value="Pompa Transfer">Pompa Transfer</option>
                        <option value="Pompa Cooling Tower">Pompa Cooling Tower</option>
                        <option value="Pompa Hydrant Diesel">Pompa Hydrant Diesel</option>
                        <option value="Pompa Hydrant Elektrik">Pompa Hydrant Elektrik</option>
                        <option value="Pompa Jokey">Pompa Jokey</option>
                    </select>
                    @error('jenis_utilitas')
                    {{-- </div> --}}
                    @enderror
                </div>
            </div>

            {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>No Util:</strong>
                    <select name="no_util" class="form-control">
                        <option value="-">Pilih</option>
                        <option value="E124392 - E124348">E124392 - E124348 - Elektrikal</option>
                        <option value="E015214 - E014928">E015214 - E014928 - Elektrikal</option>
                        <option value="E015214 - E014928">E015214 - E014928 - Elektrikal</option>
                        <option value="E032020 - E038356">E032020 - E038356 - Elektrikal</option>
                        <option value="E032458 -  E036665" E032458 - E03>E032458 - E036665 - Elektrikal</option>
                        <option value="E001471 -  E000357" E001471 - E00>E001471 - E000357 - Elektrikal</option>
                        <option value="E030675 -E015889" E030675 -E01>E030675 -E015889 - Elektrikal</option>
                        <option value="E001471 - E00357" E001471 - E0>E001471 - E00357 - Elektrikal</option>
                        <option value="E009456 - E009362" E009456 - E00>E009456 - E009362 - Elektrikal</option>
                        <option value="E010063 - E009393" E010063 - E00>E010063 - E009393 - Elektrikal</option>
                        <option value="JGBF5005F10017A" JGBF5005F10>JGBF5005F10017A - Elektrikal</option>
                        <option value="JGBF5005U10019A" JGBF5005U10>JGBF5005U10019A - Elektrikal</option>
                        <option value="52186037" 5218>52186037 - Elektrikal</option>
                        <option value="1H1KT2000397"> 1H1KT2001H1KT2000397 - Elektrikal</option>
                        <option value="1H1KT1800883" 1H1KT180>1H1KT1800883 - Elektrikal</option>
                        <option value="1H1KT1800884" 1H1KT180>1H1KT1800884 - Elektrikal</option>
                        <option value="142090145" 14209>142090145 - Elektrikal</option>
                        <option value="143082012" 14308>143082012 - Elektrikal</option>
                        <option value="21J5U69158" 21J5U6>21J5U69158 - Elektrikal</option>
                        <option value="21H568534" 21H56>21H568534 - Elektrikal</option>
                        <option value="502725" 50>502725 - Elektrikal</option>
                        <option value="502774" 50>502774 - Elektrikal</option>
                        <option value="BC802-1/E;Z024500586779012"
                            5027BC802-1/E;Z0245005867790>BC802-1/E;Z024500586779012 - Elektrikal</option> <option
                            value="400">400 - Mekanikal</option>
                        <option value="401">401 - Mekanikal</option>
                        <option value="00500F1931" 00500F>00500F1931 - Mekanikal</option>
                        <option value="BS121600" BS12>BS121600 - Mekanikal</option>
                        <option value="FS2000" FS>FS2000 - Mekanikal</option>
                        <option value="HTC12001" HTC1>HTC12001 - Mekanikal</option>
                        <option value="HTC21002" HTC2>HTC21002 - Mekanikal</option>
                        <option value="HYD23001" HYD2>HYD23001 - Mekanikal</option>
                        <option value="HYD32002" HYD3>HYD32002 - Mekanikal</option>
                        <option value="HYD34001" HYD3>HYD34001 - Mekanikal</option>
                        <option value="HYD43002" HYD4>HYD43002 - Mekanikal</option>

                        <option value="MN50750-4" MN507>MN50750-4 - Plumbing</option>
                        <option value="MN50750-12" MN5075>MN50750-12 - Plumbing</option>
                        <option value="85U051052314390123" 85U05105231439>85U051052314390123 - Plumbing</option>
                        <option value="85U051052314390116" 85U05105231439>85U051052314390116 - Plumbing</option>
                        <option value="1118542" 111>1118542 - Plumbing</option>
                        <option value="1113575" 111>1113575 - Plumbing</option>
                        <option value="1502012P40221" 1502012P4>1502012P40221 - Plumbing</option>
                        <option value="1502012P40204" 1502012P4>1502012P40204 - Plumbing</option>
                        <option value="65C5440036" 65C544>65C5440036 - Plumbing</option>
                        <option value="65C5440018" 65C544>65C5440018 - Plumbing</option>
                        <option value="65C5440046" 65C544>65C5440046 - Plumbing</option>
                        <option value="65C5440060" 65C544>65C5440060 - Plumbing</option>
                        <option value="65C5440088" 65C544>65C5440088 - Plumbing</option>
                        <option value="DD21357" DD2>DD21357 - Plumbing</option>
                        <option value="ID280S-2" ID28>ID280S-2 - Plumbing</option>
                        <option value="85415510" 8541>85415510 - Plumbing</option>
                    </select>
                    @error('no_util')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div> --}}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nomor Utilitas:</strong>
                    <input type="text" name="no_util" class="form-control" placeholder="no_util"
                        value=''>
                    @error('no_util')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Lokasi Utilitas:</strong>
                    <input type="text" name="lokasi_utilitas" class="form-control" placeholder="lokasi_utilitas"
                        value=''>
                    @error('lokasi_utilitas')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Keterangan:</strong>
                    <input type="text" name="keterangan" class="form-control" placeholder="keterangan" value=''>
                    @error('keterangan')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal:</strong>
                    <input type="text" name="tanggal" value="" class="form-control" />
                </div>
            </div>
            {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Teknisi:</strong>
                    <select name="nama_teknisi" class="form-control">
                        <option value="-">Pilih Tim</option>
                        <option value="Tim A"  >Tim A</option>
                        <option value="Tim B"  >Tim B</option>
                        <option value="Vendor" >Vendor</option>
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
                            <option value="{{ $u->name }}">{{ $u->name }}</option>
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
                        <option value="Siap Operasional">Siap Operasional
                        </option>
                        <option value="Tidak Siap Operasional">
                            Tidak Siap Operasional</option>
                    </select>
                    @error('status_utilitas')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </div>
    </form>
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
