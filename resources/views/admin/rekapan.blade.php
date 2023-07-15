@extends('layout.base')
@section('content')

<div class="row">
    <div class="col-md-12 col-lg-12">

        <div class="row">
            <div class="col-md-12">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Data Rekapan</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table id="datatable" class="table table-striped" data-toggle="data-table">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Nama Provinsi</th>
                                        <th>Nama Kabupaten</th>
                                        <th>Nama Kecamatan</th>
                                        <th>Tahun</th>
                                        <th>Status Pengusahaan Tanaman</th>
                                        <th>Komoditi</th>
                                        <th>Nama Pelapor</th>
                                        <th>TBM</th>
                                        <th>TM</th>
                                        <th>TR</th>
                                        <th>Jumlah</th>
                                        <th>Produksi</th>
                                        <th>Produktivitas</th>
                                        <th>Pekebun</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                        <th width="10%">Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rekapan as $index => $pr )
                                    <tr>

                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $pr->nama_provinsi }}</td>
                                        <td>{{ $pr->nama_kabupaten }}</td>
                                        <td>{{ $pr->nama_kecamatan }}</td>
                                        <td>{{ $pr->tahun }}</td>
                                        <td>{{ $pr->status_pengusahaan_tanaman }}</td>
                                        <td>{{ $pr->nama_komoditi }}</td>
                                        <td>{{ $pr->fullname }}</td>
                                        <td>{{ $pr->tbm }}</td>
                                        <td>{{ $pr->tm }}</td>
                                        <td>{{ $pr->tr }}</td>
                                        <td>{{ $pr->jumlah }}</td>
                                        <td>{{ $pr->produksi }}</td>
                                        <td>{{ $pr->produktivitas }}</td>
                                        <td>{{ $pr->pekebun }}</td>
                                        @if($pr->status == 1)
                                        <td><span class="badge text-bg-success">Verified</span></td>

                                        @elseif($pr->status == 2)
                                        <td><span class="badge text-bg-danger">No Verified</span></td>
                                        @else
                                        <td><span class="badge text-bg-warning">Pending</span></td>
                                        @endif
                                        <td>{{ $pr->keterangan }}</td>
                                        <td class="d-flex">
                                            <span>
                                                <form action="deleterekapan/{{$pr->id }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger m-md-2" type="submit"><i
                                                            class="fas fa-trash-alt">Hapus</i></button>
                                                </form>
                                            </span>
                                            @if($pr->status == 3)
                                            <span>
                                                <form action="acc_rekapan/{{$pr->id }}" method="POST">
                                                    @method('GET')
                                                    @csrf
                                                    <button class="btn btn-success m-md-2" type="submit"><i
                                                            class="fas fa-trash-alt">Verifikasi</i></button>
                                                </form>
                                            </span>
                                            <span>
                                                <form action="tolak_rekapan/{{$pr->id }}" method="POST">
                                                    @method('GET')
                                                    @csrf
                                                    <button class="btn btn-danger m-md-2" type="submit"><i
                                                            class="fas fa-trash-alt">Tolak</i></button>
                                                </form>
                                            </span>
                                            @else
                                            <span>
                                                <form action="batalkan_rekapan/{{$pr->id }}" method="POST">
                                                    @method('GET')
                                                    @csrf
                                                    <button class="btn btn-danger m-md-2" type="submit"><i
                                                            class="fas fa-trash-alt">Batalkan</i></button>
                                                </form>
                                            </span>
                                            @endif

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

@endsection