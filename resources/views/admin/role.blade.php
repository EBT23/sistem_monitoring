@extends('layout.base')
@section('content')

<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('add.role') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <h4 class="card-title">Form Tambah Data</h4>
                        <label class="form-label" for="role">Masukkan Nama Role</label>
                        <input name="role" class="form-control" id="role">
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    {{-- <button type="submit" class="btn btn-danger">cancel</button> --}}
                </form>
            </div>
        </div>




        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Data Role</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped" data-toggle="data-table">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Nama Role</th>
                                        <th width="10%">Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($role as $index => $r )
                                    <tr>

                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $r->role }}</td>
                                        <td class="d-flex">
                                            <span>
                                                <form action="deleterole/{{$r->id }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger m-md-2" type="submit"><i
                                                            class="fas fa-trash-alt">Hapus</i></button>
                                                </form>
                                            </span>
                                            <span>
                                                <button type="button" class="btn btn-primary mt-2"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal{{ $r->id }}">
                                                    Update
                                                </button>
                                            </span>




                                            <div class="modal fade" id="exampleModal{{ $r->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Data
                                                                role</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('update.role',['id'=>$r->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <h4 class="card-title">Form Tambah Data</h4>
                                                                    <label class="form-label" for="role">Masukkan Nama
                                                                        role</label>
                                                                    <input name="role" class="form-control" id="role"
                                                                        value="{{ $r->role }}">
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