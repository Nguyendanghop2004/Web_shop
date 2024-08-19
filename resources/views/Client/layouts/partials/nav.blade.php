<nav class="navbar navbar-expand-lg navbar-white">
    <a class="navbar-brand order-1" href="{{ url('index.html') }}">
        <img class="img-fluid" width="100px" src="{{ asset('assets/client/images/logo.png') }}" alt="Logo">
    </a>
    <div class="collapse navbar-collapse text-center order-lg-2 order-3" id="navigation">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Danh Mục <i class="ti-angle-down ml-1"></i>
                </a>
                <div class="dropdown-menu">
                    @foreach ($catelogue as $item)
                        <a class="dropdown-item" href="{{ route('client.create', $item->id) }}">{{ $item->name }}</a>
                    @endforeach
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('index') }}">Shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('client.listCart') }}">
                    <i class="fas fa-shopping-bag"> Giỏ hàng</i>
                </a>
            </li>
            <!-- New Link for Orders -->
            @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('client.client.showOrders') }}">Xem Đơn Hàng Đã Đặt</a>

                </li>
            @endauth
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="btn btn-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="btn btn-warning" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>
