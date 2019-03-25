@extends('layouts.default')
@section('content')
    <div class="container">
        <h3>{{ $result->title }}</h3>

        <div class="card grey ligthen-4">
            <div class="card-content">
                {{ $result->body }}
            </div>
        </div>

        <replies
            replied="{{ __('replied') }}"
            reply="{{ __('Reply') }}"
            your-answer="{{ __('Your Answer') }}"
            submit="{{ __('Submit') }}"
        >
            @include('layouts.default.preloader')
        </replies>
    </div>
@endsection

@section('scripts')
    <script src="/js/replies.js"></script>
@endsection
