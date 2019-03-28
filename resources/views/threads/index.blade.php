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
        new-thread="{{ __('New Thread') }}"
        name-title="{{ __('Title Thread') }}"
        body="{{ __('Body') }}"
        submit="{{ __('Submit') }}"
        pin="{{ __('Pin') }}"
        thread-fixed="{{ __('Thread Fixed') }}"
        close="{{ __('Close') }}"
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
