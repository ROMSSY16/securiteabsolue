@extends('layouts.app')
@section('content')

<!-- START homemainclassicslider REVOLUTION SLIDER 6.1.0 -->
@include('partials.pagetitle')
<!-- END REVOLUTION SLIDER -->

<!--site-main start-->
<div class="site-main">
    <div class="cmt-row sidebar cmt-sidebar-right clearfix">
       <div class="container">
           <!-- row -->
           <div class="row">
               <div class="col-lg-8 content-area">
                    @foreach($posts as $post)
                    <!-- post -->
                    <article class="post cmt-blog-classic clearfix">
                            <!-- post-featured-wrapper -->
                        <div class="cmt-post-featured-wrapper cmt-featured-wrapper">
                            <div class="cmt-box-post-date">
                                <span class="cmt-entry-date">
                                    <span class="entry-date">{{ $post->created_at->format('d') }}</span>
                                    <span class="entry-month entry-year">{{ $post->created_at->format('M') }}</span>
                                </span>
                            </div>
                            <div class="cmt-post-featured">
                                <img class="img-fluid" src="{{$post->image ? asset($post->image) : '' }}" alt="{{ $post->title }}">
                            </div>
                        </div><!-- post-featured-wrapper end -->
                        <!-- cmt-blog-classic-content -->
                        <div class="cmt-blog-classic-content">
                            <div class="cmt-post-entry-header">
                                <div class="post-meta">
                                    <span class="cmt-meta-line byline"><img src="{{ $post->user->profile_image ?? asset('default_user.png') }}" class="img-fluid" alt="{{ $post->user->name ?? null}}">{{ $post->user->name ?? null}}</span>
                                    <span class="cmt-meta-line tags"><i class="fa fa-tags"></i> 
                                        @foreach($post->tags as $tag)
                                            {{ $tag->name }}
                                        @endforeach
                                        </span>
                                    <span class="cmt-meta-line comment-links"><i class="fa fa-comments-o"></i>{{ $post->comments->count() }} Commentaires</span>
                                </div>
                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="{{route('blog.detail', $post->id)}}">{{ $post->title }} </a></h2>
                                </header>
                            </div>
                            <div class="entry-content">
                                <div class="cmt-box-desc-text">
                                    {!! html_entity_decode($post->content) !!}
                                </div>
                                <div class="cmt-blogbox-desc-footer">
                                    <div class="cmt-blogbox-footer-readmore">
                                        <a class="cmt-btn cmt-btn-size-md cmt-btn-shape-square cmt-btn-style-fill cmt-icon-btn-right cmt-btn-color-black" href="{{route('blog.detail', $post->id)}}">Lire la suite<i class="fa fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- cmt-blog-classic-content end -->
                    </article><!-- post end -->
                    @endforeach
                    <div class="pagination-block">
                        @if ($posts->onFirstPage())
                            <span class="page-numbers current">1</span>
                        @else
                            <a class="page-numbers" href="{{ $posts->url(1) }}">1</a>
                        @endif
                
                        @for ($i = 2; $i <= $posts->lastPage(); $i++)
                            @if ($i == $posts->currentPage())
                                <span class="page-numbers current">{{ $i }}</span>
                            @else
                                <a class="page-numbers" href="{{ $posts->url($i) }}">{{ $i }}</a>
                            @endif
                        @endfor
                
                        @if ($posts->hasMorePages())
                            <a class="next page-numbers" href="{{ $posts->nextPageUrl() }}"><i class="ti ti-arrow-right"></i></a>
                        @endif
                    </div>
               </div>
               <div class="col-lg-4 widget-area sidebar-right">
                <aside class="widget widget-search with-title">
                    <form role="search" method="get" class="search-form" action="#">
                        <label>
                        <span class="screen-reader-text">Rechercher par:</span>
                        <input type="search" class="input-text" placeholder="Recherche …" value="" name="s">
                        </label>
                        <button class="btn" type="submit" value="Search"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                    </form>
                </aside>
                <aside class="widget widget-Categories with-title">
                    <h3 class="widget-title">Categories</h3>
                    <ul>
                     
                     @foreach($categories as $category)
                         <li value="{{ $category->id }}" {{ request()->category == $category->id ? 'selected' : '' }}>{{ $category->name }}</li>
                     @endforeach
                    </ul>
                </aside>
                <aside class="widget widget-recent-post with-title">
                    <h3 class="widget-title">Recents Posts</h3>
                    <ul class="widget-post cmt-recent-post-list">
                     @foreach($recentsposts as $item)
                        <li>
                            <a href="{{route('blog.detail', $item->id)}}"><img class="img-fluid" src="{{$item->image ? asset($item->image) : '' }}" alt="{{$item->title}}"></a>
                            <a href="{{route('blog.detail', $item->id)}}">{{$item->title}}</a>
                            <span class="post-date">{{ $item->created_at->format('M d Y') }}</span>
                        </li>
                     @endforeach
                       
                    </ul>
                </aside>
                
                <aside class="widget tagcloud-widget with-title">
                    <h3 class="widget-title">Tags populaires</h3>
                    <div class="tagcloud">
                     @foreach($tags as $tag)
                        <a href="#" class="tag-cloud-link">{{$tag->name}}</a>
                     @endforeach
                    </div>
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
                                <li>Appelez:++225 07 79 24 02 68 </li>
                                <li><a href="mailto:kyliansoro@gmail.com">kyliansoro@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                </aside>
            </div>
           </div><!-- row end -->
       </div>
   </div>
</div><!--site-main end-->

@endsection