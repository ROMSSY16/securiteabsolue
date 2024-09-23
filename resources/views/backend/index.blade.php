@extends('layouts.admin')

@push('css')
<link href="{{ asset('backend/src/plugins/src/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('backend/src/assets/css/light/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('backend/src/assets/css/dark/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('content')
<div class="layout-px-spacing">

    <div class="middle-content container-xxl p-0">

        <!--  BEGIN BREADCRUMBS  -->
        @include('partials.__breadcrumbs')
        <!--  END BREADCRUMBS  -->
        
        <div class="row layout-top-spacing">

            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-six">
                    <div class="widget-heading">
                        <h6 class="">Visiteurs site web</h6>
                        
                    </div>
                    <div class="w-chart">
                        <div class="w-chart-section">
                            <div class="w-detail">
                                <p class="w-title">Total Visiteurs</p>
                                <p class="w-stats">{{ $totalVisitors }}</p>
                            </div>
                            <div class="w-chart-render-one">
                                <div id="total-users"></div>
                            </div>
                        </div>

                        <div class="w-chart-section">
                            <div class="w-detail">
                                <p class="w-title">Visiteurs du jour</p>
                                <p class="w-stats">{{ $dailyVisitors }}</p>
                            </div>
                            <div class="w-chart-render-one">
                                <div id="new-visits"></div>
                            </div>
                        </div>
                        <br/>
                        <br/>
                    </div>
                </div>
                
            </div>
            
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing ">
                <div class="widget widget-card-four">
                    <div class="widget-content">
                        <div class="w-header">
                            <div class="w-info">
                                <h6 class="value">Demandes de devis</h6>
                            </div>
                            
                        </div>

                        <div class="w-content">

                            <div class="w-info">
                                <p class="value">{{ $totalDevis }}</p>
                            </div>
                            <br/><br/><br/>
                        </div>
                    </div>
                </div>
            </div>  

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-five">
                    <div class="widget-content">
                        <div class="account-box">

                            <div class="info-box">
                                <div class="icon">
                                    <span>
                                        <img src="{{ asset('backend/src/assets/img/user_group.png') }}" alt="users-bag">
                                    </span>
                                </div>

                                <div class="balance-info">
                                    <h6>Total utilisateurs</h6>
                                    <p>{{ $totalUsers }}</p>
                                </div>
                                
                            </div>
                            <br/><br/><br/>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-three">
                    <div class="widget-heading">
                        <div class="">
                            <h5 class="">Statistique des Visiteurs</h5>
                        </div>
                        <div class="task-action">
                            <div class="dropdown ">
                                <a class="dropdown-toggle" href="#" role="button" id="uniqueVisitors" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                </a>
                                <div class="dropdown-menu left" aria-labelledby="uniqueVisitors">
                                    <a class="dropdown-item" href="javascript:void(0);">View</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Update</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Download</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="widget-content">
                        <div id="uniqueVisits"></div>
                    </div>
                </div>
            </div>
          
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-activity-five">

                    <div class="widget-heading">
                        <h5 class="">Activity Log</h5>

                        <div class="task-action">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="activitylog" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                </a>

                                <div class="dropdown-menu left" aria-labelledby="activitylog" style="will-change: transform;">
                                    <a class="dropdown-item" href="javascript:void(0);">View All</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Mark as Read</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="widget-content">

                        <div class="w-shadow-top"></div>

                        <div class="mt-container mx-auto">
                            <div class="timeline-line">
                                
                               
                                 
                            </div>                                    
                        </div>

                        <div class="w-shadow-bottom"></div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>


<script>
        document.addEventListener('DOMContentLoaded', function () {
            var options = {
                chart: {
                    type: 'line',
                    height: 350
                },
                series: [{
                    name: 'Visits',
                    data: @json($counts)
                }],
                xaxis: {
                    categories: @json($dates),
                    title: {
                        text: 'Dates'
                    }
                },
                yaxis: {
                    title: {
                        text: 'Number of Visits'
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#uniqueVisits"), options);
            chart.render();
        });
    </script>
@endsection

@push('js')

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@endpush
