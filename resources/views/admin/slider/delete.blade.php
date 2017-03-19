@extends('admin_layouts.master')
@section('content')
    <form>
        <label>Name</label>
        <div class="row margin-bottom-20">
            <div class="col-md-6 col-md-offset-0">
                <input class="form-control" type="text">
            </div>
        </div>
        <label>Email
            <span class="color-red">*</span>
        </label>
        <div class="row margin-bottom-20">
            <div class="col-md-6 col-md-offset-0">
                <input class="form-control" type="text">
            </div>
        </div>
        <label>Message</label>
        <div class="row margin-bottom-20">
            <div class="col-md-8 col-md-offset-0">
                <textarea rows="8" class="form-control"></textarea>
            </div>
        </div>
        <p>
            <button type="submit" class="btn btn-primary">Send Message</button>
        </p>
    </form>
@endsection