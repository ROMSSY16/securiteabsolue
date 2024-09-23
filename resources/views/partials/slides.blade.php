<rs-module-wrap id="rev_slider_2_1_wrapper" data-source="gallery" style="background:transparent;padding:0;margin:0 auto;">
    <rs-module id="rev_slider_2_1" style="" data-version="6.3.3">
        <rs-slides>
            @php
                $phrase = $apparence->slide1_titre;
                $parts = explode(' ', $phrase);

                // Vérification de l'existence des différentes parties
                $part1 = (isset($parts[0]) ? $parts[0] : '') . ' ' . (isset($parts[1]) ? $parts[1] : '') . ' ' . (isset($parts[2]) ? $parts[2] : '') . ' ' . (isset($parts[3]) ? $parts[3] : ''); // Un travail de qualité
                $part2 = (isset($parts[4]) ? $parts[4] : '') . ' ' . (isset($parts[5]) ? $parts[5] : '') . ' ' . (isset($parts[6]) ? $parts[6] : ''); // avec un tarif
                $part3 = isset($parts[7]) ? $parts[7] : ''; // Compétitive
            @endphp

            <rs-slide data-key="rs-2" data-title="Slide" data-thumb="{{ asset($apparence->slide1_image) }}" data-anim="ei:d;eo:d;s:1000;r:0;t:fade;sl:0;">

                <img src="{{ asset($apparence->slide1_image) }}" title="mainslider-img01" width="1920" height="930" class="rev-slidebg" data-no-retina>
                
                <rs-layer
                    id="slider-2-slide-2-layer-1" 
                    data-type="text"
                    data-rsp_ch="on"
                    data-xy="x:l,l,c,c;xo:50px,50px,0,0;yo:242px,242px,93px,65px;"
                    data-text="w:normal;s:64,64,50,40;l:75,75,55,55;fw:600;"
                    data-dim="minh:0px,0px,none,none;"
                    data-frame_0="x:50,50,31,19;"
                    data-frame_1="st:220;sp:900;sR:220;"
                    data-frame_999="o:0;st:w;sR:7880;"
                    style="z-index:9;font-family:Jost;text-transform:uppercase;"
                >{{$part1}}
                </rs-layer>

                <rs-layer
                    id="slider-2-slide-2-layer-2" 
                    data-type="text"
                    data-rsp_ch="on"
                    data-xy="x:l,l,c,c;xo:50px,50px,0,0;yo:308px,308px,151px,113px;"
                    data-text="w:normal;s:64,64,50,40;l:75,75,55,55;fw:600;"
                    data-dim="minh:0px,0px,none,none;"
                    data-frame_0="x:50,50,31,19;"
                    data-frame_1="st:390;sp:900;sR:390;"
                    data-frame_999="o:0;st:w;sR:7710;"
                    style="z-index:10;font-family:Jost;text-transform:uppercase;"
                >{{ $part2 }}
                </rs-layer>
                @if($apparence->slide1_button_title)
                <a
                    id="slider-2-slide-2-layer-4" 
                    class="rs-layer cmt-btn cmt-btn-size-md cmt-btn-shape-square cmt-btn-style-fill cmt-icon-btn-right cmt-btn-color-white"
                    href="{{ $apparence->slide1_button_link }}" target="_self" rel="nofollow"
                    data-type="text"
                    data-color="#ff4c01"
                    data-rsp_ch="on"
                    data-xy="x:l,l,c,c;xo:50px,50px,0,0;yo:561px,561px,295px,235px;"
                    data-text="w:normal;s:14,14,15,14;l:15,15,15,14;fw:500;"
                    data-padding="t:15,15,15,12;r:35,35,35,30;b:15,15,15,12;l:35,35,35,30;"
                    data-frame_0="y:100%;"
                    data-frame_1="e:power4.inOut;st:910;sp:500;sR:910;"
                    data-frame_999="o:0;st:w;sR:7590;"
                    data-frame_hover="c:#fff;bor:0px,0px,0px,0px;bos:none;"
                    style="z-index:13;background-color:#ffffff;font-family:Jost;"
                >{{$apparence->slide1_button_title}}<i class="fa fa-arrow-circle-right"></i> 
                </a>
                @endif
                <rs-layer
                    id="slider-2-slide-2-layer-15" 
                    data-type="text"
                    data-rsp_ch="on"
                    data-xy="x:l,l,c,c;xo:50px,50px,0,0;yo:378px,378px,209px,164px;"
                    data-text="w:normal;s:64,64,50,40;l:75,75,55,55;fw:600;"
                    data-dim="minh:0px,0px,none,none;"
                    data-frame_0="x:50,50,31,19;"
                    data-frame_1="st:520;sp:900;sR:520;"
                    data-frame_999="o:0;st:w;sR:7580;"
                    style="z-index:11;font-family:Jost;text-transform:uppercase;"
                >{{$part3}}
                </rs-layer>

                <rs-layer
                    id="slider-2-slide-2-layer-16" 
                    data-type="text"
                    data-rsp_ch="on"
                    data-xy="x:l,l,c,c;xo:50px,50px,682px,-570px;yo:471px,471px,91px,122px;"
                    data-text="w:normal;s:18,18,14,14;l:26,26,24,24;"
                    data-dim="minh:0px,0px,none,none;"
                    data-vbility="t,t,f,f"
                    data-frame_0="x:50,50,31,19;"
                    data-frame_1="st:800;sp:500;sR:800;"
                    data-frame_999="o:0;st:w;sR:7700;"
                    style="z-index:12;font-family:Jost;"
                >{{\Illuminate\Support\Str::limit(strip_tags($apparence->slide1_description), 150, '...') }}
                </rs-layer>

                <rs-layer
                    id="slider-2-slide-2-layer-17" 
                    class="slider-border-font"
                    data-type="text"
                    data-color="rgba(255, 255, 255, 0.19)"
                    data-rsp_ch="on"
                    data-xy="x:l,l,c,c;xo:50px,50px,-517px,0;yo:156px,156px,112px,65px;"
                    data-text="w:normal;s:100,100,45,40;l:140,140,55,55;ls:6px,6px,3px,1px;"
                    data-dim="minh:0px,0px,none,none;"
                    data-vbility="t,t,f,f"
                    data-frame_0="sX:0.9;sY:0.9;"
                    data-frame_1="e:power2.inOut;st:130;sp:500;sR:130;"
                    data-frame_999="o:0;st:w;sR:8370;"
                    style="z-index:8;font-family:Open Sans;text-transform:uppercase;"
                >{{ $apparence->section1_title }} 
                </rs-layer>
            </rs-slide>

            @php
                $phrase = $apparence->slide2_titre;
                $parts = explode(' ', $phrase);

                $part1 = (isset($parts[0]) ? $parts[0] : '') . ' ' . (isset($parts[1]) ? $parts[1] : '') . ' ' . (isset($parts[2]) ? $parts[2] : '');
                $part2 =(isset($parts[3]) ? $parts[3] : '') . ' ' . (isset($parts[4]) ? $parts[4] : '') . ' ' . (isset($parts[5]) ? $parts[5] : ''); 
                $part3 = (isset($parts[6]) ? $parts[6] : ''). ' ' . (isset($parts[7]) ? $parts[7] : ''). ' ' . (isset($parts[8]) ? $parts[8] : ''); 
            @endphp
            <!-- Deuxième slide -->
            <rs-slide data-key="rs-4" data-title="Slide" data-thumb="{{ asset($apparence->slide2_image) }}" data-anim="ei:d;eo:d;s:1000;r:0;t:fade;sl:0;">

                <img src="{{ asset($apparence->slide2_image) }}" title="mainslider-img02" width="1920" height="930" class="rev-slidebg" data-no-retina>
                
                <rs-layer
                    id="slider-2-slide-4-layer-1" 
                    data-type="text"
                    data-rsp_ch="on"
                    data-xy="x:l,l,c,c;xo:50px,50px,0,0;yo:242px,242px,93px,65px;"
                    data-text="w:normal;s:64,64,50,40;l:75,75,55,55;fw:600;"
                    data-dim="minh:0px,0px,none,none;"
                    data-frame_0="x:50,50,31,19;"
                    data-frame_1="st:220;sp:900;sR:220;"
                    data-frame_999="o:0;st:w;sR:7880;"
                    style="z-index:9;font-family:Jost;text-transform:uppercase;"
                >{{$part1}}
                </rs-layer>

                <rs-layer
                    id="slider-2-slide-4-layer-2" 
                    data-type="text"
                    data-rsp_ch="on"
                    data-xy="x:l,l,c,c;xo:50px,50px,0,0;yo:308px,308px,151px,113px;"
                    data-text="w:normal;s:64,64,50,40;l:75,75,55,55;fw:600;"
                    data-dim="minh:0px,0px,none,none;"
                    data-frame_0="x:50,50,31,19;"
                    data-frame_1="st:390;sp:900;sR:390;"
                    data-frame_999="o:0;st:w;sR:7710;"
                    style="z-index:10;font-family:Jost;text-transform:uppercase;"
                >{{$part2}}
                </rs-layer>
                @if($apparence->slide2_button_title)
                <a
                    id="slider-2-slide-4-layer-4" 
                    class="rs-layer cmt-btn cmt-btn-size-md cmt-btn-shape-square cmt-btn-style-fill cmt-icon-btn-right cmt-btn-color-white"
                    href="{{$apparence->slide2_button_link ?? null}}" target="_self" rel="nofollow"
                    data-type="text"
                    data-color="#ff4c01"
                    data-rsp_ch="on"
                    data-xy="x:l,l,c,c;xo:50px,50px,0,0;yo:561px,561px,295px,235px;"
                    data-text="w:normal;s:14,14,15,14;l:15,15,15,14;fw:500;"
                    data-padding="t:15,15,15,12;r:35,35,35,30;b:15,15,15,12;l:35,35,35,30;"
                    data-frame_0="y:100%;"
                    data-frame_1="e:power4.inOut;st:910;sp:500;sR:910;"
                    data-frame_999="o:0;st:w;sR:7590;"
                    data-frame_hover="c:#fff;bor:0px,0px,0px,0px;bos:none;"
                    style="z-index:13;background-color:#ffffff;font-family:Jost;"
                >{{$apparence->slide2_button_title ?? null}}<i class="fa fa-arrow-circle-right"></i> 
                </a>
                @endif
                <rs-layer
                    id="slider-2-slide-4-layer-15" 
                    data-type="text"
                    data-rsp_ch="on"
                    data-xy="x:l,l,c,c;xo:50px,50px,0,0;yo:378px,378px,209px,164px;"
                    data-text="w:normal;s:64,64,50,40;l:75,75,55,55;fw:600;"
                    data-dim="minh:0px,0px,none,none;"
                    data-frame_0="x:50,50,31,19;"
                    data-frame_1="st:520;sp:900;sR:520;"
                    data-frame_999="o:0;st:w;sR:7580;"
                    style="z-index:11;font-family:Jost;text-transform:uppercase;"
                >{{$part3}}
                </rs-layer>

                <rs-layer
                    id="slider-2-slide-4-layer-16" 
                    data-type="text"
                    data-rsp_ch="on"
                    data-xy="x:l,l,c,c;xo:50px,50px,682px,-570px;yo:471px,471px,91px,122px;"
                    data-text="w:normal;s:18,18,14,14;l:26,26,24,24;"
                    data-dim="minh:0px,0px,none,none;"
                    data-vbility="t,t,f,f"
                    data-frame_0="x:50,50,31,19;"
                    data-frame_1="st:800;sp:500;sR:800;"
                    data-frame_999="o:0;st:w;sR:7700;"
                    style="z-index:12;font-family:Jost;"
                >{{ \Illuminate\Support\Str::limit(strip_tags($apparence->slide2_description), 100, '...') }}
                </rs-layer>

                <rs-layer
                    id="slider-2-slide-4-layer-17" 
                    class="slider-border-font"
                    data-type="text"
                    data-color="rgba(255, 255, 255, 0.19)"
                    data-rsp_ch="on"
                    data-xy="x:l,l,c,c;xo:50px,50px,-517px,0;yo:156px,156px,112px,65px;"
                    data-text="w:normal;s:100,100,45,40;l:140,140,55,55;ls:6px,6px,3px,1px;"
                    data-dim="minh:0px,0px,none,none;"
                    data-vbility="t,t,f,f"
                    data-frame_0="sX:0.9;sY:0.9;"
                    data-frame_1="e:power2.inOut;st:130;sp:500;sR:130;"
                    data-frame_999="o:0;st:w;sR:8370;"
                    style="z-index:8;font-family:Open Sans;text-transform:uppercase;"
                >{{ $apparence->section2_title }} 
                </rs-layer>
            </rs-slide>

            @php
                $phrase = $apparence->slide3_titre;
                $parts = explode(' ', $phrase);

                $part1 = (isset($parts[0]) ? $parts[0] : '') . ' ' . (isset($parts[1]) ? $parts[1] : '') . ' ' . (isset($parts[2]) ? $parts[2] : '') . ' ' . (isset($parts[3]) ? $parts[3] : ''); 
                $part2 = (isset($parts[4]) ? $parts[4] : '') . ' ' . (isset($parts[5]) ? $parts[5] : '') . ' ' . (isset($parts[6]) ? $parts[6] : ''); 
                $part3 = isset($parts[7]) ? $parts[7] : ''; 
            @endphp
            <rs-slide data-key="rs-5" data-title="Slide" data-thumb="{{ asset($apparence->slide3_image) }}" data-anim="ei:d;eo:d;s:1000;r:0;t:fade;sl:0;">

                <img src="{{ asset($apparence->slide3_image) }}" title="mainslider-img03" width="1920" height="930" class="rev-slidebg" data-no-retina>
            
                <rs-layer
                    id="slider-2-slide-5-layer-1" 
                    data-type="text"
                    data-rsp_ch="on"
                    data-xy="x:l,l,c,c;xo:50px,50px,0,0;yo:242px,242px,93px,65px;"
                    data-text="w:normal;s:64,64,50,40;l:75,75,55,55;fw:600;"
                    data-dim="minh:0px,0px,none,none;"
                    data-frame_0="x:50,50,31,19;"
                    data-frame_1="st:220;sp:900;sR:220;"
                    data-frame_999="o:0;st:w;sR:7880;"
                    style="z-index:9;font-family:Jost;text-transform:uppercase;"
                >{{ $part1 }}
                </rs-layer>
            
                <rs-layer
                    id="slider-2-slide-5-layer-2" 
                    data-type="text"
                    data-rsp_ch="on"
                    data-xy="x:l,l,c,c;xo:50px,50px,0,0;yo:308px,308px,151px,113px;"
                    data-text="w:normal;s:64,64,50,40;l:75,75,55,55;fw:600;"
                    data-dim="minh:0px,0px,none,none;"
                    data-frame_0="x:50,50,31,19;"
                    data-frame_1="st:390;sp:900;sR:390;"
                    data-frame_999="o:0;st:w;sR:7710;"
                    style="z-index:10;font-family:Jost;text-transform:uppercase;"
                >{{ $part2 }}
                </rs-layer>
                @if($apparence->slide3_button_titre)
                <a
                    id="slider-2-slide-5-layer-4" 
                    class="rs-layer cmt-btn cmt-btn-size-md cmt-btn-shape-square cmt-btn-style-fill cmt-icon-btn-right cmt-btn-color-white"
                    href="{{$apparence->slide3_button_link}}" target="_self" rel="nofollow"
                    data-type="text"
                    data-color="#ff4c01"
                    data-rsp_ch="on"
                    data-xy="x:l,l,c,c;xo:50px,50px,0,0;yo:561px,561px,295px,235px;"
                    data-text="w:normal;s:14,14,15,14;l:15,15,15,14;fw:500;"
                    data-padding="t:15,15,15,12;r:35,35,35,30;b:15,15,15,12;l:35,35,35,30;"
                    data-frame_0="y:100%;"
                    data-frame_1="e:power4.inOut;st:910;sp:500;sR:910;"
                    data-frame_999="o:0;st:w;sR:7590;"
                    data-frame_hover="c:#fff;bor:0px,0px,0px,0px;bos:none;"
                    style="z-index:13;background-color:#ffffff;font-family:Jost;"
                >{{$apparence->slide3_button_title ?? null}}<i class="fa fa-arrow-circle-right"></i> 
                </a>
                @endif
                <rs-layer
                    id="slider-2-slide-5-layer-15" 
                    data-type="text"
                    data-rsp_ch="on"
                    data-xy="x:l,l,c,c;xo:50px,50px,0,0;yo:378px,378px,209px,164px;"
                    data-text="w:normal;s:64,64,50,40;l:75,75,55,55;fw:600;"
                    data-dim="minh:0px,0px,none,none;"
                    data-frame_0="x:50,50,31,19;"
                    data-frame_1="st:520;sp:900;sR:520;"
                    data-frame_999="o:0;st:w;sR:7580;"
                    style="z-index:11;font-family:Jost;text-transform:uppercase;"
                >{{ $part3 }}.
                </rs-layer>
            
                <rs-layer
                    id="slider-2-slide-5-layer-16" 
                    data-type="text"
                    data-rsp_ch="on"
                    data-xy="x:l,l,c,c;xo:50px,50px,682px,-570px;yo:471px,471px,91px,122px;"
                    data-text="w:normal;s:18,18,14,14;l:26,26,24,24;"
                    data-dim="minh:0px,0px,none,none;"
                    data-vbility="t,t,f,f"
                    data-frame_0="x:50,50,31,19;"
                    data-frame_1="st:800;sp:500;sR:800;"
                    data-frame_999="o:0;st:w;sR:7700;"
                    style="z-index:12;font-family:Jost;"
                >{{ \Illuminate\Support\Str::limit(strip_tags($apparence->slide3_description), 100, '...') }}
                </rs-layer>
            
                <rs-layer
                    id="slider-2-slide-5-layer-17" 
                    class="slider-border-font"
                    data-type="text"
                    data-color="rgba(255, 255, 255, 0.19)"
                    data-rsp_ch="on"
                    data-xy="x:l,l,c,c;xo:50px,50px,-517px,0;yo:156px,156px,112px,65px;"
                    data-text="w:normal;s:100,100,45,40;l:140,140,55,55;ls:6px,6px,3px,1px;"
                    data-dim="minh:0px,0px,none,none;"
                    data-vbility="t,t,f,f"
                    data-frame_0="sX:0.9;sY:0.9;"
                    data-frame_1="e:power2.inOut;st:130;sp:500;sR:130;"
                    data-frame_999="o:0;st:w;sR:8370;"
                    style="z-index:8;font-family:Open Sans;text-transform:uppercase;"
                >{{ $apparence->section3_title }} 
                </rs-layer>
            </rs-slide>
            
        </rs-slides>
    </rs-module>
</rs-module-wrap>
