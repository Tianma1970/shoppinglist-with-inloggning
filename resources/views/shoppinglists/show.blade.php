@extends('layouts/app')

@section('content')

<div class="container">
    <div class="jumbotron col -md-12">
        <h1 class="text-center">{{ $shoppinglist->title }}</h1>
        <div class="text-center">
            <form method="post" action="/shoppingitems/delete">
                @csrf
                <ol>
                    @foreach($shoppinglist->shoppingitems as $shoppingitem)
                        <br>

                        <input type="checkbox" name="ids[]" value="{{ $shoppingitem->id }}">&nbsp;
                            {{ __('Article: ') }}{{ $shoppingitem->name }}<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __('Category: ') }}{{ $shoppingitem->category }}<br>
                            &nbsp;&nbsp;&nbsp;{{ __('Quantity: ') }}{{ $shoppingitem->quantity }}<br>
                            <small><i>{{ __('created by: ') }}{{ Auth::user()->name }}</i></small><br>
                            <small><i>{{ __('at: ') }}{{ $shoppingitem->updated_at }}</i></small><br><br>


                    @endforeach
                </ol><hr>
                <div class="d-flex justify-content-around">
                    <a href="/shoppinglist/{{ $shoppinglist->id }}/edit" class="btn btn-info">{{ __('Edit ') }}{{ $shoppinglist->title }}</a>
                    <a href="/shoppingitems/{{ $shoppingitem->id }}/edit" class="btn btn-info">{{ __('Edit Shoppingitem') }}</a>
                    <a href="/shoppingitems/create" class="btn btn-info">{{ __('Add a Shoppingitem') }}</a>
                    <input type="submit" class="btn btn-danger" value="{{ __('Delete selected Item') }}"><br>
                    <a href="/shoppingitems/create" class="btn btn-info">{{ __('Back') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
@include('/templates/footer')

@endsection
