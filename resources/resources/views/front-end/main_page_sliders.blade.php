<div class="tp-banner-container clearfix">
    <div class="tp-banner">
        <ul>
            @foreach($sliders as $slider)
                <li data-transition="slidehorizontal" data-slotamount="5" data-masterspeed="700">
                    <!-- MAIN IMAGE -->
                    <img src="{{asset('upload/'.$slider->img)}}" alt="slidebg1" data-bgfit="cover"
                         data-bgposition="center center" data-bgrepeat="no-repeat">
                    <!-- LAYERS -->
                    <!-- LAYER NR. 1 -->
                    {{--<div class="tp-caption very_big_white skewfromrightshort fadeout"
                         data-x="center"
                         data-y="100"
                         data-speed="500"
                         data-start="1200"
                         data-easing="Circ.easeInOut"
                         style=" font-size:70px; font-weight:800; color:#fe0100;">Huge <span
                                style=" color:#000;">sale</span></div>

                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption tp-caption medium_text skewfromrightshort fadeout"
                         data-x="center"
                         data-y="165"
                         data-hoffset="0"
                         data-voffset="-73"
                         data-speed="500"
                         data-start="1200"
                         data-easing="Power4.easeOut"
                         style=" font-size:20px; font-weight:500; color:#337ab7;"> Sale off 75% all products
                    </div>

                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption customin tp-resizeme rs-parallaxlevel-0"
                         data-x="center"
                         data-y="210"
                         data-hoffset="0"
                         data-voffset="98"
                         data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                         data-speed="500"
                         data-start="1500"
                         data-easing="Power3.easeInOut"
                         data-splitin="none"
                         data-splitout="none"
                         data-elementdelay="0.1"
                         data-endelementdelay="0.1"
                         data-linktoslide="next"
                         style="border: 2px solid #fed700;border-radius: 50px; font-size:14px; background-color:#fed700; color:#333; z-index: 12; max-width: auto; max-height: auto; white-space: nowrap; letter-spacing:1px;">
                        <a href='#' class='largebtn slide1'>Learn More</a></div>--}}
                </li>
            @endforeach
        </ul>
    </div>
</div>