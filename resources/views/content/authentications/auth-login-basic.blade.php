@extends('layouts/blankLayout')

@section('title', 'Login')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="{{ route('admin.dashboard') }}" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">
                <svg width="25" viewBox="0 0 25 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <defs>
                    <path d="M13.7918663,0.358365126 L3.39788168,7.44144159 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.842988865,16.0588497 1.14858138,16.3085018 1.47179315,16.5438469 L13.7918663,0.358365126 Z" id="path-1"></path>
                    <path d="M25.7918663,0.358365126 L15.3978817,7.44144159 C12.566865,9.69408886 11.6202047,12.4788597 12.5579009,15.7960551 C12.8429889,16.0588497 13.1485814,16.3085018 13.4717932,16.5438469 L25.7918663,0.358365126 Z" id="path-2"></path>
                  </defs>
                  <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Branded" transform="translate(-27.000000, -15.000000)">
                      <g id="Icon" transform="translate(27.000000, 15.000000)">
                        <path d="M13.7918663,0.358365126 L3.39788168,7.44144159 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.842988865,16.0588497 1.14858138,16.3085018 1.47179315,16.5438469 L13.7918663,0.358365126 Z" id="Icon" fill="#696cff"></path>
                        <path d="M25.7918663,0.358365126 L15.3978817,7.44144159 C12.566865,9.69408886 11.6202047,12.4788597 12.5579009,15.7960551 C12.8429889,16.0588497 13.1485814,16.3085018 13.4717932,16.5438469 L25.7918663,0.358365126 Z" id="Icon" fill="#696cff"></path>
                      </g>
                    </g>
                  </g>
                </svg>
              </span>
              <span class="app-brand-text demo text-heading fw-bolder">Shram Admin</span>
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-2">Welcome to Shram Admin! 👋</h4>
          <p class="mb-4">Please sign-in to your admin account</p>

          @if (isset($errors) && $errors->any())
            <div class="alert alert-danger">
              <ul class="mb-0">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form id="formAuthentication" class="mb-3" action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" autofocus>
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password">
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember" name="remember">
                <label class="form-check-label" for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
            </div>
          </form>

          <p class="text-center">
            <span>Need help?</span>
            <a href="#">
              <span>Contact support</span>
            </a>
          </p>
        </div>
      </div>
    </div>
    <!-- /Register -->
  </div>
</div>
@endsection
