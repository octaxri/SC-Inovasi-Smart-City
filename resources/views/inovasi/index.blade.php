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
                            <h5>DATA TAHAPAN INOVASI BERJALAN</h5>
                            <span>Halaman kelola Data Inovasi</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/dashboard"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Kelola</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- END::Header & Breadcrumb -->

        <!-- BEGIN::Tabel Data Inovasi Berjalan -->
        <div class="card">
            <div class="card-header row">
                <div class="col col-sm-3">
                    <div class="card-options d-inline-block">
                        <a href="tambah-inovasi"><i class="ik ik-plus"></i></a>
                        <a href="inovasi"><i class="ik ik-rotate-cw"></i></a>
                    </div>
                </div>
                <div class="col-sm-3">
                    
                </div>
            </div>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                <?=
                    $user = Session::get('data_2');
                ?>
                <table id="tableInovasi" class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th>Inovasi</th>
                            <th>Perangkat Daerah</th>
                            <th>Tahapan</th>
                            <th>Progres Tahapan</th>
                            <th>Total Progres</th>
                            <th class="sorting_asc_disabled sorting_desc_disabled">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0; ?>
                        @foreach($ino_steps as $ino_step)
                        <!--validasi inovasi step == total Memberi Total Progres per step -->
                        <?php
                            // foreach($totals as $key_total => $total){
                            //     if($ino_step->id == $total->innov_step_id){
                            //         $tmp_total = $total;
                            //     }
                            // }
                        ?>
                        <tr>
                            <td scope="row">{{$loop->iteration}}</td>
                            <td><a href="/inovasi/detail/{{$ino_step->innovation->id}}">{{$ino_step->innovation->name}}</a></td>
                            <td>{{$ino_step->innovation->institute->name}}</td>
                            <td>{{$ino_step->step->name}}</td>
                            <td>{{$ino_step->progress_persentage}}%</td>
                            <td>{{$totals[$no]->persentasi}}%</td>
                            <td>
                                <a href="/inovasi/edit/{{$ino_step->innovation->id}}" class="badge badge-success">Ubah</a>
                                <a href="/inovasi/hapus/{{$ino_step->innovation->id}}" class="myModal badge badge-danger" data-toggle="modal" data-target="#myModal-<?php echo $no; // Displaying the increment
                                ?>">Hapus</a>
                            </td>


                            <div class="modal fade" id="myModal-<?php echo $no; // Displaying the increment 
                                                                ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h5 class="modal-title">Peringatan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <p>Yakin Ingin Menghapus Data ?</p>
                                        </div>

                                        <div class="modal-footer">
                                            <a href="" class="btn badge-danger">Hapus</a>
                                            <a class="btn btn-secondary" data-dismiss="modal">Batalkan</a>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            {{-- <td scope="row">{{$loop->iteration}}</td>
                            <td><a href="/inovasi/detail/{{$ino_step->innovation->id}}">{{$ino_step->innovation->name}}</a></td>
                            <td>{{$ino_step->innovation->institute->short_name}}</td>
                            <td>{{$ino_step->step->name}}</td>
                            <td>{{$ino_step->progress_persentage}}%</td>
                            {{-- @foreach ($persentase as $persen) --}}
                            {{-- <td>{{$persentase}}%</td> --}}
                            {{-- @endforeach --}}
                            {{-- <td>
                                            <a href="/inovasi/edit/{{$ino_step->innovation->id}}" class="badge badge-warning">Ubah</a>
                            <a href="/inovasi/hapus/{{$ino_step->innovation->id}}" class="badge badge-danger">Hapus</a>
                            </td> --}}
                        </tr>
                        <?php $no += 1; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- END::Tabel Data Inovasi -->

    </div>
    
</div>
<div class="main-content">
    <div class="container-fluid">
        <!-- BEGIN::Header & Breadcrumb -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-aperture bg-blue"></i>
                        <div class="d-inline">
                            <h5>DATA TAHAPAN INOVASI YANG SUDAH SELESAI</h5>
                            <span>Halaman kelola Data Inovasi</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/dashboard"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Kelola</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- END::Header & Breadcrumb -->

        <!-- BEGIN::Tabel Data Inovasi -->
        <div class="card">
            <div class="card-header row">
                <div class="col col-sm-3">
                    <div class="card-options d-inline-block">
                        <a href="tambah-inovasi"><i class="ik ik-plus"></i></a>
                        <a href="inovasi"><i class="ik ik-rotate-cw"></i></a>
                    </div>
                </div>
                <!-- <div class="col col-sm-6">
                    <div class="card-search with-adv-search dropdown">
                        <form action="/inovasi/cari" method="GET">
                            <input type="text" class="form-control global_filter" id="global_filter" name="cari_global" placeholder="Pencarian" required>
                            <button type="submit" class="btn btn-icon"><i class="ik ik-search"></i></button>
                            <button type="button" id="adv_wrap_toggler" class="adv-btn ik ik-chevron-down dropdown-toggle" data-toggle="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                            <div class="adv-search-wrap dropdown-menu dropdown-menu-right" aria-labelledby="adv_wrap_toggler">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control column_filter" id="col0_filter" placeholder="Inovasi" name="cari_inovasi" data-column="0" value="{{ old('cari_inovasi') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control column_filter" id="col1_filter" placeholder="Perangkat Daerah/Dewan Smart City" name="cari_perangkat" data-column="1" value="{{ old('cari_perangkat') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control column_filter" id="col2_filter" placeholder="Tahun" name="cari_tahun" data-column="2" value="{{ old('cari_tahun') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control column_filter" id="col3_filter" placeholder="Bulan" name="cari_bulan" data-column="3" value="{{ old('cari_bulan') }}">
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-theme">Cari</button>
                            </div>
                        </form>
                    </div>
                </div> -->
                <div class="col-sm-3">
                    
                </div>
            </div>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                <?=
                    $user = Session::get('data_2');
                ?>
                <table id="tableInovasi" class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th>Inovasi</th>
                            <th>Perangkat Daerah</th>
                            <th>Tahapan</th>
                            <th>Progres Tahapan</th>
                            <th>Total Progres</th>
                            <th class="sorting_asc_disabled sorting_desc_disabled">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $nom = $no; 
                        ?>
                        @foreach($ino_steps2 as $ino_step)
                        <!--validasi inovasi step == total Memberi Total Progres per step -->                       
                        <tr>
                            <td scope="row">{{$loop->iteration}}</td>
                            <td><a href="/inovasi/detail/{{$ino_step->innovation->id}}">{{$ino_step->innovation->name}}</a></td>
                            <td>{{$ino_step->innovation->institute->name}}</td>
                            <td>{{$ino_step->step->name}}</td>
                            <td>{{$ino_step->progress_persentage}}%</td>
                            <td>{{$totals[$no]->persentasi}}%</td>
                            <td>
                                <a href="/inovasi/edit/{{$ino_step->innovation->id}}" class="badge badge-success">Ubah</a>
                                <a href="/inovasi/hapus/{{$ino_step->innovation->id}}" class="myModal badge badge-danger" data-toggle="modal" data-target="#myModal-<?php echo $no; // Displaying the increment
                                ?>">Hapus</a>
                            </td>


                            <div class="modal fade" id="myModal-<?php echo $nom; // Displaying the increment 
                                                                ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h5 class="modal-title">Peringatan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <p>Yakin Ingin Menghapus Data ?</p>
                                        </div>

                                        <div class="modal-footer">
                                            <a href="" class="btn badge-danger">Hapus</a>
                                            <a class="btn btn-secondary" data-dismiss="modal">Batalkan</a>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            {{-- <td scope="row">{{$loop->iteration}}</td>
                            <td><a href="/inovasi/detail/{{$ino_step->innovation->id}}">{{$ino_step->innovation->name}}</a></td>
                            <td>{{$ino_step->innovation->institute->short_name}}</td>
                            <td>{{$ino_step->step->name}}</td>
                            <td>{{$ino_step->progress_persentage}}%</td>
                            {{-- @foreach ($persentase as $persen) --}}
                            {{-- <td>{{$persentase}}%</td> --}}
                            {{-- @endforeach --}}
                            {{-- <td>
                                            <a href="/inovasi/edit/{{$ino_step->innovation->id}}" class="badge badge-warning">Ubah</a>
                            <a href="/inovasi/hapus/{{$ino_step->innovation->id}}" class="badge badge-danger">Hapus</a>
                            </td> --}}
                        </tr>
                        <?php $nom += 1; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- END::Tabel Data Inovasi -->

    </div>

<!-- END::Konten Utama -->

<script>
    $(document).ready(function() {
        $('#tableInovasi').DataTable();
    });
</script>
@endsection