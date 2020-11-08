<!-- slider-section-start -->
@php
use App\Models\Dashboard\Slider;
$sliders = Slider::where('status', '1')->get();
@endphp
<div class="main-slider-one main-slider-two slider-area">
<div id="wrapper">
    <div class="slider-wrapper">
        <div id="mainSlider" class="nivoSlider">
            @php
                $str_counter = 0;
            @endphp
            @foreach($sliders as $slider)
            @php
                $str_counter++;
            @endphp
            <img src="{{ asset('public/uploads/slider/' . $slider->slider_img) }}" alt="main slider" title="#htmlcaption{{$str_counter}}" width=100%/>
            @endforeach
        </div>
        @php
            $str_counter = 0;
        @endphp
        @foreach($sliders as $slider)
        @php
            $str_counter++;
        @endphp
        <div id="htmlcaption{{$str_counter}}" class="nivo-html-caption slider-caption">
            <div class="container">

                <div class="slider-left two-caption-text slider-right">
                    <div class="slide-text animated zoomInUp">
                        <h3>{{ $slider->sub_title }}</h3>
                        <h1>{{ $slider->title }}</h1>
                        <span>{{ $slider->price_text }}</span>
                    </div>
                    <div class="one-p animated bounceInLeft">
                        <p>{{ $slider->description }}</p>
                    </div>
                    <div class="animated slider-btn fadeInUpBig">
                        <a class="shop-btn" href="#">Shop now</a>
                    </div>
                </div>

            </div>
        </div>
        @endforeach
    </div>

</div>
</div>
<!-- slider section end -->
