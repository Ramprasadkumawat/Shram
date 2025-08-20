@extends('layouts/contentNavbarLayout')

@section('title', 'Layout without navbar')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Layout without navbar</h4>
      </div>
      <div class="card-body">
        <p class="card-text">
          This is an example of a layout without the top navbar. The navbar has been hidden for this page.
        </p>
        <p class="card-text">
          You can use this layout for pages that don't require the top navigation bar.
        </p>
      </div>
    </div>
  </div>
</div>
@endsection
