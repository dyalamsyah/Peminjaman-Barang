@extends('admin.master')
@section('admin')
    <div class="container-fluid" style="margin-top: 50px">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Cek Pembayaran</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.</p>

        <!-- DataTables Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="col m-0 font-weight-bold text-primary">Cek Pembayaran</h6>
            </div>
            <div class="card-body">
                <form id="validate" method="POST" action="{{ route('admin.konfirmasipembayaran', $data->id) }}"
                      class="row g-3" enctype="multipart/form-data">
                    @csrf

                    <div class="col-md-12">
                        <center>
                            @php
                                $filePath = public_path('storage/' . $data->fototransaksi);
                            @endphp

                            @if (!empty($data->fototransaksi) && file_exists($filePath))
                                <a href="{{ asset('storage/' . $data->fototransaksi) }}" 
                                   download="{{ basename($data->fototransaksi) }}">
                                    <img style="width: 500px; border: 1px solid"
                                         src="{{ asset('storage/' . $data->fototransaksi) }}"
                                         alt="Bukti Pembayaran">
                                </a>
                            @else
                                <p class="text-danger">Gambar bukti pembayaran tidak ditemukan.</p>
                                {{-- Debug output (hapus saat produksi) --}}
                                <small class="text-muted">
                                    Path: {{ $data->fototransaksi ?? 'Kosong' }}<br>
                                    Lokasi file: {{ $filePath }}<br>
                                    File Exists: {{ file_exists($filePath) ? 'Ya' : 'Tidak' }}
                                </small>
                            @endif
                        </center>
                    </div>

                    <div class="col-md-6" hidden>
                        <input type="text" name="status_transaksi" value="1" class="form-control"
                               id="status_transaksi" />
                    </div>

                    @if ($data->status_transaksi == 0)
                        <div class="col-12 mt-4">
                            <button style="width: 100%" type="submit" class="btn btn-warning">
                                Konfirmasi Pembayaran
                            </button>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
