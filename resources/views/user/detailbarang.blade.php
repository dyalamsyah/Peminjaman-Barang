@extends('user.master')
@section('user')
<section class="product_section layout_padding my-5">
    <div class="container">
        <div class="heading_container heading_center mb-5">
            <h2>Detail <span>Barang</span></h2>
        </div>

        <div class="card shadow-lg border-0 rounded-4 p-4">
            <div class="row g-4 align-items-center">
                <!-- Gambar -->
                <div class="col-md-6">
                    <div class="img-box text-center">
                        @if($data->fotobarang && file_exists(public_path($data->fotobarang)))
                            <img src="{{ asset($data->fotobarang) }}" 
                                 alt="{{ $data->namaBarang }}"
                                 class="img-fluid rounded-4 border" 
                                 style="max-height: 400px; object-fit: contain;">
                        @else
                            <div class="no-image-placeholder d-flex align-items-center justify-content-center border rounded-4" 
                                 style="width: 100%; height: 400px; background-color: #f8f9fa;">
                                <div class="text-center text-muted">
                                    <i class="fas fa-image fa-3x mb-2"></i>
                                    <p>No Image</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Detail Barang -->
                <div class="col-md-6">
                    <h2 class="fw-bold mb-3">{{ $data->namaBarang }}</h2>

                    <ul class="list-group list-group-flush mb-3">
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="text-muted">Merek:</span>
                            <strong>{{ $data->merek }}</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="text-muted">Jumlah Tersedia:</span>
                            <strong>{{ $data->jumlahBarang }} Unit</strong>
                        </li>
                    </ul>

                    <h5 class="mb-2 text-muted">Deskripsi Barang</h5>
                    <p class="mb-4">{{ $data->deskripsiBarang }}</p>

                    <a href="{{ route('user.formSewa', $data->id) }}" 
                       class="btn btn-success px-4 py-2 rounded-pill shadow-sm">
                        <i class="fas fa-shopping-cart me-2"></i> Pinjam Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
