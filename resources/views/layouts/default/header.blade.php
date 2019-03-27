<ul id="locale" class="dropdown-content">
    <li><a href="/locale/pt-br">Português</a></li>
    <li><a href="/locale/en">English</a></li>
</ul>

@if (\Auth::user())
<ul id="user" class="dropdown-content">
    <li><a href="/profile">{{__('Profile')}}</a></li>
    <li>
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
</ul>
@endif
<div class="parallax-container">
    <nav>
        <div class="nav-wrapper">
            <div class="container">
                <a href="/" class="brand-logo">{{ __('Fórum') }}</a>
                
                <ul class="right">
                    <a href="#" data-target="locale" class="dropdown-button dropdown-trigger">{{ __('Language') }}</a>
                </ul>
                <ul class="right">
                    @if (\Auth::user())
                        <li>
                            <a href="#" data-target="user" class="dropdown-button dropdown-trigger">{{ \Auth::user()->name }}</a>
                        </li>
                    @else
                        <li>
                            <a href="/login">{{ __('Login') }}</a>
                        </li>
                        <li>
                            <a href="/register">{{ __('Sign up') }}</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="parallax">
        <img src="/img/darkenergy.jpg" alt="">
    </div>
</div>
