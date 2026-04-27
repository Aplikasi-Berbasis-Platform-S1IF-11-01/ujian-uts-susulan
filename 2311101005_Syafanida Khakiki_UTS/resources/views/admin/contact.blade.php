@extends('admin.layout')

@section('content')

<h2>Contact</h2>

<p>Email: {{ $contact->email ?? '' }}</p>
<p>Phone: {{ $contact->phone ?? '' }}</p>

@endsection