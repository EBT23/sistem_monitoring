@extends('layout.base')
@section('content')

<div class="row">
   <div class="col-md-12 col-lg-12">
      <div class="card">
         <div class="card-body">
            <form action="{{ route('add.kabupaten') }}" method="POST">
               @csrf
               <div class="form-group">
                  <h4 class="card-title">Form Tambah Data</h4>
                  <div class="col-6">
                     <label class="form-label" for="id_provinsi">Pilih Provinsi</label>
                     <select name="id_provinsi" id="id_provinsi" class="form-control">
                        <option value="" selected>pilih provinsi</option>
                        @foreach ($provinsi as $p )
                        <option value="{{ $p->id_prov }}">{{ $p->nama_provinsi }}</option>
                        @endforeach
                     </select>

                     <label class="form-label mt-3" for="nama_kabupaten">Masukkan Nama kabupaten</label>
                     <input name="nama_kabupaten" class="form-control" id="nama_kabupaten">
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
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Data Kabupaten</h4>
                  </div>
               </div>
               <div class="card-body">
                  {{-- <p>Images in Bootstrap are made responsive with <code>.img-fluid</code>.
                     <code>max-width: 100%;</code> and <code>height: auto;</code> are applied to the image so that it
                     scales with the parent element.
                  </p> --}}
                  <div class="table-responsive">

                     <table id="datatable" class="table table-striped" data-toggle="data-table">
                        <thead>
                           <tr>
                              <th width="5%">No</th>
                              <th>Nama Provinsi</th>
                              <th>Nama kabupaten</th>
                              <th width="10%">Aksi</th>

                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($kabupaten as $index => $kp )
                           <tr>

                              <td>{{ $index+1 }}</td>
                              <td>{{ $kp->id_provinsi }}</td>
                              <td>{{ $kp->nama_kabupaten }}</td>
                              <td class="d-flex">
                                 <span>
                                    <form action="deletekabupaten/{{$kp->id }}" method="POST">
                                       @method('DELETE')
                                       @csrf
                                       <button class="btn btn-danger m-md-2" type="submit"><i
                                             class="fas fa-trash-alt">Hapus</i></button>
                                    </form>
                                 </span>
                                 <span>
                                    <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal"
                                       data-bs-target="#exampleModal{{ $kp->id }}">
                                       Update
                                    </button>
                                 </span>




                                 <div class="modal fade" id="exampleModal{{ $kp->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <h5 class="modal-title" id="exampleModalLabel">Update Data kabupaten</h5>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                             <form action="{{ route('update.kabupaten',['id'=>$kp->id]) }}"
                                                method="POST">
                                                @csrf
                                                <div class="form-group">
                                                   <h4 class="card-title">Form Tambah Data</h4>
                                                   <label class="form-label text-black" for="id_provinsi">Pilih
                                                      Provinsi</label>
                                                   <select name="id_provinsi" id="id_provinsi" class="form-control">
                                                      <option value="" selected>pilih provinsi</option>
                                                      @foreach ($provinsi as $p )
                                                      <option @if($p->id_prov == $kp->id_provinsi) selected @endif
                                                         value="{{ $p->id_prov }}" >{{ $p->nama_provinsi }}</option>
                                                      @endforeach
                                                   </select>

                                                   <label class="form-label mt-3 text-black"
                                                      for="nama_kabupaten">Masukkan Nama kabupaten</label>
                                                   <input name="nama_kabupaten" class="form-control" id="nama_kabupaten"
                                                      value="{{ $kp->nama_kabupaten }}">
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