@extends('layouts.app')
@section('content')
@include('partials.pagetitle')

<div class="site-main">
    <div class="cmt-row sidebar cmt-sidebar-right clearfix">
       <div class="container">
           <!-- row -->
           <div class="row">
               <div class="col-lg-8 content-area">
                   <!-- post -->
                   <article class="post cmt-blog-single clearfix">
                        <!-- post-featured-wrapper -->
                       <div class="cmt-post-featured-wrapper cmt-featured-wrapper">
                           <div class="cmt-box-post-date">
                               <span class="cmt-entry-date">
                                   <span class="entry-date">{{ $post->created_at->format('d M') }}</span>
                                   <span class="entry-month entry-year">{{ $post->created_at->format('Y') }}</span>
                               </span>
                           </div>
                           <div class="cmt_single_image-wrapper text-lg-left text-center">
                               <img class="img-fluid" src="{{$post->image ? asset($post->image) : '' }}" alt="{{ $post->title }}">
                           </div>
                       </div><!-- post-featured-wrapper end -->
                       <!-- cmt-blog-classic-content -->
                       <div class="cmt-blog-single-content">
                           <div class="cmt-post-entry-header">
                               <div class="post-meta">
                                   <span class="cmt-meta-line byline"><img src="{{ $post->user->profile_image ?? asset('default_user.png') }}" class="img-fluid" alt="">{{ $post->user->name }}</span>
                                   <span class="cmt-meta-line tags"><i class="fa fa-tags"></i> 
                                        @foreach($post->tags as $tag)
                                            {{ $tag->name }}
                                        @endforeach
                                    </span>
                                   <span class="cmt-meta-line comment-links"><i class="fa fa-comments-o"></i>{{ $post->comments->count() }} Commentaires</span>
                               </div>
                           </div>
                           <div class="entry-content">
                               <div class="cmt-box-desc-text">
                                {!! html_entity_decode($post->content) !!}

                                   <div class="cmt-blogbox-desc-footer">
                                       <div class="cmt-social-share-wrapper">
                                           <a class="cmt-btn cmt-btn-size-sm border cmt-btn-shape-round cmt-btn-style-fill cmt-btn-color-grey mr-2" href="#">Partager</a>
                                       </div>
                                       <div class="cmt-social-links-wrapper">
                                           <ul class="social-icons">
                                               <li class="social-facebook">
                                                   <a class="tooltip-top" target="_blank" href="#" data-tooltip="Facebook"><i class="ti ti-facebook" aria-hidden="true"></i></a>
                                               </li>
                                               <li class="social-twitter">
                                                   <a class="tooltip-top" target="_blank" href="#" data-tooltip="Twitter"><i class="ti ti-twitter-alt" aria-hidden="true"></i></a>
                                               </li>
                                               <li class="social-pinterest">
                                                   <a class="tooltip-top" target="_blank" href="#" data-tooltip="Pinterest"><i class="ti ti-pinterest-alt" aria-hidden="true"></i></a>
                                               </li>
                                               <li class="social-instagram">
                                                   <a class="tooltip-top" target="_blank" href="#" data-tooltip="Instagram"><i class="ti ti-instagram" aria-hidden="true"></i></a>
                                               </li>
                                           </ul>
                                       </div>
                                   </div>
                                   <div class="cmt-blog-classic-box-comment clearfix">
                                       <div id="comments" class="comments-area">
                                           <h2 class="comments-title">{{ $post->comments->count() }} Commentaires</h2>
                                           <ol class="comment-list">
                                            @foreach($post->comments as $comment)
                                               <li class="comment"> 
                                                <div class="comment-body">
                                                       <div class="comment-author vcard">
                                                           <img src="{{$post->user->profile_image ?? asset('default_user.png') }}" class="avatar" alt="{{ $comment->user->name ?? null}}">
                                                       </div>
                                                       <div class="comment-box">
                                                           <div class="comment-meta">
                                                               <div class="cmt-comment-owner"><h5>{{ $comment->user->name ?? null}}</h5></div>
                                                               <span>{{ $comment->created_at->format('M d Y') }}</span>
                                                           </div>
                                                           <div class="reply">
                                                               <a class="cmt-btn btn-inline cmt-btn-size-sm cmt-icon-btn-left cmt-btn-color-dark" href="#"><i class="fa fa-reply"></i>Repondre</a>
                                                           </div>
                                                           <div class="author-content-wrap">
                                                               <p>{{ $comment->content }}</p>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </li>
                                            @endforeach
                                               
                                           </ol>
                                           <div class="comment-respond">
                                               <h3 class="comment-reply-title">Laisser un commentaire</h3>
                                               <form action="#" method="post" novalidate="novalidate" id="commentform" class="comment-form">
                                                   <p class="comment-notes">Votre adresse électronique ne sera pas publiée. </p>
                                                   <p class="comment-form-comment">
                                                       <textarea id="comment" placeholder="Commentaire" name="comment" cols="45" rows="4" aria-required="true"></textarea>
                                                   </p>
                                                   <p class="comment-form-author">
                                                       <input id="author" placeholder="Nom" name="author" type="text" value="" size="30" aria-required="true">
                                                   </p>
                                                   <p class="comment-form-email">
                                                       <input id="email" placeholder="Email" name="email" type="text" value="" size="30" aria-required="true">
                                                   </p>
                                                   <p class="comment-form-url">
                                                       <input id="url" placeholder="Site web" name="url" type="text" value="" size="30">
                                                   </p>
                                                   <p class="comment-form-cookies-consent">
                                                       <input id="comment-cookies-consent" name="comment-cookies-consent" type="checkbox" value="yes">
                                                       <label for="comment-cookies-consent" class="ml-1">Enregistrer mon nom, mon adresse électronique et mon site web dans ce navigateur pour la prochaine fois que je ferai un commentaire.</label>
                                                   </p>
                                                   <p class="form-submit mt-30 mb-0 res-991-mt-15">
                                                       <button class="submit cmt-btn cmt-btn-size-md cmt-btn-shape-square cmt-btn-style-border cmt-btn-color-black" type="submit">SOUMETTRE</button>
                                                   </p>
                                               </form>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div><!-- cmt-blog-classic-content end -->
                   </article><!-- post end -->
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
</div>

@endsection