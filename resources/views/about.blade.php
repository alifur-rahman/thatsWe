@extends('app')

@section('content')

<section class="bg-200 " id="offer">
<div class="container">
    <div class="card text-center">
        <div class="card-body">
            <h2 class="card-title" style="color: black">{{ __('messages.about_us') }}</h2>
            <p class="card-text">
                {{ __('messages.about_us_description') }}
            </p>
        </div>
    </div>
</div>
</section>

@endsection
