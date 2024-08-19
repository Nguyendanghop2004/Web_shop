
<nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
    <div class="logo d-flex justify-content-between">
        <a href="{{asset('assets/admin/index-2.html')}}"><img src="{{asset ('assets/admin/img/logo.png')}}" alt></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li class="mm-active">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{asset ('assets/admin/img/menu-icon/dashboard.svg')}}" alt>
                </div>
                <span>Dashboard</span>
            </a>
            <ul>
                <li><a class="active" href="index-2.html')}}">Sales</a></li>
                <li><a href="{{asset('assets/admin/index_2.html')}}">Default</a></li>
                <li><a href="{{asset('assets/admin/index_3.html')}}">Dark Menu</a></li>
            </ul>
        </li>
        <li class>
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{asset ('assets/admin/img/menu-icon/11.svg')}}" alt>
                </div>
                <span>Table</span>
            </a>
            <ul>
                <li><a href="{{route('admin.user.index')}}">User</a></li>
                <li><a href="{{route('admin.product.index')}}">San pham</a></li>
                <li><a href=" {{route('admin.catelogue.index')}}">Danh mục</a></li>
            </ul>
        </li>
       
    </ul>
</nav>