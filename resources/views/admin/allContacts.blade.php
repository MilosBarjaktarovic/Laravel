@extends('layout')

@section('title', 'Admin - Contacts')

@section('content')
<div class="container my-5">
    <h2 class="mb-4">All Contacts (Admin Panel)</h2>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->subject }}</td>
                <td>{{ $contact->message }}</td>
                <td>{{ $contact->created_at }}</td>
                <td class="d-flex gap-2">
                    <a href="{{ route('admin.contacts.edit', $contact->id) }}" class="btn btn-sm btn-primary">Edit</a>

                    <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Da li ste sigurni da želite da obrišete ovaj kontakt?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
