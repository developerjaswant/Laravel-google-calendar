@extends('layouts.frontend.app')

@section('content')
<main role="main">
        <!-- TOP SECTION -->
        <header class="grid">
        	<div class="s-12 padding-2x">
            <h1 class="text-strong text-white text-center center text-size-60 text-uppercase margin-bottom-20">Our Services</h1>
            <p class="text-size-20 text-white text-center center text-uppercase">Con nonummy sem integer interdum volutpat dis eget eligendi aliquip dolorum magnam. Iriure duis autem vel<br> eum dolor in hendrerit in vulputate velit esse molestie consequat.</p>
          </div>
        </header>
  
        
        <!-- SECTION 1 -->
        <section class="grid">
          <div class="m-12 l-6 padding-2x background-white">
            <p class="text-strong text-size-80 text-red">01</p>
            
            <h2 class="text-size-50 text-line-height-1 text-dark"><b>Nonummy nibh euismod tincidunt ut laoreet</b></h2>
            
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.</p>
            <p>Libero malesuada varius leo mollis laoreet error occaecat unde nostra harum. A morbi hymenaeos rhoncus ridiculus temporibus consectetur ducimus exercitation. Integer arcu adipiscing augue iusto nam duis facilisi senectus iaculis proin repudiandae nemo cupidatat. Ipsum donec enim leo ultricies pulvinar aute semper dolores habitant impedit harum. </p>
          </div>
          
          <!-- Image-->
          <img class="m-12 l-6" src="{{asset('public/assets/img/img-06.jpg')}}">
        </section>
        
        <!-- SECTION 2 -->
        <section class="grid">
          <!-- Image-->
          <img class="m-12 l-6" src="{{asset('public/assets/img/img-01.jpg')}}">
          
          <div class="m-12 l-6 padding-2x background-dark">
            <p class="text-strong text-size-80 text-red">02</p>
            
            <h2 class="text-size-50 text-line-height-1 margin-bottom-30 text-white"><b>Libero malesuada varius leo mollis tincidunt</b></h2>

            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.</p>
            <p>Libero malesuada varius leo mollis laoreet error occaecat unde nostra harum. A morbi hymenaeos rhoncus ridiculus temporibus consectetur ducimus exercitation. Integer arcu adipiscing augue iusto nam duis facilisi senectus iaculis proin repudiandae nemo cupidatat. Ipsum donec enim leo ultricies pulvinar aute semper dolores habitant impedit harum. </p>
          </div>
        </section> 
        
        <!-- SECTION 3 -->
        <section class="grid">
          <div class="m-12 l-6 padding-2x background-aqua">
            <p class="text-strong text-size-80 text-white">03</p>
            
            <h2 class="text-size-50 text-line-height-1 text-white"><b>Morbi hymenaeos rhoncus ridiculus</b></h2>
            
            <h3>Nonummy nibh euismod tincidunt ut laoreet</h3>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.</p>
            <p>Libero malesuada varius leo mollis laoreet error occaecat unde nostra harum. A morbi hymenaeos rhoncus ridiculus temporibus consectetur ducimus exercitation. Integer arcu adipiscing augue iusto nam duis facilisi senectus iaculis proin repudiandae nemo cupidatat. Ipsum donec enim leo ultricies pulvinar aute semper dolores habitant impedit harum. </p>
          </div>
          
          <!-- Image-->
          <img class="m-12 l-6" src="{{asset('public/assets/img/img-05.jpg')}}">
        </section> 
        
        <!-- SECTION 6 -->
        <section class="grid margin-bottom">
          <div class="s-12 padding-2x background-dark">
            <a href="contact.html" class="s-12 m-9 l-3 center button text-size-20 text-white background-red">CONTACT US</a>
          </div>
        </section>      
      </main>
      
     @endsection  