<header>
    <div id="sub-header-wrapper">
        <div class="logo">
            <a target="blank" title="Click to open website in new tab" class="text-black h4" href="/">MIRU.GE</a>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-dropdown-link title="Log out" :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('გამოსვლა') }}
            </x-dropdown-link>
        </form>
    </div>
</header>