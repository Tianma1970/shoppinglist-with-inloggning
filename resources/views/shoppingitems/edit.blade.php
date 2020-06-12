@extends('layouts/app')

@section('content')

<div class="container">
    @include('partials/status')
    <div class="jumbotron col-12">

        <h1 class="text-center">{{ __('Edit a selected Shoppingitem') }}</h1>

        <form method="POST" action="/shoppingitem/{{$shoppingitem->id}}/update">
            <!--We need to set a csrf-token (Cross site request forgery)in order to send the form-->
            @csrf
            <!--/We need to set a csrf-token in order to send the form-->
            @method('PUT')
            <div class="form-group row">
                <label for="category" class="col-md-4 text-md-right control-label">{{ __('Article') }}</label>
                <div class="col-md-6">
                    <select class="form-control" name="{{ $shoppingitem->id }}" id="{{ $shoppingitem->id }}">
                        <option value="">{{ __('Select an Article') }}</option>
                        @foreach( Auth::user()->shoppingitems as $shoppingitem )
                        <option value="{{ $shoppingitem->id }}">{{ $shoppingitem->name }}</option>
                        @endforeach

                    </select>
                </div>
            </div>
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
                <label for="name" class="col-md-4 text-md-right control-label">{{ __('Name') }}</label>
                <div class="col-md-6">
                    <input type="textarea" name ="name" id="name" class="form-control" required value="{{ old('name') ? old('name') : $shoppingitem->name }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="quantity" class="col-md-4 text-md-right control-label">{{ __('Quantity') }}</label>
                <div class="col-md-6">
                    <input type="textarea" name ="quantity" id="quantity" class="form-control" required value="{{ old('quantity') ? old('quantity') : $shoppingitem->quantity }}">
                </div>
            </div>
            <input type="submit" class="btn btn-info" value="Edit Shopping item">
            <a href="/shoppingitems/create" class="btn btn-info">{{ __('Back') }}</a>
        </form>
    </div>


    @include('/templates/footer')
</div>



@endsection
