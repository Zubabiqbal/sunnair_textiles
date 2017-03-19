
<!-- === BEGIN HEADER === -->
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
@include('sample_layout.head')
<body>
<div id="body-bg">
    <!-- Phone/Email -->
    @include('sample_layout.phone_email')
    <!-- End Phone/Email -->
    <!-- Header -->
    @include('sample_layout.logo')
    <!-- End Header -->
    <!-- Top Menu -->
    @include('sample_layout.navbar')
    <!-- End Top Menu -->
    <!-- === END HEADER === -->
    <!-- === BEGIN CONTENT === -->
        @yield('content')
    <!-- === END CONTENT === -->
    <!-- === BEGIN FOOTER === -->
   @include('sample_layout.footer_base')
    <!-- Footer -->
    @include('sample_layout.footer')
    <!-- End Footer -->
    <!-- JS -->
    @include('sample_layout.footer_js')
    <!-- End JS -->
</body>
</html>
<!-- === END FOOTER === -->