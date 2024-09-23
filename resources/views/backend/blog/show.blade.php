@extends('layouts.admin')
@section('content')

<div class="layout-px-spacing">

    <div class="middle-content container-xxl p-0">

        <!-- BREADCRUMB -->
        @include('partials.__breadcrumbs')
        <!-- /BREADCRUMB -->
        <div class="row layout-top-spacing">   
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">
                <div class="text-end mt-4 mb-4">
                    <a href="{{ url()->previous() }}" class="btn btn-primary me-3">
                        Retour
                    </a>
                    <a href="{{ route('admin.blog.edit', $post->id) }}" class="btn btn-success">
                        Modifier le post
                    </a>
                </div>  
                <div class="single-post-content">

                    <div class="featured-image" style="position: relative; background: lightblue url({{asset($post->image)}}) no-repeat fixed center; height: 650px; background-position: center; background-size: cover; background-attachment: inherit; border-radius: 20px; overflow: hidden;">

                        <div class="featured-image-overlay"></div>

                        <div class="post-header">
                            
                            <div class="post-title">
                                <h1 class="mb-0">{{$post->title}}</h1>
                                <p class="category">{{ $post->category->name }}</p> <!-- Affichage de la catégorie -->
                            </div>
                            
                            <div class="post-meta-info d-flex justify-content-between">

                                <div class="media">
                                    <img src="{{ $post->user->profile_image ?? asset('default_user.png') }}" alt="{{$post->title}}">
                                    <div class="media-body">
                                        <h5>{{ $post->user->name ?? null }}</h5>
                                        <p>{{ $post->created_at->format('d M Y') }}</p>
                                    </div>
                                </div>

                                <div class="align-self-center">
                                    <button class="btn btn-success btn-icon btn-share btn-rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>
                                    </button>
                                </div>
                                
                            </div>

                        </div>
                        
                    </div>

                    <div class="post-content">
                        {!! html_entity_decode($post->content) !!}
                    </div>

                    <div class="post-info">
                        
                        <hr>

                        <div class="post-tags mt-5">
                            @foreach($post->tags as $tag)
                                <span class="badge badge-primary mb-2">{{ $tag->name }}</span>
                            @endforeach
                        </div>

                        <div class="post-dynamic-meta mt-5 mb-5">
                            <button class="btn btn-secondary me-4 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                                <span class="btn-text-inner">1.1k</span> <!-- Nombre de likes si disponible -->
                            </button>
                            
                            <div class="avatar--group mb-2">
                                @if($post->likes && $post->likes->count())
                                    @foreach($post->likes as $like)
                                        <div class="avatar avatar-sm m-0">
                                            <img alt="avatar" src="{{ $like->user->profile_image ?? asset('default_user.png') }}" class="rounded-circle">
                                        </div>
                                    @endforeach
                                @else
                                    <p>Pas de likes.</p>
                                @endif
                            </div>
                        </div>
                        
                        <hr>

                        <h2 class="mb-5">Commentaires <span class="comment-count">({{ $post->comments->count() }})</span></h2>

                        <div class="post-comments">

                            @foreach($post->comments as $comment)
                            <div class="media mb-5 pb-5 primary-comment">
                                <div class="avatar me-4">
                                    <img alt="avatar" src="{{ $comment->user->profile_image ?? asset('default_user.png') }}" class="rounded-circle" />
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading mb-1">{{ $comment->user->name ?? null}}</h5>
                                    <div class="meta-info mb-0">{{ $comment->created_at->format('d M Y') }}</div>
                                    <p class="media-text mt-2 mb-0">{{ $comment->content }} </p>
                                </div>
                            </div>
                            @endforeach
                            
                            <!-- Pagination des commentaires si nécessaire -->
                            @if ($comments->hasPages())
                                <div class="post-pagination">
                                    <div class="pagination-no_spacing">
                                        <ul class="pagination">
                                            {{-- Previous Page Link --}}
                                            @if ($comments->onFirstPage())
                                                <li class="disabled">
                                                    <a href="javascript:void(0);" class="prev">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left">
                                                            <polyline points="15 18 9 12 15 6"></polyline>
                                                        </svg>
                                                    </a>
                                                </li>
                                            @else
                                                <li>
                                                    <a href="{{ $comments->previousPageUrl() }}" class="prev">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left">
                                                            <polyline points="15 18 9 12 15 6"></polyline>
                                                        </svg>
                                                    </a>
                                                </li>
                                            @endif

                                            {{-- Pagination Elements --}}
                                            @foreach ($comments->links() as $element)
                                                {{-- "Three Dots" Separator --}}
                                                @if (is_string($element))
                                                    <li class="disabled"><a href="javascript:void(0);">{{ $element }}</a></li>
                                                @endif

                                                {{-- Array Of Links --}}
                                                @if (is_array($element))
                                                    @foreach ($element as $page => $url)
                                                        @if ($page == $comments->currentPage())
                                                            <li><a href="javascript:void(0);" class="active">{{ $page }}</a></li>
                                                        @else
                                                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach

                                            {{-- Next Page Link --}}
                                            @if ($comments->hasMorePages())
                                                <li>
                                                    <a href="{{ $comments->nextPageUrl() }}" class="next">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                                            <polyline points="9 18 15 12 9 6"></polyline>
                                                        </svg>
                                                    </a>
                                                </li>
                                            @else
                                                <li class="disabled">
                                                    <a href="javascript:void(0);" class="next">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                                            <polyline points="9 18 15 12 9 6"></polyline>
                                                        </svg>
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                        
                        <div class="text-end mt-4">
                            <a href="{{ url()->previous() }}" class="btn btn-primary me-3">
                                Retour
                            </a>
                            <a href="{{ route('admin.blog.edit', $post->id) }}" class="btn btn-success">
                                Modifier le post
                            </a>
                        </div>                        
                        
                    </div>
                    
                </div>
            </div>
        </div> 
    </div>

</div>

@endsection
