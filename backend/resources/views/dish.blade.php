@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card mb-3">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap">
                <title>Placeholder</title>
                <rect fill="#868e96" width="100%" height="100%" /><text fill="#dee2e6" dy=".3em" x="50%" y="50%">Image cap</text>
            </svg>
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <a href="{{ route('map.show')}}"><button type="button" class="btn btn-success">Go</button></a>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
        </div>
    </div>
</div>
@endsection