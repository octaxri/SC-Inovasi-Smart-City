@extends('master')
@section('konten')
<!-- BEGIN::Konten Utama -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- BEGIN::Header & Breadcrumb -->
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="ik ik-aperture bg-blue"></i>
                            <div class="d-inline">
                                <h5>Kelola</h5>
                                <span>Halaman Kelola Data Pilar</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <nav class="breadcrumb-container" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/dashboard"><i class="ik ik-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active"  aria-current="page">Kelola</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- END::Header & Breadcrumb -->

            <!-- BEGIN::Tabel Data Pilar -->
            <div class="card">
                <div class="card-header row">
                    <div class="col col-sm-3">
                        <div class="card-options d-inline-block">
                            <a href="/pilars/tambah"><i class="ik ik-plus"></i></a>
                            <a href="/pilars"><i class="ik ik-rotate-cw"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="myTable" class="table text-center">
                        <thead>
                            <tr>
                                <th width="10%">No</th>
                                <th>Name</th>
                                <th>Keterangan</th>
                                <th width="20%" class="sorting_asc_disabled sorting_desc_disabled">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($df_pilar as $daftar_pilar)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {{ $daftar_pilar->name }} </td>
                                    <td> {{ $daftar_pilar->description }} </td>
                                    <td>
                                        <a href="pilars/edit/{{$daftar_pilar->id}}" class="badge badge-success">Ubah</a>
                                        <a href="/pilars/hapus/{{ $daftar_pilar->id }}"  class="badge badge-danger">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END::Tabel Data Pilar -->

        </div>
    </div>
<!-- END::Konten Utama -->

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection
