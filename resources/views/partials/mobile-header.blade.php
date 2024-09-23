<div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><i class="fas fa-times"></i></div>
            
            <nav class="menu-box">
                <div class="nav-logo"><a href="{{route('home')}}"><img style="background: white; border-radius:5px" src="{{asset($settings->logo)}}" alt="" title=""></a></div>
                <div class="menu-outer"></div>
                <div class="contact-info">
                    <h4>Contact Info</h4>
                    <ul>
                        <li>146 – 1001 Rang Saint Malo Trois-Rivières, QC G8V 1X4</li>
                        <li><a href="tel:{{$settings->no_telephone}}">{{$settings->no_telephone}}</a></li>
                        <li><a href="mailto:{{$settings->email}}">{{$settings->email}}</a></li>
                    </ul>
                </div>
                <div class="social-links">
                    <ul class="clearfix">
                        <li><a href="{{$settings->link_fb ?? null}}"><i class="fab fa-facebook-square"></i></a></li>
                        <li><a href="{{$settings->link_tw ?? null}}"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="{{$settings->link_ld ?? null}}"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="{{$settings->link_ld ?? null}}"><i class="fab fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </nav>
        </div>