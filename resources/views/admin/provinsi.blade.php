@extends('layout.base')
@section('content')

<div class="row">
   <div class="col-md-12 col-lg-12">
      <div class="card">
         <div class="card-body">
            <form action="{{ route('add.provinsi') }}" method="POST">
               @csrf
               <div class="form-group">
                  <h4 class="card-title">Form Tambah Data</h4>
                  <label class="form-label" for="nama_provinsi">Masukkan Nama Provinsi</label>
                  <input name="nama_provinsi" class="form-control" id="nama_provinsi">
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
                     <h4 class="card-title">Data Provinsi</h4>
                  </div>
               </div>
               <div class="card-body">
                  <div class="table-responsive">

                     <table id="datatable" class="table table-striped" data-toggle="data-table">
                        <thead>
                           <tr>
                              <th width="5%">No</th>
                              <th>Nama Provinsi</th>
                              <th width="10%">Aksi</th>

                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($provinsi as $index => $pr )
                           <tr>

                              <td>{{ $index+1 }}</td>
                              <td>{{ $pr->nama_provinsi }}</td>
                              <td class="d-flex">
                                 <span>
                                    <form action="deleteprovinsi/{{$pr->id }}" method="POST">
                                       @method('DELETE')
                                       @csrf
                                       <button class="btn btn-danger m-md-2" type="submit"
                                          onclick="javascript: return confirm('Anda yakin akan menghapus ini? ')"><i
                                             class="fas fa-trash-alt">Hapus</i></button>
                                    </form>
                                 </span>
                                 <span>
                                    <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal"
                                       data-bs-target="#exampleModal{{ $pr->id }}">
                                       Update
                                    </button>
                                 </span>




                                 <div class="modal fade" id="exampleModal{{ $pr->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <h5 class="modal-title" id="exampleModalLabel">Update Data Provinsi</h5>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                             <form action="{{ route('update.provinsi',['id'=>$pr->id]) }}"
                                                method="POST">
                                                @csrf
                                                <div class="form-group">
                                                   <h4 class="card-title">Form Tambah Data</h4>
                                                   <label class="form-label" for="nama_provinsi">Masukkan Nama
                                                      Provinsi</label>
                                                   <input name="nama_provinsi" class="form-control" id="nama_provinsi"
                                                      value="{{ $pr->nama_provinsi }}">
                                                </div>
                                                <div class="checkbox mb-3">
                                                </div>

                                                <div class="modal-footer">
                                                   <button type="button" class="btn btn-secondary"
                                                      data-bs-dismiss="modal">Close</button>
                                                   <button type="submit" class="btn btn-primary">Save changes</button>
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