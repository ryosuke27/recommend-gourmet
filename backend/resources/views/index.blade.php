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

<div class="container mt-5 px-5 py-5 border">
    <div class="row">
        <div class="col">
            <label for="area" class="form-label">Area</label>
            <input type="area" class="form-control" id="area" placeholder="area">
        </div>
        <div class="col">
            <label for="category" class="form-label">Category</label>
            <input type="category" class="form-control" id="Category" placeholder="category">
        </div>
        <div class="col">
            <label for="hashtag" class="form-label">HashTag</label>
            <input type="hashtag" class="form-control" id="hashtag" placeholder="#hashtag">
        </div>
    </div>
    <div class="container mt-3">
        <button type="submit" class="btn btn-primary">Search</button>
        <button type="clear" class="btn btn-outline-secondary">Clear</button>
    </div>
</div>
</div>
@endsection