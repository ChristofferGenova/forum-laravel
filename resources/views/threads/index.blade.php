@extends('layouts.default')
@section('content')
<div class="container">
    <h3>{{ __('Most recent threads') }}</h3>
    <threads
        title="{{ __('Threads') }}"
        threads="{{ __('Threads') }}"
        replies="{{ __('Replies') }}"
        action="{{ __('Action') }}"
        open="{{ __('Open') }}"
    >
        @include('layouts.default.preloader')
    </threads>

</div>
@endsection

@section('scripts')
<div id="app">
    <script src="/js/threads.js"></script>
</div>
@endsection
