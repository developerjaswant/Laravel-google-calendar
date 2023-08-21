<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Free responsive business website template</title>
      <link href="{{asset('public/assets/css/components.css')}}" rel="stylesheet" />
      <link href="{{asset('public/assets/css/icons.css')}}" rel="stylesheet" />
      <link href="{{asset('public/assets/css/responsee.css')}}" rel="stylesheet" />
      <link href="{{asset('public/assets/css/template-style.css')}}" rel="stylesheet" />
      <link href="{{asset('public/assets/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
      <link href="{{asset('public/assets/owl-carousel/owl.theme.css')}}" rel="stylesheet" />

      <!-- CUSTOM STYLE -->      

      <link href="https://fonts.googleapis.com/css?family=Barlow:100,300,400,700,800&amp;subset=latin-ext" rel="stylesheet">
      
      <script src="{{asset('public/assets/js/jquery-1.8.3.min.js')}}"></script>
      <script src="{{asset('public/assets/js/jquery-ui.min.js')}}"></script>
      <script src="{{asset('public/assets/js/responsee.js')}}"></script>
      <script src="{{asset('public/assets/owl-carousel/owl.carousel.js')}}"></script>
      <script src="{{asset('public/assets/js/template-scripts.js')}}"></script>
   
   </head>
   <body style="background-color:black;">
      @include('layouts.frontend.header.header')

      @yield('content')
  
      @include('layouts.frontend.footer.footer')
     
   </body>
</html>