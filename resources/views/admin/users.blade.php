@extends('layout.base')
@section('content')

<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('add.user') }}" method="POST">
                    @csrf
                    <h4 class="card-title">Form Tambah Data</h4>
                    <div class="row">
                       <div class="col-6">
                           <div class="form-group">
                               <label class="form-label" for="fullname">Nama Lengkap</label>
                               <input name="fullname" class="form-control" id="fullname">
                           </div>
                           <div class="form-group">
                               <label class="form-label" for="email">Email</label>
                               <input name="email" class="form-control" id="email">
                           </div>
   
                       </div>
                       <div class="col-6">
                           <div class="form-group">
                               <label class="form-label" for="role">Email</label>
                               <select name="role" id="role" class="form-control">
                                   <option value="" selected>pilih role</option>
                                   @foreach ($user_role as $r )
                                   <option value="{{ $r->id }}">{{ $r->role }} </option>
                                   @endforeach
                               </select>
                               <div class="form-group mt-3">
                                   <label class="form-label" for="password">Password</label>
                                   <input name="password" class="form-control" id="password">
                               </div>
                           </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                        {{-- <button type="submit" class="btn btn-danger">cancel</button> --}}
                </form>
            </div>
        </div>




        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Bootstrap Datatables</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>Images in Bootstrap are made responsive with <code>.img-fluid</code>. <code>max-width: 100%;</code> and <code>height: auto;</code> are applied to the image so that it scales with the parent element.</p>
                        <div class="table-responsive">

                            <table id="datatable" class="table table-striped" data-toggle="data-table">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th width="10%">Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $index => $u )
                                    <tr>

                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $u->fullname }}</td>
                                        <td>{{ $u->email }}</td>
                                        <td>{{ $u->role }}</td>
                                        <td>{{ $u->is_active }}</td>
                                        <td class="d-flex">
                                            <span>
                                                <form action="deleteuser/{{$u->id }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger m-md-2" type="submit"><i class="fas fa-trash-alt">Hapus</i></button>
                                                </form>
                                            </span>
                                            <span>
                                                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $u->id }}">
                                                    Update
                                                </button>
                                            </span>




                                            <div class="modal fade" id="exampleModal{{ $u->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Data Provinsi</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                         <form action="{{ route('update.user',['id'=>$u->id]) }}" method="POST">
                                                            @csrf
                                                            <h4 class="card-title">Form Tambah Data</h4>
                                                            <div class="row">
                                                               <div class="col-6">
                                                                   <div class="form-group">
                                                                       <label class="form-label" for="fullname">Nama Lengkap</label>
                                                                       <input name="fullname" class="form-control" id="fullname" value="{{ $u->fullname }}">
                                                                   </div>
                                                                   <div class="form-group">
                                                                       <label class="form-label" for="email">Email</label>
                                                                       <input name="email" class="form-control" id="email" value="{{ $u->email }}">
                                                                   </div>
                                           
                                                               </div>
                                                               <div class="col-6">
                                                                   <div class="form-group">
                                                                       <label class="form-label" for="role">Role</label>
                                                                       <select name="role" id="role" class="form-control">
                                                                        <option value="" selected>pilih Role</option>
                                                                        @foreach ($user_role as $r )
                                                                        <option @if($r->id == $u->role) selected @endif value="{{ $r->id }}" >{{ $r->role }}</option>
                                                                        @endforeach
                                                                     </select>
                                                                   </div>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </div>
                                                                {{-- <button type="submit" class="btn btn-danger">cancel</button> --}}
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
