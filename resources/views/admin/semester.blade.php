@extends('layout.base')
@section('content')

<div class="row">
   <div class="col-md-12 col-lg-12">
      <div class="card">
         <div class="card-body">
            <form action="{{ route('add.semester') }}" method="POST">
               @csrf
               <div class="form-group">
                  <h4 class="card-title">Form Tambah Data</h4>
                  <label class="form-label" for="nama_semester">Masukkan Nama semester</label>
                  <input name="nama_semester" class="form-control" id="nama_semester">
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
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Data Semester</h4>
                  </div>
               </div>
               <div class="card-body">
                  {{-- <p>Images in Bootstrap are made responsive with <code>.img-fluid</code>.
                     <code>max-width: 100%;</code> and <code>height: auto;</code> are applied to the image so that it
                     scales with the parent element.</p> --}}
                  <div class="table-responsive">

                     <table id="datatable" class="table table-striped" data-toggle="data-table">
                        <thead>
                           <tr>
                              <th width="5%">No</th>
                              <th>Nama semester</th>
                              <th width="10%">Aksi</th>

                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($semester as $index => $s )
                           <tr>

                              <td>{{ $index+1 }}</td>
                              <td>{{ $s->semester }}</td>
                              <td class="d-flex">
                                 <span>
                                    <form action="deletesemester/{{$s->id }}" method="POST">
                                       @method('DELETE')
                                       @csrf
                                       <button class="btn btn-danger m-md-2" type="submit"><i
                                             class="fas fa-trash-alt">Hapus</i></button>
                                    </form>
                                 </span>
                                 <span>
                                    <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal"
                                       data-bs-target="#exampleModal{{ $s->id }}">
                                       Update
                                    </button>
                                 </span>




                                 <div class="modal fade" id="exampleModal{{ $s->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <h5 class="modal-title" id="exampleModalLabel">Update Data semester</h5>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                             <form action="{{ route('update.semester',['id'=>$s->id]) }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                   <h4 class="card-title">Form Tambah Data</h4>
                                                   <label class="form-label" for="nama_semester">Masukkan Nama
                                                      semester</label>
                                                   <input name="nama_semester" class="form-control" id="nama_semester"
                                                      value="{{ $s->semester }}">
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