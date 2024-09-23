@extends('layouts.app')
@section('content')

<!-- START homemainclassicslider REVOLUTION SLIDER 6.1.0 -->
@include('partials.pagetitle')
<!-- END REVOLUTION SLIDER -->
<br/><br/><br/><br/>
<div class="site-main mt-3">
    <section class="cmt-row broken-section bg-layer-equal-height clearfix">
        <div class="container">
            <div class="row no-gutters mt_115 res-991-mt_30">
                <div class="col-lg-6">
                    <div class="col-bg-img-two cmt-bg cmt-col-bgimage-yes cmt-bgcolor-skincolor index-spacing-5">
                        
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class=" cmt-bg cmt-col-bgcolor-yes cmt-bgcolor-white box-shadow index-spacing-5">
                        <!-- section title -->
                        <div class="section-title with-desc clearfix">
                            <div class="title-header">
                                <h2 class="title">DEMANDER UN DEVIS</h2>
                            </div>
                            <p class="title-desc">Ce formulaire permet de recueillir vos informations afin de constituer un dévis sur mésure.</p>
                        </div>
                        <!-- section title end -->
                        <form id="res_quote-form_2" class="res_quote-form wrap-form clearfix" method="post" action="{{route('store.devis')}}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <label>
                                    <span class="text-input">
                                        <i class="ti-user"></i>
                                        <input name="fullname" type="text" class="form-control with-border bg-white" placeholder="Nom & prénom(s)" required="required">
                                    </span>
                                    </label>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <label>
                                    <span class="text-input">
                                        <i class="ti-mobile"></i>
                                        <input name="phone" type="text" class="form-control with-border bg-white" placeholder="N° téléphone" required="required">
                                    </span>
                                    </label>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <label>
                                    <span class="text-input">
                                        <i class="ti-email"></i>
                                        <input name="email" type="text" placeholder="Adresse E-mail" required="required" class="form-control with-border bg-white">
                                    </span>
                                    </label>
                                </div>                                    
                                <div class="col-sm-6 col-md-6">
                                    <label>
                                        <span class="text-input">
                                            <i class="fa fa-check-circle-o"></i>
                                            <select name="service">
                                            <option value="">Selectionner votre service</option>
                                            @foreach($services as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                            </select>
                                        </span>
                                    </label>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <label>
                                    <span class="text-input">
                                        <i class="ti-comments"></i>
                                        <textarea name="comment" rows="5" placeholder="Informations complémentaires" required="required"></textarea>
                                    </span>
                                    </label>
                                </div>
                                <div class="col-sm-8 col-md-8">
                                    <div class="mt-10">
                                        <button type="submit" class="cmt-btn cmt-btn-size-md cmt-btn-shape-square cmt-btn-style-fill cmt-icon-btn-right cmt-btn-color-skincolor text-center">Envoyer le dévis <i class="fa fa-arrow-circle-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection