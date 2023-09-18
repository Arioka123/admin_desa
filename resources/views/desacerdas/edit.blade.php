@extends('layouts.master')

@section('title', 'Desa Cerdas')

@section('breadcrumb')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Desa Cerdas</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Desa Cerdas</li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header text-left">
                        <h5>Ubah Data</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('desacerdas.store') }}" method="post" autocomplete="off">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" value="{{ $desacerdas->id }}"
                                    class="form-control" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <label>nama</label>
                                <input type="text" name="nama" id="nama" placeholder="nama"
                                    value="{{ $desacerdas->nama }}" class="form-control">
                            </div>

                            <div class="form-group">
                                <table style="width:100%">
                                    <label>Jenis</label>
                                    <tr>
                                        <td> <input type="radio" id="jenis" name="jenis">
                                            <label for="html">Informasi</label><br>
                                        </td>
                                        <td><input type="radio" id="jenis" name="jenis">
                                            <label for="css">Awig-Awig</label><br>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="form-group">
                                <label>Keterangan</label>
                                <div class="form-group">
                                    <textarea name="keterangan" value="{{ $desacerdas->keterangan }}" class="form-control catatan" rows="3"
                                        placeholder="Keterangan...">
                      </textarea>
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <hr>
                                <a href="{{ route('desacerdas.home') }}" class="btn btn-danger" style="width: 100px;">
                                    <i class="fa fa-times-circle"></i> Batal
                                </a>
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
        $('.catatan').summernote({
            inheritPlaceholder: true,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ]
        });
        $('#status').select2({
            theme: 'bootstrap4',
            placeholder: 'Pilih Status'
        });
    </script>
    <script>
        $('#status').select2({
            theme: 'bootstrap4',
            placeholder: 'Pilih Status'
        });
    </script>

    <script>
        $("#tanggal_sampai").datetimepicker({
            format: 'yyyy-MM-DD',
        });


        script > $("#tanggal_dari").datetimepicker({
            format: 'DD-MM-yyyy',
        });

        $(function() {
            $('input[name=nilai]').formuang();
        });
    </script>


@endsection
