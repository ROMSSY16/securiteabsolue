@extends('layouts.app')
@section('content')

<!-- START homemainclassicslider REVOLUTION SLIDER 6.1.0 -->
@include('partials.pagetitle')
<!-- END REVOLUTION SLIDER -->

<!--site-main start-->
<div class="site-main">
        
    <!-- project-single-section -->
    <section class="cmt-row project-single-section clearfix">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="cmt-pf-single-content-wrapper-innerbox cmt-pf-view-top-image">
                        <div class="cmt-pf-single-content-wrapper">
                            <!-- cmt_single_image-wrapper -->
                            <div class="cmt_single_image-wrapper">
                                <img class="img-fluid" src="{{asset($portfolio->image)}}" alt="{{$portfolio->title}}">
                            </div><!-- cmt_single_image-wrapper end -->
                            <div class="cmt-pf-single-detail-box cmt-bgcolor-darkgrey cmt-textcolor-white">
                                <h2 class="cmt-pf-detailbox-title">Info Projet</h2>
                                <ul class="cmt-pf-detailbox-list">
                                    <li>
                                        <div class="cmt-pf-data-title">
                                            <i class="ti ti-notepad cmt-textcolor-skincolor"></i>Titre :
                                        </div>
                                        <div class="cmt-pf-data-details">{{$portfolio->title}}</div>
                                    </li>
                                    
                                    <li>
                                        <div class="cmt-pf-data-title">
                                            <i class="ti ti-panel cmt-textcolor-skincolor"></i>Categorie :
                                        </div>
                                        <div class="cmt-pf-data-details">{{$portfolio->category}}</div>
                                    </li>
                                    <li>
                                        <div class="cmt-pf-data-title">
                                            <i class="ti ti-bookmark cmt-textcolor-skincolor"></i>Date :
                                        </div>
                                        <div class="cmt-pf-data-details">{{ $portfolio->created_at->format('d M Y') }}</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="cmt-pf-single-content-area mb_15">
                            {!! html_entity_decode($portfolio->description) !!}                               
                        </div>
                        <div class="cmt-pf-single-related-wrapper mb_15 mt-3">
                            <h2>Projets associés</h2>
                            <div class="row">
                                @foreach($projets as $portfolio)                                    
                                <div class="cmt-box-col-wrapper col-lg-4 col-md-4 col-sm-6">
                                    <!-- featured-imagebox -->
                                    <div class="featured-imagebox featured-imagebox-portfolio style3">
                                        <!-- cmt-box-view-overlay -->
                                        <div class="cmt-box-view-overlay">
                                            <!-- featured-thumbnail -->
                                            <div class="featured-thumbnail">
                                                <a href="#"> <img class="img-fluid" src="{{asset($portfolio->image)}}" alt="{{$portfolio->title}}"></a>
                                            </div><!-- featured-thumbnail end-->
                                            <div class="cmt-media-link">
                                                <a class="cmt_prettyphoto cmt_image" title="{{$portfolio->title}}" href="{{asset($portfolio->image)}}">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                                <a href="temperature-controlled.html" class="cmt_pf_link"><i class="fa fa-link"></i></a>
                                            </div>
                                        </div><!-- cmt-box-view-overlay end-->
                                    </div><!-- featured-imagebox -->
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- project-single-section end -->

</div><!--site-main end-->

@endsection