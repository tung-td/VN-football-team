<div class="footer " style="margin-bottom: -42px; ">
    <div class="footer__social-links ">
        <div class="footer-logo ">
            <img src="{{asset('public/client/img/custom/img2/logo/LogoVN.webp')}} " alt=" ">
        </div>

        <div class="social-list ">
            <a href="https://www.facebook.com/vietnamesefootball/">
                <!-- <i class="ti-facebook "></i> -->
                <ion-icon name="logo-facebook"></ion-icon>
            </a>
            <a href="https://www.youtube.com/channel/UCndcERoL9eG-XNljgUk1Gag">
                <!-- <i class="ti-youtube "></i> -->
                <ion-icon name="logo-youtube"></ion-icon>
            </a>
            <a href="# ">
                <!-- <i class="ti-twitter "></i> -->
                <ion-icon name="logo-twitter"></ion-icon>
            </a>
            <a href="https://www.instagram.com/vietnam.football/">
                <!-- <i class="ti-instagram "></i> -->
                <ion-icon name="logo-instagram"></ion-icon>
            <a href="#">
                <!-- <i class="fab fa-tiktok fa-1x "></i> -->
                <ion-icon name="logo-tiktok"></ion-icon>
            </a>
        </div>
    </div>

    <div class="footer-sponsor ">
        <div class="sponsor__primary ">
            <img src="{{asset('public/client/img/custom/img2/sponsor/adidas.png')}} " alt=" ">
            <img src="{{asset('public/client/img/custom/img2/sponsor/acecook.png')}}" alt=" ">
            <img src="{{asset('public/client/img/custom/img2/sponsor/Herbalife-Logo.png')}}" alt=" ">
            <img src="{{asset('public/client/img/custom/img2/sponsor/honda.png')}}" alt=" ">
        </div>
        <div class="sponsor__secondary ">
            <ul>
                @foreach($partner as $key => $part)
                <li href="@if($part->partner_link != '') {{$part->partner_link}} @else # @endif">
                    <img src="{{url('public/uploads/partner/'.$part->partner_image)}}" alt="{{$part->partner_name}}">
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="footer-copyright ">
        <div class="col footer_copyright_text">
            VIETNAM © 2022 All rights reserved
        </div>
    </div>
</div>