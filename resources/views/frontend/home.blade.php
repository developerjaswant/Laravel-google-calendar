@extends('layouts.frontend.app')

@section('content')
      
      <!-- MAIN -->
      <main role="main">
        <!-- TOP SECTION -->
        <section class="grid">
          <!-- Main Carousel -->
          <div class="s-12 margin-bottom carousel-fade-transition owl-carousel carousel-main carousel-nav-white carousel-hide-arrows background-dark">
          @foreach($sliders as $key => $slider)
    <div class="item background-image" style="background-image:url({{asset('public'.$slider->image)}})">
        <p class="text-padding text-strong text-white text-s-size-30 text-size-60 text-uppercase background-primary">
            {{ $slider->short_describation }}
        </p>
        <p class="text-padding text-size-20 text-dark text-uppercase background-white">
            {{ $slider->meta_describation }}
        </p>
    </div>
@endforeach
          </div>  
        </section>
        
        <!-- SECTION 1 --> 
        @foreach($pages as $key => $page)
        <section class="grid margin text-center">
          <a href="/" class="s-12 m-6 l-3 padding-2x vertical-center margin-bottom background-red">
            <i class="icon-sli-equalizer text-size-60 text-white center margin-bottom-15"></i>
            <h3 class="text-strong text-size-20 text-line-height-1 margin-bottom-30 text-uppercase">{{$page->title1}}</h3>
          </a>
          <a href="/" class="s-12 m-6 l-3 padding-2x vertical-center margin-bottom background-blue">
            <i class="icon-sli-layers text-size-60 text-white center margin-bottom-15"></i>
            <h3 class="text-strong text-size-20 text-line-height-1 margin-bottom-30 text-uppercase">{{$page->title2}}</h3>
          </a>
          
          <!-- Image-->
          <img class="m-12 l-6 l-row-2 margin-bottom" src="{{asset('public'.$page->image)}}">
          
          <a href="/" class="s-12 m-6 l-3 padding-2x vertical-center margin-bottom background-orange">
            <i class="icon-sli-diamond text-size-60 text-white center margin-bottom-15"></i>
            <h3 class="text-strong text-size-20 text-line-height-1 margin-bottom-30 text-uppercase">{{$page->title3}}</h3>
          </a>
          <a href="/" class="s-12 m-6 l-3 padding-2x vertical-center margin-bottom background-aqua">
            <i class="icon-sli-share text-size-60 text-white center margin-bottom-15"></i>
            <h3 class="text-strong text-size-20 text-line-height-1 margin-bottom-30 text-uppercase">{{$page->title4}}</h3>
          </a>
        </section>
        
        <!-- SECTION 2 -->
        <section class="grid section margin-bottom background-dark">
          <h2 class="s-12 l-6 center text-thin text-size-30 text-white text-uppercase margin-bottom-30"> <b>{{$page->short_describation}}</b></h2>
          <p class="s-12 l-6 center">{{$page->meta_describation}}</p>
        </section>
        @endforeach
  
        <!-- SECTION 3 --> 
        @foreach($pages1 as $key => $page)
        <section class="grid margin">
          <!-- Image-->
          <img class="s-12 m-6 margin-bottom" src="{{asset('public'.$page->image)}}">
        
          <div class="s-12 m-6 padding-2x margin-bottom background-blue">
            <h2 class="text-strong text-size-50 text-line-height-1">{{$page->short_describation}}</h2>
            <ul>
              <li>{{$page->title1}}</li> 
              <li>{{$page->title2}}</li>
              <li>{{$page->title3}}</li>
              <li>{{$page->title4}}</li>
            </ul>
          </div>
        </section>
        @endforeach
        <!-- SECTION 4 -->
        @foreach($pages4 as $key => $page)
        <h2 class="s-12 text-white text-thin text-size-30 text-white text-uppercase margin-top-bottom-40 center text-center"><b>{{$page->name}}</b></h2>
        <section class="grid margin">
       
          <a class="s-12 m-6 margin-bottom" href="gallery.html">
            <img class="full-img" src="{{asset('public'.$page->image)}}" alt=""/>
          </a>
          @endforeach	
          @foreach($pages5 as $key => $page)
          <a class="s-12 m-6 margin-bottom" href="gallery.html">
            <img class="full-img" src="{{asset('public'.$page->image)}}" alt=""/>
          </a>
          @endforeach
          @foreach($pages6 as $key => $page)
          <a class="s-12 m-6 margin-bottom" href="gallery.html">
            <img class="full-img" src="{{asset('public'.$page->image)}}" alt=""/>
          </a>
          @endforeach	
           @foreach($pages7 as $key => $page)
          <a class="s-12 m-6 margin-bottom" href="gallery.html">
            <img class="full-img" src="{{asset('public'.$page->image)}}" alt=""/>
          </a>
          @endforeach	
        </section>
        
        <!-- SECTION 5 -->
        
        <section class="grid margin text-center">
        @foreach($pages4 as $key => $page)
          <div class="m-12 l-4 padding-2x background-dark margin-bottom text-right">
            <h3 class="text-strong text-size-25 text-uppercase margin-bottom-10">{{$page->short_describation}}</h3>
            <p>{{$page->meta_describation}}</p>
          </div>
          @endforeach
          <a href="/" class="s-12 m-6 l-2 padding vertical-center margin-bottom facebook hover-zoom">
             <i class="icon-sli-social-facebook text-size-60 text-white center"></i>
          </a>
          <a href="/" class="s-12 m-6 l-2 padding vertical-center margin-bottom twitter hover-zoom">
            <i class="icon-sli-social-twitter text-size-60 text-white center"></i>
          </a>
          <a href="/" class="s-12 m-6 l-2 padding vertical-center margin-bottom youtube hover-zoom">
            <i class="icon-sli-social-youtube text-size-60 text-white center"></i>
          </a>
          <a href="/" class="s-12 m-6 l-2 padding vertical-center margin-bottom linkedin hover-zoom">
            <i class="icon-sli-social-linkedin text-size-60 text-white center"></i>
          </a>
        </section>
                
      </main>
      

      @endsection