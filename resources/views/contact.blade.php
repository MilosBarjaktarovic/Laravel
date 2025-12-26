@extends('layout')
@section('title', 'Contact Us')

@section('content')
<div class="row g-4">

    <div class="col-md-6">
        <h2>Contact Us</h2>

        <form>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
            </div>

            <div class="mb-3">
                <label>Subject</label>
                <input type="text" name="subject" class="form-control">
            </div>

            <div class="mb-3">
                <label>Message</label>
                <textarea class="form-control" name="message" rows="4"></textarea>
            </div>

            <button class="btn btn-primary">Send Message</button>
        </form>
    </div>

    <div class="col-md-6">
        <div class="map-box">
            <iframe src="https://www.google.com/maps/embed?pb=..." width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>
        </div>
    </div>

</div>
@endsection
