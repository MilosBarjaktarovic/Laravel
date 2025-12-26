<<<<<<< HEAD
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
=======
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>contact Us</title>
</head>

<body>
    <h1>Contact Our Company</h1>
    <p>Feel free to reach out to us with any questions or concerns you may have.</p>
</body>

</html>
>>>>>>> 8d3a7e5bd4bd47c057e4a2248e0e5784ab860923
