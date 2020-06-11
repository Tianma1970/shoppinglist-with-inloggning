@extends('layouts/app')

@section('content')
<div class="container">
    @include('partials/status')
    <div class="jumbotron col-md-12">
        <h1 class="text-center">{{ __('Create a Shoppinglist') }}</h1>
        <form method="post" action="/shoppinglist/store">
            <!--We need to set a csrf token in order to send the form-->
            @csrf
            <div class="form-group row">
                <label for="title" class="col-md-4 text-md-right control-label">{{ __('Title') }}</label>
                <div class="col-md-6">
                    <input type="textarea" name ="title" id="quantity" class="form-control" placeholder="The title of your Shoppinglist">
                </div>
                <input type="submit" class="btn btn-info" value="Save your Shopping list">
            </div>
        </form>
    </div>

    <div class="jumbotron col-md-12">
        @if(count(Auth::user()->shoppinglists) > 0)
            <p>{{ __('Your Shoppinglists') }}</p>
            <ul>
                @foreach(Auth::user()->shoppinglists as $shoppinglist)
                <li>
                    <a href ="{{ $shoppinglist->id}}">{{ $shoppinglist->title}}</a>
                </li>
                @endforeach

            </ul>
            @else
            <h3 class="text-center">{{ __('No Shoppinglists') }}</h3>
        @endif
    </div>
    @include('/templates/footer')
</div>
@endsection
