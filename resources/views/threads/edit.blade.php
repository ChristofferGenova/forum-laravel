@extends('layouts.default')
@section('content')
    <div class="container">
        <h3>{{ $thread->title }}</h3>

        <div class="card grey lighten-4">
            <div class="card-content">
                <form action="/threads/{{ $thread->id }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="input-field">
                        <input type="text" placeholder="{{ __('New Thread') }}" name="title" value="{{ $thread->title }}">
                    </div>

                    <div class="input-field">
                        <textarea id="idInputBodyThread" cols="30" rows="10" class="materialize-textarea" placeholder="{{ __('Body') }}" name="body">{{ $thread->body }}</textarea>
                    </div>

                    <button type="submit" class="btn red accent-2">{{ __('Submit') }}</button>
                </form>
            </div>
            <div class="card-action">
                <a href="/threads/{{ $thread->id }}">{{ __('Back') }}</a>
            </div>
        </div>

    </div>
@endsection
