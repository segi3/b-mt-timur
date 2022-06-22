@extends('adminlte::page')

@section('title', 'Gramedia Maintenance')

@section('content_header')
<h1 class="m-0 text-dark">Konsumsi Energi</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="pull-right mb-2">
            <a class="btn btn-primary" href="{{ route('energy.rekap') }}">Rekap Konsumsi Energi</a>
        </div>
        <div class="card">
            <form method="POST" action="{{ route('energy.upsert') }}">
                @csrf

                <div class="card-body row">

                    <div class="col-lg-4 row">
                        <div class="col-lg-12 d-flex justify-content-center">
                            {{-- <i class="fas fa-fw fa-bolt fa-10x"></i> --}}
                            <img src="{{ asset('img/energy-bolt.jpeg') }}" alt="" style="max-width: 150px;">
                        </div>
                        <div class="col-lg-12 d-flex justify-content-center">

                        <label for="">Pemakaian Listrik</label>
                        </div>
                        <div class="col-lg-12 d-flex justify-content-center">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Konsumsi Listrik" value="{{ $util->konsumsi_listrik }}"
                                    aria-label="Konsumsi Listrik" aria-describedby="basic-addon2" name="konsumsi_listrik">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">KWH</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 row">
                        <div class="col-lg-12 d-flex justify-content-center">
                            {{-- <i class="fas fa-fw fa-water fa-10x"></i> --}}
                            <img src="{{ asset('img/energy-water.jpeg') }}" alt="" style="max-width: 150px;">
                        </div>
                        <div class="col-lg-12 d-flex justify-content-center">

                            <label for="">Pemakaian Air</label>
                            </div>
                        <div class="col-lg-12 d-flex justify-content-center">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Konsumsi Air" value="{{ $util->konsumsi_air }}"
                                    aria-label="Konsumsi Air" aria-describedby="basic-addon3" name="konsumsi_air">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon3">M3</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 row">
                        <div class="col-lg-12 d-flex justify-content-center">
                            {{-- <i class="fas fa-fw fa-fire fa-10x"></i> --}}
                            <img src="{{ asset('img/energy-gas.jpeg') }}" alt="" style="max-width: 150px;">
                        </div>
                        <div class="col-lg-12 d-flex justify-content-center">

                            <label for="">Pemakaian Gas</label>
                            </div>
                        <div class="col-lg-12 d-flex justify-content-center">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Konsumsi Gas" value="{{ $util->konsumsi_listrik }}"
                                    aria-label="Konsumsi Gas" aria-describedby="basic-addon4" name="konsumsi_gas">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon4">KG</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Jadwal Maintenance:</strong>
                            <input type="text" name="tanggal" value="" class="form-control" />
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <button type="submit" class="btn btn-sm btn-primary">Update data</button>
                    </div>

                </div>
            </form>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table table-bordered yajra-datatable">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Konsumsi Listrik (KWH)</th>
                            <th>Konsumsi Air (m3)</th>
                            <th>Konsumsi Gas (KG)</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
{{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> --}}
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
<script type="text/javascript">
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('energy.list') }}",
            columns: [{
                    data: 'tanggal',
                    name: 'tanggal'
                },
                {
                    data: 'konsumsi_listrik',
                    name: 'konsumsi_listrik'
                },
                {
                    data: 'konsumsi_air',
                    name: 'konsumsi_air'
                },
                {
                    data: 'konsumsi_gas',
                    name: 'konsumsi_gas'
                }
            ],
            order: [
                [0, 'desc']
            ]
        });
    });

</script>
@stop
