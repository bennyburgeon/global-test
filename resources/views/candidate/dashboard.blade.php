@extends('candidate.layout.layout')
@section('body')
<div class="content-wrapper">
<div class="container-xxl flex-grow-1 container-p-y">
   <div class="row">
      <div class="col-md-12">
         <div class="row">
            <div class="mb-3 col-md-8">
               <div class="row">
                  <div class="mb-3 col-md-4">
                     <div class="card">
                        <div class="card-body">
                           <div class="card-title d-flex align-items-start justify-content-between">
                              <div class="avatar flex-shrink-0">
                                 <img src="{{ asset('assets/img/icons/unicons/cc-primary.png') }}" alt="Credit Card" class="rounded" />
                              </div>
                           </div>
                           <span class="fw-semibold d-block mb-1">Valuedsvsd of sale</span>
                           <h3 class="card-title mb-2">0</h3>
                           <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>0 %</small>
                        </div>
                     </div>
                  </div>
                  <div class="mb-3 col-md-4">
                     <div class="card">
                        <div class="card-body">
                           <div class="card-title d-flex align-items-start justify-content-between">
                              <div class="avatar flex-shrink-0">
                                 <img src="{{ asset('assets/img/icons/unicons/cc-primary.png') }}" alt="Credit Card" class="rounded" />
                              </div>
                           </div>
                           <span class="fw-semibold d-block mb-1">Rewards</span>
                           <h3 class="card-title mb-2">0</h3>
                           <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>0%</small>
                        </div>
                     </div>
                  </div>
                  <div class="mb-3 col-md-4">
                     <div class="card">
                        <div class="card-body">
                           <div class="card-title d-flex align-items-start justify-content-between">
                              <div class="avatar flex-shrink-0">
                                 <img src="{{ asset('assets/img/icons/unicons/cc-primary.png') }}" alt="Credit Card" class="rounded" />
                              </div>
                           </div>
                           <span class="fw-semibold d-block mb-1">Clamed </span>
                           <h3 class="card-title mb-2">0</h3>
                           <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>0%</small>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-12 mb-4">
                     <div class="card">
                        <div class="card-header d-flex justify-content-between">
                           <div>
                              <h5 class="card-title mb-0">Last updates</h5>
                              <small class="text-muted">Commercial networks</small>
                           </div>
                           <div class="dropdown">
                              <button type="button" class="btn dropdown-toggle px-0" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-calendar"></i></button>
                              <ul class="dropdown-menu dropdown-menu-end">
                                 <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Today</a></li>
                                 <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Yesterday</a></li>
                                 <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last 7 Days</a></li>
                                 <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last 30 Days</a></li>
                                 <li>
                                    <hr class="dropdown-divider">
                                 </li>
                                 <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Current Month</a></li>
                                 <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last Month</a></li>
                              </ul>
                           </div>
                        </div>
                        <div class="card-body">
                           <div id="lineAreaChart"></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-4 mb-3">
               <div class="card h-100">
                  <div class="card-header d-flex align-items-center justify-content-between pb-0">
                     <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Customer Reports</h5>
                     </div>
                     <div class="dropdown">
                        <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                        <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-column align-items-center gap-1">
                           <h2 class="mb-2">0</h2>
                        </div>
                        <div id="orderStatisticsChart"></div>
                     </div>
                     <ul class="p-0 m-0">


                        
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@push('css')
@endpush
@push('js')
@endpush
