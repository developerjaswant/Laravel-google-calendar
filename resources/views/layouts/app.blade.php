<!--
=========================================================
* Soft UI Dashboard - v1.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>

@if (\Request::is('rtl'))
  <html dir="rtl" lang="ar">
@else
  <html lang="en" >
@endif

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  @if (env('IS_DEMO'))
      <x-demo-metas></x-demo-metas>
  @endif

  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    dashboard
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{asset('public/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('public/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{asset('public/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('public/assets/css/soft-ui-dashboard.css?v=1.0.3')}}" rel="stylesheet" />
  <link href="{{asset('public/assets/css/custom.css')}}" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100 {{ (\Request::is('rtl') ? 'rtl' : (Request::is('virtual-reality') ? 'virtual-reality' : '')) }} ">
  @auth
    @yield('auth')
  @endauth

  @guest
    @yield('guest')
  @endguest


<!-- Include Bootstrap CSS and JS -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}"></script>

<!-- Modal Template -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Message content goes here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="delete-confirm-btn">Delete</button>
            </div>
        </div>
    </div>
</div>

  
    <!--   Core JS Files   -->
  <script src="{{asset('public/assets/js/core/popper.min.js')}}"></script>
  <script src="{{asset('public/assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('public/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('public/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script src="{{asset('public/assets/js/plugins/fullcalendar.min.js')}}"></script>
  <script src="{{asset('public/assets/js/plugins/chartjs.min.js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
  @stack('rtl')
  @stack('dashboard')
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
<script>
  jQuery("document").ready(function(){
    setTimeout(function(){
       $("div.alert").remove();
    }, 5000 ); // 5 secs
    jQuery('.delete-link').click(function (event) {
        event.preventDefault();

        var url = $(this).attr('href');
        var message = $(this).data('message');

        // Update the modal content with the message
        $('#confirmationModal .modal-body').text(message);

        // Show the modal
      $('#confirmationModal').modal('show');

        // When the delete button in the modal is clicked
        $('#delete-confirm-btn').click(function () {
            // Redirect to the delete URL to trigger the deletion
            window.location.href = url;
        });
    });

});
</script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('public/assets/js/soft-ui-dashboard.min.js?v=1.0.3')}}"></script>
</body>

</html>
