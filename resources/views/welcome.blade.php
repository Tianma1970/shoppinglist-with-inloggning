@extends('layouts/app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h1 class="text-center">{{ __('Welcome to Shoppinglist') }}</h1>
        <p class="text-center">{{ __('You need to register in order to create your Shoppinglist') }}</p>
    </div>

    @include('/templates/footer')
</div>

@endsection
