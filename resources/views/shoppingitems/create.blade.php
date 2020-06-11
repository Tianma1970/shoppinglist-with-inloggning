@extends('layouts/app')

@section('content')

<div class="container">
    @include('partials/status')
    <div class="jumbotron col-12">
        {{--  @if (count($shoppinglists) > 0)  --}}
        <h1 class="text-center">{{ __('Add some Shopping items') }}</h1>

        <form method="POST" action="/shoppingitems/store">
            <!--We need to set a csrf-token (Cross site request forgery)in order to send the form-->
            @csrf
            <!--/We need to set a csrf-token in order to send the form-->
            <div class="form-group row">
                <label for="category" class="col-md-4 text-md-right control-label">{{ __('Category') }}</label>
                <div class="col-md-6">
                    <select class="form-control" name="category" id="category">
                        <option value="">{{ __('Select a Category') }}</option>
                        <option value="food">{{ __('Food') }}</option>
                        <option value="snack">{{ __('Snack') }}</option>
                        <option value="other">{{ __('Other') }}</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="shoppinglist_id" class="col-md-4 text-md-right control-label">{{ __('Shoppinglist') }}</label>
                    <div class="col-md-6">
                        <select class="form-control" name="shoppinglist_id" id="shoppinglist_id">
                        <option value="">{{ __('Select a Shoppinglist') }}</option>
                        @foreach(Auth::user()->shoppinglists as $shoppinglist)
                            <option value="{{ $shoppinglist->id }}">{{ $shoppinglist->title }}
                        @endforeach
                        </select>
                    </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-md-4 text-md-right control-label">{{ __('Name') }}</label>
                <div class="col-md-6">
                    <input type="textarea" name ="name" id="name" class="form-control" placeholder="Name of your Shoppingitem">
                </div>
            </div>
            <div class="form-group row">
                <label for="quantity" class="col-md-4 text-md-right control-label">{{ __('Quantity') }}</label>
                <div class="col-md-6">
                    <input type="textarea" name ="quantity" id="quantity" class="form-control" placeholder="Number of Shopping Items">
                </div>
            </div>
            <input type="submit" class="btn btn-info" value="Save your Shopping item">
        </form>
    </div>

    <div class="row">
        <div class="jumbotron col-12">
            @if(count(Auth::user()->shoppinglists) > 0)
            <h1 class="text-center">{{ __(' Your Shoppinglists') }}</h1>
            <form method="post" action="/shoppinglist/delete">
                @csrf
                <ol>
                @foreach(Auth::user()->shoppinglists as $shoppinglist)
                    <li><br>
                        <input type="checkbox" name="ids[]" value="{{ $shoppinglist->id }}"><a href="/shoppinglists/{{ $shoppinglist->id }}/show">&nbsp;&nbsp;{{ $shoppinglist->title }}</a></li><hr class="col-10">
                @endforeach
                </ol>
                @else
                <p class="text-center">{{ __('You have no Shoppinglists yet. You can create your first one') }}<a href="/shoppinglists/create">{{ __(' here ')}}</a></p>
                @endif

                <div class="d-flex justify-content-around col-12">
                    <a href="/shoppingitems/create" class="btn btn-info">{{ __('Add some Shoppingitems') }}</a>
                    <input type="submit" class="btn btn-danger" value="{{ __('Delete selected Shoppinglist') }}">
                </div>
            </form>
        </div>
    </div>
    @include('/templates/footer')
</div>



@endsection
