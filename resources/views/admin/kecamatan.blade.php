@extends('layout.base')
@section('content')

<div class="row">
   <div class="col-md-12 col-lg-12">

      <div class="card">
         <div class="card-body">
            <form action="{{ route('add.kecamatan') }}" method="POST">
               @csrf
               <div class="form-group">
                  <h4 class="card-title">Form Tambah Data</h4>
                  <div class="col-6">
                     <label class="form-label" for="id_kabupaten">Pilih kabupaten</label>
                     <select name="id_kabupaten" id="id_kabupaten" class="form-control">
                        <option value="" selected>pilih kabupaten</option>
                        @foreach ($kabupaten as $p )
                        <option value="{{ $p->id }}">{{ $p->nama_kabupaten }}</option>
                        @endforeach
                     </select>

                     <label class="form-label mt-3" for="nama_kecamatan">Masukkan Nama kabupaten</label>
                     <input name="nama_kecamatan" class="form-control" id="nama_kecamatan">
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
                     <h4 class="card-title">Data Kecamatan</h4>
                  </div>
               </div>
               <div class="card-body">
                  <div class="table-responsive">

                     <table id="datatable" class="table table-striped" data-toggle="data-table">
                        <thead>
                           <tr>
                              <th width="5%">No</th>
                              <th>Nama kabupaten</th>
                              <th>Nama kabupaten</th>
                              <th width="10%">Aksi</th>

                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($kecamatan as $index => $kc )
                           <tr>

                              <td>{{ $index+1 }}</td>
                              <td>{{ $kc->nama_kabupaten }}</td>
                              <td>{{ $kc->nama_kecamatan }}</td>
                              <td class="d-flex">
                                 <span>
                                    <form action="deletekecamatan/{{$kc->id }}" method="POST">
                                       @method('DELETE')
                                       @csrf
                                       <button class="btn btn-danger m-md-2" type="submit"><i class="fas fa-trash-alt"
                                             onclick="javascript: return confirm('Anda yakin akan menghapus ini? ')">Hapus</i></button>
                                    </form>
                                 </span>
                                 <span>
                                    <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal"
                                       data-bs-target="#exampleModal{{ $kc->id }}">
                                       Update
                                    </button>
                                 </span>




                                 <div class="modal fade" id="exampleModal{{ $kc->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                       <div class="modal-content">
                                          <div class="modal-header">pro
                                             <h5 class="modal-title" id="exampleModalLabel">Update Data kabupaten</h5>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                             <form action="{{ route('update.kecamatan',['id'=>$kc->id]) }}"
                                                method="POST">
                                                @csrf
                                                <div class="form-group">
                                                   <h4 class="card-title">Form Tambah Data</h4>
                                                   <label class="form-label text-black" for="id_kabupaten">Pilih
                                                      kabupaten</label>
                                                   <select name="id_kabupaten" id="id_kabupaten" class="form-control">
                                                      <option value="" selected>pilih kabupaten</option>
                                                      @foreach ($kabupaten as $k )
                                                      <option @if($k->id == $kc->id_kab) selected @endif value="{{
                                                         $k->id }}" >{{ $k->nama_kabupaten }}</option>
                                                      @endforeach
                                                   </select>

                                                   <label class="form-label mt-3 text-black"
                                                      for="nama_kecamatan">Masukkan Nama kabupaten</label>
                                                   <input name="nama_kecamatan" class="form-control" id="nama_kecamatan"
                                                      value="{{ $kc->nama_kecamatan }}">
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