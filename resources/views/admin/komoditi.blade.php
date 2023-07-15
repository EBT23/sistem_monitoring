@extends('layout.base')
@section('content')

<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('add.komoditi') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <h4 class="card-title">Form Tambah Data</h4>
                        <div class="col-6">
                            <label class="form-label" for="id_status_pt">Pilih pengusahaan tanaman</label>
                            <select name="id_status_pt" id="id_status_pt" class="form-control">
                                <option value="" selected>Pilih pengusahaan tanaman</option>
                                @foreach ($status_pt as $spt )
                                <option value="{{ $spt->id }}">{{ $spt->status_pengusahaan_tanaman }}</option>
                                @endforeach
                            </select>

                            <label class="form-label mt-3" for="nama_komoditi">Masukkan Nama Komoditi</label>
                            <input name="nama_komoditi" class="form-control" id="nama_komoditi">

                            <div class="mt-2">
                                <label for="gambar">Gambar: </label><br>
                                <input type="file" id="gambar" name="gambar">
                            </div>
                        </div>
                    </div>
                    <div class="checkbox mb-3">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    {{-- <button type="submit" class="btn btn-danger">cancel</button> --}}
                </form>
            </div>
        </div>




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
                            <h4 class="card-title">Data Komoditi</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- <p>Images in Bootstrap are made responsive with <code>.img-fluid</code>.
                            <code>max-width: 100%;</code>
                            and <code>height: auto;</code> are applied to the image so that it scales with the parent
                            element.
                        </p> --}}
                        <div class="table-responsive">

                            <table id="datatable" class="table table-striped" data-toggle="data-table">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Status Perusahaan Tanaman</th>
                                        <th>Nama Komoditi</th>
                                        <th>Gambar</th>
                                        <th width="10%">Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($komoditi as $index => $ko )
                                    <tr>

                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $ko->status_pengusahaan_tanaman }}</td>
                                        <td>{{ $ko->nama_komoditi }}</td>
                                        <td>
                                            @if ($ko->gambar)
                                            <img src="{{ asset('images/' . $ko->gambar) }}" alt="Gambar Komoditi"
                                                width="90" height="90">
                                            @else
                                            N/A
                                            @endif
                                        </td>
                                        <td class="d-flex">
                                            <span>
                                                <form action="deletekomoditi/{{$ko->id }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger m-md-2" type="submit"><i
                                                            class="fas fa-trash-alt"
                                                            onclick="javascript: return confirm('Anda yakin akan menghapus ini? ')">Hapus</i></button>
                                                </form>
                                            </span>
                                            <span>
                                                <button type="button" class="btn btn-primary mt-2"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal{{ $ko->id }}">
                                                    Update
                                                </button>
                                            </span>




                                            <div class="modal fade" id="exampleModal{{ $ko->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Data
                                                                Komoditi</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ route('update_komoditi.update', $ko->id) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-group">
                                                                    <label class="form-label text-black"
                                                                        for="id_status_pt">Pilih
                                                                        Pengusahaan Tanaman</label>
                                                                    <select name="id_status_pt" id="id_status_pt"
                                                                        class="form-control">
                                                                        <option value="" selected>pilih Status
                                                                            Pengusahaan Tanaman
                                                                        </option>
                                                                        @foreach ($status_pt as $spt )
                                                                        <option @if($spt->id ==
                                                                            $ko->id_status_pengusahaan_tanaman) selected
                                                                            @endif value="{{
                                                                            $spt->id }}" >{{
                                                                            $spt->status_pengusahaan_tanaman }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>

                                                                    <label class="form-label mt-3 text-black"
                                                                        for="nama_komoditi">Masukkan Nama
                                                                        Komoditi</label>
                                                                    <input name="nama_komoditi" class="form-control"
                                                                        id="nama_komoditi"
                                                                        value="{{ $ko->nama_komoditi }}">

                                                                    <div class="mt-3">
                                                                        <label for="gambar">Gambar:</label><br>
                                                                        <input type="file" id="gambar" name="gambar">
                                                                    </div>
                                                                </div>
                                                                <div class="checkbox mb-3">
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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