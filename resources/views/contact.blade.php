@extends('layout')

@section('title', 'Contact')

@section('content')
<div class="container my-5">

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="row">

        <!-- Contact form -->
        <div class="col-md-6">
            <h2 class="mb-4">Contact Us</h2>

            <form method="POST" action="{{ route('contact.send') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>

                <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="5" placeholder="Your message" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">
                    Send Message
                </button>
            </form>
        </div>

        <!-- Map image -->
        <div class="col-md-6 mt-4 mt-md-0">
            <h5>Our Location</h5>
            <div class="ratio ratio-16x9 shadow rounded">
                <iframe src="https://www.google.com/maps?q=0,0&z=2&output=embed" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>

    </div>
</div>
@endsection
