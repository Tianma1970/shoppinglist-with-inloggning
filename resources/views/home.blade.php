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

                    @if(count(Auth::user()->shoppinglists) > 0)
                    {{ __('Your Shoppinglists') }}
                    <ul>
                    @foreach(Auth::user()->shoppinglists as $shoppinglist)
                        <li>{{ $shoppinglist->title }}</li>
                    @endforeach
                    </ul>
                    @else
                    <p class="text-center">{{ __('You have no Shoppinglists yet. You can create your first one') }}<a href="/shoppinglists/create">{{ __(' here ')}}</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@include('templates/footer')
@endsection
