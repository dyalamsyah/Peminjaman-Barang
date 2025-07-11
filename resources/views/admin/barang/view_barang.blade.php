@extends('admin.master')
@section('admin')
    <div class="container-fluid" style="margin-top: 50px">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Barang-Barang</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more
            information about DataTables,</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <h6 class="col m-0 font-weight-bold text-primary">DataTables Example</h6>
                    <div class="co">
                        <a href="{{route('barang.add')}}" class="btn btn-warning btn-icon-split"><span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambah Barang</span></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>Foto</th>
                                <th>Nama Barang</th>
                                <th>Merek</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr class="text-center">
                                <td>
                                    @if($item->fotobarang)
                                        <img src="{{ asset($item->fotobarang) }}" width="70px" alt="{{ $item->namaBarang }}">
                                    @else
                                        <img src="{{ asset('images/no-image.png') }}" width="70px" alt="No Image">
                                    @endif
                                </td>
                                <td>{{$item->namaBarang}}</td>
                                <td>{{$item->merek}}</td>
                                <td>{{$item->jumlahBarang}}</td>
                                <td>
                                    <div class="row">
                                        <a href="{{route('barang.edit',$item->id)}}" class="col btn btn-success"
                                            style="margin: 0 10px">Edit</a>
                                        <a href="{{route('barang.delete',$item->id)}}" class="col btn btn-danger" style="margin: 0 10px" data-confirm-delete="true">Hapus</a>
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
@endsection