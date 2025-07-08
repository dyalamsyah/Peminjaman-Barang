@extends('user.master')
@section('user')
    <section class="product_section layout_padding my-5">
        <div class="container">
            <div class="heading_container heading_center mb-5">
                <h2>Transaksi <span>Barang</span></h2>
            </div>

            <div class="card shadow mb-4 border-0 rounded-4">
                <div class="card-header py-3 bg-white border-bottom">
                    <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center align-middle" id="dataTable" width="100%" cellspacing="0">
                            <thead class="table-light">
                                <tr>
                                    <th>Foto</th>
                                    <th>Nama Barang</th>
                                    <th>Merek</th>
                                    <th>Status Peminjaman</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>
                                            @php
                                                $fotoPath = public_path($item->barang->fotobarang);
                                            @endphp
                                        
                                            @if($item->barang->fotobarang && file_exists($fotoPath))
                                                <img src="{{ asset($item->barang->fotobarang) }}" 
                                                     alt="{{ $item->barang->namaBarang }}" 
                                                     width="70px" class="rounded border" />
                                            @else
                                                <div style="width:70px; height:70px; background:#f8f9fa; display:flex; align-items:center; justify-content:center; border:1px dashed #ccc;">
                                                    <i class="fas fa-image text-muted"></i>
                                                </div>
                                            @endif
                                        </td>

                                        <td>{{ $item->barang->namaBarang }}</td>
                                        <td>{{ $item->barang->merek }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2 flex-wrap">
                                                <a href="{{ route('user.pembayaran', $item->id) }}" class="btn btn-success btn-sm px-3">
                                                    Status
                                                </a>
                                                <a data-confirm-delete="true" href="{{ route('user.delettransaksi', $item->id) }}" class="btn btn-danger btn-sm px-3">
                                                    Batalkan
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @if($data->isEmpty())
                            <p class="text-center text-muted mt-3">Belum ada transaksi.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
