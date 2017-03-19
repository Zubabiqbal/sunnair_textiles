<!-- === BEGIN CONTENT === -->
<div>
    <div class="container background-white">
        <div class="row margin-vert-30">

            @if(Session::has('status'))
                <div class="alert alert-{{ (Session::get('status') == 'fail') ? 'danger' : 'success'  }}">
                    {{ Session::get('message') }}
                </div>
            @endif
            <!-- Main Column -->
            <div class="col-md-8">
                <!-- Main Content -->
                <!-- Contact Form -->
                <form action="{{ url('\send-email') }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('post') }}
                    <label>Name</label>
                    <div class="row margin-bottom-20">
                        <div class="col-md-6 col-md-offset-0">
                            <input name="name" class="form-control" type="text" required>
                        </div>
                    </div>
                    <label>Email
                        <span class="color-red">*</span>
                    </label>
                    <div class="row margin-bottom-20">
                        <div class="col-md-6 col-md-offset-0">
                            <input name="from" class="form-control" type="email" required>
                        </div>
                    </div>
                    <label>Message</label>
                    <div class="row margin-bottom-20">
                        <div class="col-md-8 col-md-offset-0">
                            <textarea name="message" required rows="8" class="form-control"></textarea>
                        </div>
                    </div>
                    <p>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </p>
                </form>
                <!-- End Contact Form -->
                <!-- End Main Content -->
            </div>
            <!-- End Main Column -->
            <!-- Side Column -->
            <div class="col-md-4">
                <!-- Recent Posts -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Contact Info</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <li>
                                <i class="fa-phone color-primary"></i>{{ config('custom.phone') }}</li>
                            <li>
                                <i class="fa-envelope color-primary"></i>{{ config('custom.email') }}</li>
                            <li>
                                <i class="fa-home color-primary"></i>{{ config('custom.website') }}
                            </li>
                            <li>
                                <i class="fa-location-arrow color-primary">{{ config('custom.address') }}</i>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End recent Posts -->
            </div>
            <!-- End Side Column -->
        </div>
    </div>
</div>
           