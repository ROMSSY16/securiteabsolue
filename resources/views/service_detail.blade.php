@extends('layouts.app')
@section('content')

@include('partials.pagetitle')

<div class="site-main">
    <!-- sidebar -->
    <div class="cmt-row sidebar cmt-sidebar-left cmt-bgcolor-white clearfix">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-lg-4 widget-area sidebar-left">
                    <aside class="widget widget-nav-menu">
                        <ul class="widget-menu">
                            @foreach ($allservices as $serviceItem)
                                <li class="{{ request()->routeIs('service.detail') && request()->route('id') == $serviceItem->id ? 'active' : '' }}">
                                    <a href="{{ route('service.detail', $serviceItem->id) }}">{{ $serviceItem->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </aside>                    
                    <aside class="widget widget-cta-banner p-0">
                       <div class="cmt-col-bgcolor-yes cmt-bgcolor-darkgrey inner_pg-col_bg-img7 cmt-col-bgimage-yes cmt-bg pt-200 pl-30 pr-30 pb-30">
                            <div class="cmt-col-wrapper-bg-layer cmt-bg-layer">
                                <div class="cmt-col-wrapper-bg-layer-inner"></div>
                            </div>
                            <div class="layer-content text-center">
                                <h4>Vous avez des questions ? Appelez-nous dès aujourd'hui</h4>
                                <div class="sep_holder">
                                    <div class="sep_line width-100 mt-20 mb-20 res-767-mt-0"></div>
                                </div>
                                <ul class="cmt-textcolor-white">
                                    <li>Appeler:+225 07 79 24 02 68 </li>
                                    <li><a href="mailto:kyliansoro@gmail.com">kyliansoro@gmail.com</a></li>
                                </ul>
                            </div>
                        </div>
                    </aside>
                    <aside class="widget widget-download with-title">
                        <h3 class="widget-title">Documents associés</h3>
                        <ul class="download">
                            <li><a href="#"><i class="fa fa-file-pdf-o cmt-bgcolor-darkgrey"></i>Download.pdf</a></li>
                            <li><a href="#"><i class="fa fa-file-pdf-o cmt-bgcolor-darkgrey"></i>Download.txt</a></li>
                        </ul>
                    </aside>
                    <aside class="widget widget-contact with-title">
                        <h3 class="widget-title">Prenez contact avec nous</h3>      
                        <ul class="widget-contact-wrapper">
                            <li><i class="fa fa-map-marker"></i>Cocody Riviera Palmeraie, LOT 1115 ILOT 66 non loin de la Pharmacie Marte Robin, Cocody, Abidjan, Côte d'Ivoire</li>
                            <li><i class="fa fa-envelope-o"></i><a href="mailto:kyliansoro@gmail.com" target="_blank">kyliansoro@gmail.com</a></li>
                            <li><i class="fa fa-phone"></i>(+225) 0502409482</li>
                            <li><i class="ti ti-alarm-clock"></i>Lun au Sam - 8:00 à 17h:30 (Dimanche fermé)</li>
                        </ul>
                    </aside>
                </div>
                <div class="col-lg-8 content-area">
                    <article class="cmt-service-single-content-area">
                        <!-- service-featured-wrapper -->
                        <div class="cmt-service-featured-wrapper cmt-featured-wrapper">
                            <div class="cmt_single_image-wrapper mb-35">
                                <img class="img-fluid" src="{{ $service->image ? asset($service->image) : '' }}" alt="{{ $service->name }}">
                            </div>
                        </div><!-- service-featured-wrapper end -->
                        <!-- cmt-service-classic-content -->
                        <div class="cmt-service-classic-content">
                            {!! htmlspecialchars_decode($service->description) !!}
                        </div><!-- cmt-service-classic-content end -->
                    </article>                    
                </div>
            </div><!-- row end -->
        </div>
    </div>
    <!-- sidebar end -->
</div>
@endsection