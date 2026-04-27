
@extends('admin.layout')

@section('content')

<h2>Projects</h2>

@foreach($projects as $project)
    <div>
        <h3>{{ $project->title }}</h3>
        <p>{{ $project->category }}</p>
        <p>{{ $project->description }}</p>

        @if($project->image)
            <img src="{{ asset('storage/'.$project->image) }}" width="200">
        @endif
    </div>
@endforeach

@endsection