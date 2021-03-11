@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in as admin') }}

                    <a class="btn btn-primary" href="{{route('user.home')}}">HOME</a>
                    <a class="btn btn-primary" href="{{route('user.dish.index')}}">Piatti</a>
                    <a class="btn btn-primary" href="{{route('user.graphs')}}">Grafici</a>
                    <a class="btn btn-primary" href="{{route('user.profile')}}">Profilo</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection