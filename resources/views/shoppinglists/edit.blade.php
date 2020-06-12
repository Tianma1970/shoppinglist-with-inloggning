@extends('layouts/app')

@section('content')
<div class="container">
    @include('partials/status')
    <div class="jumbotron col-md-12">
        <h1 class="text-center">{{ __('Edit ') }}{{ $shoppinglist->title }}</h1>
        <form method="post" action="/shoppinglist/{{$shoppinglist->id}}/update">
            <!--We need to set a csrf token in order to send the form-->
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label for="title" class="col-md-4 text-md-right control-label">{{ __('Title') }}</label>
                <div class="col-md-6">
                    <input type="textarea" name ="title" id="quantity" class="form-control" required value="{{ old('title') ? old('title') : $shoppinglist->title }}">
                </div>
                    <input type="submit" class="btn btn-info" value="Edit Shopping list">
            </div>
        </form>
    </div>

    @include('/templates/footer')
</div>
@endsection
