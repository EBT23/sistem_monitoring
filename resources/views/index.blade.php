@extends('layout.base')
@section('content')

<div class="row">
   <div class="col-md-12 col-lg-12">
      <div class="row row-cols-1">
         <div class="overflow-hidden d-slider1 ">
            <ul class="p-0 m-0 mb-2 swiper-wrapper list-inline">
               <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700">
                  <div class="card-body">
                     <div class="progress-widget">
                        <div id="circle-progress-01"
                           class="text-center circle-progress-01 circle-progress circle-progress-primary"
                           data-min-value="0" data-max-value="100" data-value="90" data-type="percent">
                           <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                           </svg>
                        </div>
                        <div class="progress-detail">
                           <p class="mb-2">Total Kabupaten</p>
                           <h4 class="counter">{{ $total_kabupaten }}</h4>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="800">
                  <div class="card-body">
                     <div class="progress-widget">
                        <div id="circle-progress-02"
                           class="text-center circle-progress-01 circle-progress circle-progress-info"
                           data-min-value="0" data-max-value="100" data-value="80" data-type="percent">
                           <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                           </svg>
                        </div>
                        <div class="progress-detail">
                           <p class="mb-2">Total Kecamatan</p>
                           <h4 class="counter">{{ $total_kecamatan }}</h4>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="900">
                  <div class="card-body">
                     <div class="progress-widget">
                        <div id="circle-progress-03"
                           class="text-center circle-progress-01 circle-progress circle-progress-primary"
                           data-min-value="0" data-max-value="100" data-value="70" data-type="percent">
                           <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                           </svg>
                        </div>
                        <div class="progress-detail">
                           <p class="mb-2">Total Komoditi</p>
                           <h4 class="counter">{{ $total_komoditi}}</h4>
                        </div>
                     </div>
                  </div>
               </li>


            </ul>
            <div class="swiper-button swiper-button-next"></div>
            <div class="swiper-button swiper-button-prev"></div>
         </div>
      </div>
   </div>
   <div class="col-md-12 col-lg-12">
      <div class="row">
         <div class="col-md-12">
            <div class="card" data-aos="fade-up" data-aos-delay="800">
               <div class="flex-wrap card-header d-flex justify-content-between align-items-center">
                  <h3>Jumlah Produksi Per Komoditas (ton)</h3>
               </div>
               <div class="card-body">
                  <canvas id="pieChart" width="800" height="400"></canvas>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="col-md-12 col-lg-12">
      <div class="row">
         <div class="col-md-12">
            <div class="card" data-aos="fade-up" data-aos-delay="800">
               <div class="flex-wrap card-header d-flex justify-content-between align-items-center">
                  <h3>Luas Lahan Per Komoditas (ha)</h3>
               </div>
               <div class="card-body">
                  <canvas id="areaChart" width="800" height="400"></canvas>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection