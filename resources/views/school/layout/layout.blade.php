<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <!-- link for font-awesome-->
  <link rel="stylesheet" href="{{ asset('school') }}/library/css/all.min.css">

  <!-- link for Bootstrap-->
  <link rel="stylesheet" href="{{ asset('school') }}/library/css/bootstrap.min.css">

   <!-- link for Carousel-->
   <link rel="stylesheet" href="{{ asset('school') }}/library/css/owl.carousel.min.css">
   <link rel="stylesheet" href="{{ asset('school') }}/library/css/owl.theme.default.min.css">

  <!-- link for custom css-->
  <link rel="stylesheet" href="{{ asset('school') }}/custom/css/index.css">

  <style>
    .navbar-bg-controller{
      background-color: black;
      
    }

 
  </style>

</head>

<body>
@include('school.front.nav.nav')

    @yield('main')













    @include('school.front.nav.footer')
<script>
  window.onscroll = function(){
    if(window.scrollY>150){
        document.querySelector('.navbar').classList.add('navbar-bg-controller')
      
    }else{
      document.querySelector('.navbar').classList.remove('navbar-bg-controller')
     
    }
  }
</script>
<!-- link for font-awesome-->
<script src="{{ asset('school') }}/library/js/all.min.js"></script>

<!-- link for Bootstrap-->
<script src="{{ asset('school') }}/library/js/popover.min.js"></script>
<script src="{{ asset('school') }}/library/js/bootstrap.min.js"></script>

<!-- link for jquery-->
<script src="{{ asset('school') }}/library/js/jquery.js"></script>

 <!-- link for carousel-->
 <script src="{{ asset('school') }}/library/js/owl.carousel.min.js"></script>

<!-- link for custom js-->
<script src="{{ asset('school') }}/custom/js/index.js"></script>

</body>

</html>
