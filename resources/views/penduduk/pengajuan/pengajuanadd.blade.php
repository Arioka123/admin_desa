@extends('layouts.master')

@section('title', 'Pengajuan')

@section('breadcrumb')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Pengajuan</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Pengajuan</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header text-right">
                    </div>
                    <div class="card-body">
                        <form action="{{ route('penduduk.pengajuan.store') }}" method="post" autocomplete="off">
                            @csrf
                            @method('POST')

                            <div class="form-group">
                                <label>Jenis Surat</label>
                                <select name="jenis_surat_id" id="jenis_surat_id" class="form-control" style="width: 100%;">
                                    @foreach ($jenis_surat as $kec)
                                        <option value="{{ $kec->id }}">{{ $kec->jenis_surat }}</option>
                                    @endforeach
                                </select>
                                @error('jenis_surat_id')
                                    <span class="text-danger font-weight-bold small">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Atas Nama Surat</label>
                                <select name="penduduk_id_atas_nama" id="penduduk_id_atas_nama" class="form-control"
                                    style="width: 100%;">
                                    @foreach ($keluarga as $kel)
                                        <option value="{{ $kel->id }}">{{ $kel->nama_lgkp }}</option>
                                    @endforeach
                                </select>
                                @error('penduduk_id_atas_nama')
                                    <span class="text-danger font-weight-bold small">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Tujuan Permohonan</label>
                                <input type="text" name="tujuan_permohonan" id="tujuan_permohonan"
                                    placeholder="Tujuan Permohonan" class="form-control">
                            </div>

                            <div class="form-group text-right">
                                <hr>
                                <button type="submit" class="btn btn-success" style="width: 100px;">
                                    <i class="fa fa-check-circle"></i> Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>

    </style>
@endsection

@section('js')
    <script>
        $('#status').select2({
            theme: 'bootstrap4',
            placeholder: 'Pilih Status'
        });
    </script>
    <script>
        $('#id_kecamatan').select2({
            theme: 'bootstrap4',
        });
    </script>
@endsection
