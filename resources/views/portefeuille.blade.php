@extends('layouts.app')
@section('content')

<!-- START homemainclassicslider REVOLUTION SLIDER 6.1.0 -->
@include('partials.pagetitle')
<!-- END REVOLUTION SLIDER -->


 <!--site-main start-->
 <div class="site-main">
        
    <!--portfolio-section-->
<section class="cmt-row portfolio-section bg-img5 clearfix">
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-lg-7 col-md-8 col-sm-10 m-auto">
                <!-- section-title -->
                <div class="section-title title-style-center_text">
                    <div class="title-header">
                        <h2 class="title">Portefeuille de projets</h2>
                    </div>
                    <div class="title-desc"><p>Quelques images de nos différents travaux réalisés</p></div>
                </div><!-- section-title end -->
            </div>
        </div><!-- row end -->
        <div class="row">
            <div class="col-lg-12">
                <div class="cmt-tabs cmt-tab-style-04 pt-15">
                    <ul class="tabs portfolio-filter">
                        <li class="tab active"><a href="#" data-filter="*">Tous</a></li>
                        @foreach($categories as $category)
                            <li class="tab"><a href="#" data-filter=".{{ Str::slug($category->category) }}">{{ $category->category }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="content-tab">
                    <!-- content-inner -->
                    <div class="row isotope-project">
                        @foreach($portfolios as $portfolio)
                            <div class="cmt-box-col-wrapper col-lg-4 col-md-4 col-sm-6 project_item {{ Str::slug($portfolio->category) }}">
                                <!-- featured-imagebox-portfolio -->
                                <div class="featured-imagebox featured-imagebox-portfolio cmt-bgcolor-darkgrey style1">
                                    <!-- cmt-box-view-overlay -->
                                    <div class="cmt-box-view-overlay">
                                        <!-- featured-thumbnail -->
                                        <div class="featured-thumbnail">
                                            <img class="img-fluid" src="{{$portfolio->image ? asset($portfolio->image) : '' }}" alt="{{$portfolio->title}}">
                                        </div><!-- featured-thumbnail end-->
                                        <div class="featured-content">
                                            <div class="featured-desc">
                                                <p>{{ \Illuminate\Support\Str::limit(strip_tags($portfolio->description), 20, '...') }}</p>
                                            </div>
                                            <div class="featured-title">
                                                <h5><a href="{{route('portfolio_detail', $portfolio->id)}}">{{$portfolio->title}}</a></h5>
                                            </div>
                                            <a class="cmt-btn cmt-btn-size-sm cmt-btn-shape-round cmt-btn-style-fill cmt-btn-color-skincolor" href="{{route('portfolio_detail', $portfolio->id)}}">Plus de détail</a>
                                        </div>
                                        
                                    </div>
                                </div><!-- featured-imagebox-portfolio -->
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div><!-- row end -->
    </div>
</section>
<!--portfolio-section end-->


    {{-- <section class="cmt-row grid-section clearfix">
        <div class="container">
            <div class="row mt_15 mb_15">
                @foreach($portfolios as $portfolio)
                <div class="cmt-box-col-wrapper col-lg-4 col-md-4 col-sm-6">
                    <!-- featured-imagebox -->
                    <div class="featured-imagebox featured-imagebox-portfolio cmt-bgcolor-darkgrey style1">
                        <!-- cmt-box-view-overlay -->
                        <div class="cmt-box-view-overlay">
                            <!-- featured-thumbnail -->
                            <div class="featured-thumbnail">
                                <a href="{{route('portfolio_detail', $portfolio->id)}}">
                                 <img class="img-fluid" src="{{$portfolio->image ? asset($portfolio->image) : '' }}" alt="{{$portfolio->title}}">
                                </a>
                            </div><!-- featured-thumbnail end-->
                            <div class="featured-content">
                                <div class="featured-desc">
                                    <p>{{ \Illuminate\Support\Str::limit(strip_tags($portfolio->description), 20, '...') }}</p>
                                </div>
                                <div class="featured-title">
                                    <h5><a href="{{route('portfolio_detail', $portfolio->id)}}">{{$portfolio->title}}</a></h5>
                                </div>
                                <a class="cmt-btn cmt-btn-size-sm cmt-btn-shape-round cmt-btn-style-fill cmt-btn-color-skincolor" href="{{route('portfolio_detail', $portfolio->id)}}">Plus de détail</a>
                            </div>
                        </div><!-- cmt-box-view-overlay end-->
                    </div><!-- featured-imagebox -->
                </div>
                @endforeach
            </div>
        </div>
    </section> --}}


</div><!--site-main end-->

@endsection