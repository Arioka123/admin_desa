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
                <li class="breadcrumb-item active">Desa Cerdas</li>
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
                        <a href="{{ route('desacerdas.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus-circle"></i> Tambah
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="table" class="table table-bordered table-hover dataTable dtr-inline" role="grid"
                            style="width: 100%;">
                            <thead>
                                <tr>
                                    <th width="30" class="text-center">No</th>
                                    <th>Nama</th>
                                    <th>Jenis</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
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
        $(document).ready(function() {
            $('#table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('desacerdas.data') }}',
                    type: 'GET',
                },
                columns: [{
                        data: 'id',
                        name: 'id',
                        className: 'text-center',
                        orderable: false
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'jenis',
                        name: 'jenis'
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        className: 'text-center'
                    }
                ],
                order: [
                    [1, 'asc']
                ],
                oLanguage: {
                    sProcessing: "Memuat Data.."
                },
                fnCreatedRow: function(row, data, index) {
                    $('td', row).eq(0).html(index + 1);
                },
            });
        });
        $(document).on('click', '.Hapus', function() {
            var id = $(this).attr("ids");
            var nama = $(this).closest('tr').find('.nama').text()
            swalWithBootstrapButtons.fire({
                title: 'Anda yakin menghapus' + ' ' + nama + ' ' + '?',
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Batal',
                confirmButtonText: 'Hapus',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('desacerdas.store') }}',
                        type: 'POST',
                        cache: false,
                        data: {
                            id: id,
                            mode: 'del',
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(data) {
                            notifikasi({
                                icon: 'success',
                                type: 'success',
                                title: 'Berhasil Menyimpan Data'
                            });
                            window.location.reload();
                        }
                    });
                }
            })
        });
    </script>
@endsection
