
<!-- === BEGIN HEADER === -->
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
@include('layouts.master_head')
<body>
<div id="body-bg">
    <!-- Phone/Email -->
    @include('layouts.master_phone_email')
    <!-- End Phone/Email -->
    <!-- Header -->
    <div id="header">
        <div class="container">
            <div class="row">
                <!-- Logo -->
                <div class="logo">
                    <a href="index.html" title="">
                        <img src="assets/img/logo.png" alt="Logo" />
                    </a>
                </div>
                <!-- End Logo -->
            </div>
        </div>
    </div>
    <!-- End Header -->
    <!-- Top Menu -->
    @include('layouts.master_menu')
    <!-- End Top Menu -->
    <!-- === END HEADER === -->
    <!-- === BEGIN CONTENT === -->
    <div id="content">
        <div class="container background-white">
            <div class="row margin-vert-30">
                <div class="col-md-12 margin-top-30">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <!-- === END CONTENT === -->
    <!-- === BEGIN FOOTER === -->
    <div id="base">
        <div class="container bottom-border padding-vert-30">
            <div class="row">
                <!-- Disclaimer -->
                <div class="col-md-4">
                    <h3 class="class margin-bottom-10">Disclaimer</h3>
                    <p>All stock images on this template demo are for presentation purposes only, intended to represent a live site and are not included with the template or in any of the Joomla51 club membership plans.</p>
                    <p>Most of the images used here are available from
                        <a href="http://www.shutterstock.com/" target="_blank">shutterstock.com</a>. Links are provided if you wish to purchase them from their copyright owners.</p>
                </div>
                <!-- End Disclaimer -->
                <!-- Contact Details -->
                <div class="col-md-4 margin-bottom-20">
                    <h3 class="margin-bottom-10">Contact Details</h3>
                    <p>
                        <span class="fa-phone">Telephone:</span>1-800-123-4567
                        <br>
                        <span class="fa-envelope">Email:</span>
                        <a href="mailto:info@example.com">info@example.com</a>
                        <br>
                        <span class="fa-link">Website:</span>
                        <a href="http://www.example.com">www.example.com</a>
                    </p>
                    <p>The Dunes, Top Road,
                        <br>Strandhill,
                        <br>Co. Sligo,
                        <br>Ireland</p>
                </div>
                <!-- End Contact Details -->
                <!-- Sample Menu -->
                <div class="col-md-4 margin-bottom-20">
                    <h3 class="margin-bottom-10">Sample Menu</h3>
                    <ul class="menu">
                        <li>
                            <a class="fa-tasks" href="#">Placerat facer possim</a>
                        </li>
                        <li>
                            <a class="fa-users" href="#">Quam nunc putamus</a>
                        </li>
                        <li>
                            <a class="fa-signal" href="#">Velit esse molestie</a>
                        </li>
                        <li>
                            <a class="fa-coffee" href="#">Nam liber tempor</a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <!-- End Sample Menu -->
            </div>
        </div>
    </div>
    <!-- Footer -->
    @include('layouts.master_footer')
    <!-- End Footer -->
    <!-- JS -->
    @include('layouts.master_js')
    <!-- End JS -->
</body>
</html>
<!-- === END FOOTER === -->