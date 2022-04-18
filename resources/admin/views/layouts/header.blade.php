<div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
    @auth
        <a href="{{ route('admin.home') }}" class="">Home</a>
        <form method="POST" action="{{ route('admin.auth.logout') }}">
            @csrf
            <a href="{{ route('admin.auth.logout') }}"
                    onclick="event.preventDefault();
                            this.closest('form').submit();">
                {{ __('Logout') }}
            </a>
        </form>
    @else
        <a href="{{ route('admin.auth.index') }}" class="">Log in</a>

        <a href="{{ route('admin.auth.register.create') }}" class="ml-4 ">Register</a>
    @endauth
    <span>admin side</span>
</div>
