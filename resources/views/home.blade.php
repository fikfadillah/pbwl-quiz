@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            {{-- <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div> --}}
            <div class="d-flex flex-column align-items-center" style="margin-top: 10rem;">
                <h1 style="letter-spacing: .35em; font-size: 3.5rem">M Taufik Fadillah</h1>
                <p style="letter-spacing: .1rem; font-size: 1.5rem;" class="fw-lighter">Simple CRUD With Laravel and
                    Bootstrap
                    B'y <span class="text-danger fw-bold">&#10084;</span> FikFadillah
                </p>
            </div>
        </div>
    </div>
@endsection
