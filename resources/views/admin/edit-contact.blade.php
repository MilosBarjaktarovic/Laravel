@extends('layout')

@section('title', 'Edit Contact')

@section('content')
<div class="container my-5">
    <h2 class="mb-4">Edit Contact</h2>

    <form action="{{ route('admin.contacts.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" value="{{ $contact->email }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Subject</label>
            <input type="text" name="subject" value="{{ $contact->subject }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Message</label>
            <textarea name="message" class="form-control" rows="5" required>{{ $contact->message }}</textarea>
        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-primary">Update</button>
            <a href="{{ route('admin.contacts') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
