
@extends('admin.layout')

@section('content')

<h2>Messages</h2>

@foreach($messages as $msg)
    <div>
        <h4>{{ $msg->name }}</h4>
        <p>{{ $msg->email }}</p>
        <p>{{ $msg->message }}</p>
    </div>
@endforeach

@endsection