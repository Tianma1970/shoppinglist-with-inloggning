@extends('layouts/app')

@section('content')

<div class="container">
    <div class="jumbotron col -md-12">
        <h1 class="text-center">{{ $shoppinglist->title }}</h1>
        <div class="text-center">
            <ol>
                @foreach($shoppinglist->shoppingitems as $shoppingitem)
                    <br>
                        {{ __('Article: ') }}{{ $shoppingitem->name }}<br>
                        {{ __('Category: ') }}{{ $shoppingitem->category }}<br>
                        {{ __('Quantity: ') }}{{ $shoppingitem->quantity }}<br>
                        <small><i>{{ __('created by: ') }}{{ Auth::user()->name }}</i></small><br>
                        <small><i>{{ __('at: ') }}{{ $shoppingitem->updated_at }}</i></small><br>
                    </li>
                @endforeach
            </ol><hr>
        </div>
    </div>
</div>
@include('/templates/footer')

@endsection
