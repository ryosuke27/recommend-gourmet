@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2>一瞬で美味しい店を見つけよう</h2>
        <div class="card-group">
            <div class="card">
                {!! $embed_html !!}
            </div>
            <div class="card">
                {!! $embed_html !!}
            </div>
            <div class="card">
                {!! $embed_html !!}
            </div>
        </div>
    </div>
</div>
@endsection