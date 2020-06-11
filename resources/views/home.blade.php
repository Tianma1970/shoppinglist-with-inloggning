@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h3>{{ __('Welcome') }} {{ Auth::user()->name }}</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Your Shoppinglists') }}
                    <ul>
                    @foreach($shoppinglists as $shoppinglist)
                        <li>{{ $shoppinglist->title }}</li>

                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@include('templates/footer')
@endsection
