@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3 mx-auto" style="max-width: 800px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://laravel.com/img/logotype.min.svg" class="img-fluid rounded-start" alt="Laravel Logo">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        @php
          $price = intval($viewData["product"]["price"]);
        @endphp

        @if ($price > 100)
          <h5 class="card-title red-text">
            {{ $viewData["product"]["name"] }}
          </h5>
        @else
          <h5 class="card-title">
            {{ $viewData["product"]["name"] }}
          </h5>
        @endif

        <h6 class="badge bg-primary">{{ $viewData["product"]["price"] }} €</h6>
        <p class="card-text">{{ $viewData["product"]["description"] }}</p>
      </div>
    </div>
  </div>
</div>
@endsection

