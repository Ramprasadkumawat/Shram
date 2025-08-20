@php
$isMenu = false;
$navbarHideToggle = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Layout without menu')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Layout without menu</h4>
      </div>
      <div class="card-body">
        <p class="card-text">
          This is an example of a layout without the sidebar menu. The menu has been hidden for this page.
        </p>
        <p class="card-text">
          You can use this layout for pages that don't require navigation or for full-width content.
        </p>
      </div>
    </div>
  </div>
</div>
@endsection
