<div class="header-top-account d-flex justify-content-end">
    <div class="btn-group me-2">
        <div class="dropdown">
            <button class="btn btn-sm dropdown-toggle" type="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                Аккаунт
            </button>
            <ul class="dropdown-menu">
                @guest
                    <li>
                        <a class="dropdown-item" href="{{ route('login') }}" wire:navigate>Вход</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('register') }}" wire:navigate>Регистрация</a>
                    </li>
                @endguest

                @auth
                    <li>
                        <a class="dropdown-item" href="{{ route('account') }}" wire:navigate>Личный кабинет</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}">Выйти</a>
                    </li>
                    @if(auth()->user()->is_admin)
                        <li>
                            <a class="dropdown-item" href="{{ route('admin') }}">Админпанель</a>
                        </li>
                    @endif
                @endauth

            </ul>
        </div>
    </div>
</div>
<!-- ./header-top-account -->
