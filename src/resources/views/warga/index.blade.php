@extends('layout.template')
@section('konten')

       <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <form class="d-flex" action="{{url('warga')}}" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Cari</button>
                  </form>
                </div>
                
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                  <a href='{{url('warga/create')}}' class="btn btn-primary">+ Tambah Data</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-2">Nama</th>
                            <th class="col-md-2">Alamat</th>
                            <th class="col-md-2">No HandPhone</th>
                            <th class="col-md-2">Tanggal Lahir</th>
                            <th class="col-md-1">Status</th>
                            <th class="col-md-1">Agama</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = $data->firstItem()?>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->alamat}}</td>
                            <td>{{$item->no_hp}}</td>
                            <td>{{$item->tanggal_lahir}}</td>
                            <td>{{$item->status}}</td>
                            <td>{{$item->agama}}</td>
                            <td>
                                <a href='{{url('warga/'.$item->nama. '/edit')}}' class="btn btn-warning btn-sm">Edit</a>
                                <form onsubmit= "return confirm('Apakah yakin ingin mengapus data?') "class ='d-inline' action = "{{url('warga/'. $item->nama)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm">DEL</button>
                                </form>
                            </td>
                        </tr>
                        <?php $i++ ?>
                        @endforeach
                    </tbody>
                </table>
               {{$data->withQueryString()->links()}}
          </div>
          <!-- AKHIR DATA -->
@endsection          
    