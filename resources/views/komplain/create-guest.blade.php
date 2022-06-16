@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2">
                {{-- <h2>Add Company</h2> --}}
            </div>
            <div class="pull-right">
                {{-- <a class="btn btn-primary" href="{{ route('komplain.index') }}"> Back</a> --}}
            </div>
        </div>
    </div>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
    @endif
    <div class="card">
        <div class="card-body">
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
                            <input type="text" name="uraian_pekerjaan" class="form-control"
                                value='{{old('uraian_pekerjaan')}}'>
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
                            </select>
                            @error('bidang_pekerjaan')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="col-xs-12 col-sm-12 col-md-12">
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
        </div> --}}

        <button type="submit" class="mt-5 btn btn-primary">Submit</button>
    </div>
    </form>
</div>
</div>

<div class="card mt-5">
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
                    {{-- <th>Aksi</th> --}}
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    var table = $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#datatable-crud').DataTable({
            processing: true,
            serverSide: true,
            searching: false,
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
                // {
                //     data: 'action',
                //     name: 'action',
                //     orderable: false
                // },
            ],
            order: [
                [0, 'desc']
            ]
        });

    console.log('asd')
    });


</script>
@stop
