@extends('user.master')
@section('user')
<section class="product_section layout_padding">
   <div class="container">
      <div class="heading_container heading_center mt-5">
         <h2>
            Barang <span>Yang Tersedia</span>
         </h2>
      </div>
      <div class="row">
         @foreach ($data as $item)
         <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="box">
               <div class="option_container">
                  <div class="options">
                     <a href="{{ route('user.formSewa', $item->id) }}" class="option1">
                        Pinjam
                     </a>
                     <a href="{{ route('user.detailbarang', $item->id) }}" class="option2">
                        Detail
                     </a>
                  </div>
               </div>
               <div class="img-box">
                  @if($item->fotobarang && file_exists(public_path($item->fotobarang)))
                     <img src="{{ asset($item->fotobarang) }}" alt="{{ $item->namaBarang }}">
                  @else
                     <div class="no-image-placeholder d-flex align-items-center justify-content-center" 
                          style="width: 100%; height: 200px; background-color: #f8f9fa; border: 2px dashed #dee2e6;">
                        <div class="text-center text-muted">
                           <i class="fas fa-image fa-3x mb-2"></i>
                           <p>No Image</p>
                        </div>
                     </div>
                  @endif
               </div>
               <div class="detail-box">
                  <h5>
                     {{ $item->namaBarang }}
                  </h5>
               </div>
            </div>
         </div>
         @endforeach
      </div>
      <div class="btn-box m-5">
         <a href="">
         Lihat Semua Produk
         </a>
      </div>
   </div>
</section>
@endsection
