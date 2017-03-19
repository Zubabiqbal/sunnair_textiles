
<!-- === BEGIN HEADER === -->
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
@include('admin_layouts.master_head')
<body>
<div id="body-bg">
    <!-- Top Menu -->
    @include('admin_layouts.master_menu')
    <!-- End Top Menu -->
    <!-- === END HEADER === -->
    <!-- === BEGIN CONTENT === -->
    <div id="content">
        <div class="container-fluid background-white">
            <div class="row margin-vert-30">
                <div class="col-md-12 margin-top-30">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <!-- === END CONTENT === -->
    <!-- === BEGIN FOOTER === -->
    <!-- Footer -->
    @include('sample_layout.footer')
    <!-- End Footer -->
    <!-- JS -->
    @include('admin_layouts.master_js')
    <!-- End JS -->
</body>
</html>
<!-- === END FOOTER === -->