@extends('admin.layout')

@section('content')

<h2>Experience</h2>

@foreach($experiences as $exp)
    <div>
        <h3>{{ $exp->company }}</h3>
        <p>{{ $exp->position }}</p>
        <p>{{ $exp->start_date }} - {{ $exp->end_date }}</p>
        <p>{{ $exp->description }}</p>
    </div>
@endforeach

@endsection