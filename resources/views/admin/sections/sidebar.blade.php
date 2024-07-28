<ul class="pr-0 navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('home.index') }}">
            <i class="fas fa-fw fa-home"></i>
            <span> hmyr.ir </span>
        </a>
    </li>
        <!-- Divider -->
    <hr class="my-0 sidebar-divider">

    <!-- Nav Item - Dashboard -->
    
    @can('create-article')
    @role('admin')
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNews" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-cart-plus"></i>
            <span> عملیات سازمان </span>
        </a>
        <div id="collapseNews" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
                <a class="collapse-item" href="{{ route('admin.posts.index') }}">اخبار</a>
                <a class="collapse-item" href="{{ route('admin.pictorials.index') }}">گزارش تصویری</a>
                <a class="collapse-item" href="{{ route('admin.auctions.index') }}">مزایده</a>
                <a class="collapse-item" href="{{ route('admin.level1s.index') }}">واحد های سطح اول </a>
                <a class="collapse-item" href="{{ route('admin.level2s.index') }}">واحد های سطح دوم</a>
                <a class="collapse-item" href="{{ route('admin.level3s.index') }}">واحدهای سطح سوم</a>
                <a class="collapse-item" href="{{ route('admin.modirs.index') }}"> مدیران</a>
                <a class="collapse-item" href="{{ route('admin.personnels.index') }}"> پرسنل در سایت </a>
                <a class="collapse-item" href="{{ route('admin.projects.index') }}">پروژه ها</a>
                <a class="collapse-item" href="{{ route('admin.galleries.index') }}"> کالری عکس</a>
                <a class="collapse-item" href="{{ route('admin.links.index') }}">پیوندها</a>
            </div>
        </div>
    </li>
    @endrole
    @endcan
    {{-- @role('admin') --}}
    <!-- Divider -->
    <hr class="sidebar-divider"> <!-- Heading -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-users"></i>
            <span> کاربران </span>
        </a>
        <div id="collapseUsers" class="collapse
        {{ request()->is('admin-panel/management/users*') ? 'show' : ''}}
        {{ request()->is('admin-panel/management/roles*') ? 'show' : ''}}
        {{ request()->is('admin-panel/management/permissions*') ? 'show' : ''}}
        " aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
                <a class="collapse-item {{ request()->is('admin-panel/management/users*') ? 'active' : ''}}"
                    href="{{ route('admin.users.index') }}">لیست کاربران</a>
                <a class="collapse-item {{ request()->is('admin-panel/management/roles*') ? 'active' : ''}}"
                    href="{{ route('admin.roles.index') }}">گروه های کاربری</a>
                <a class="collapse-item {{ request()->is('admin-panel/management/permissions*') ? 'active' : ''}}"
                    href="{{ route('admin.permissions.index') }}">پرمیژن ها</a>
            </div>
        </div>
    </li>

    {{-- @endrole --}}

    <hr class="sidebar-divider">

    <!-- Heading -->
    {{-- <div class="sidebar-heading">
        فروشگاه
    </div>

    <!-- Nav Item - Brand -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.brands.index') }}">
            <i class="fas fa-store"></i>
            <span> برند ها </span>
        </a>
    </li> --}}
    @can('create-article')
    {{-- @role('csdc') --}}
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-cart-plus"></i>
            <span> محصولات </span>
        </a>
        <div id="collapseProducts" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
                <a class="collapse-item" href="{{ route('admin.products.index') }}">محصولات</a>
                <a class="collapse-item" href="{{ route('admin.categories.index') }}">دسته بندی ها</a>
                <a class="collapse-item" href="{{ route('admin.attributes.index') }}">ویژگی ها</a>
                <a class="collapse-item" href="{{ route('admin.tags.index') }}">تگ ها</a>
                <a class="collapse-item" href="{{ route('admin.comments.index') }}">کامنت ها</a>
            </div>
        </div>
    </li> --}}
    {{-- @endrole --}}
    @endcan

    <!-- Divider -->
    {{-- <hr class="sidebar-divider"> --}}

    <!-- Heading -->
    {{-- <div class="sidebar-heading">
        سفارشات
    </div> --}}

    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrders" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span> سفارشات </span>
        </a>
        <div id="collapseOrders" class="collapse
        {{ request()->is('admin-panel/management/orders*') ? 'show' : ''}}
        {{ request()->is('admin-panel/management/transactions*') ? 'show' : ''}}
        {{ request()->is('admin-panel/management/coupons*') ? 'show' : ''}}
        " aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
                <a class="collapse-item {{ request()->is('admin-panel/management/orders*') ? 'active' : ''}}"
                    href="{{ route('admin.orders.index') }}">سفارشات</a>
                <a class="collapse-item {{ request()->is('admin-panel/management/transactions*') ? 'active' : ''}}"
                    href="{{ route('admin.transactions.index') }}">تراکنش ها</a>
                <a class="collapse-item {{ request()->is('admin-panel/management/coupons*') ? 'active' : ''}}"
                    href="{{ route('admin.coupons.index') }}">کوپن ها</a>
            </div>
        </div>
    </li> --}}

    <!-- Divider -->
    {{-- <hr class="sidebar-divider"> --}}

    <!-- Heading -->
    {{-- <div class="sidebar-heading">
        تنظیمات
    </div> --}}

    <!-- Nav Item - Banners -->
    {{-- <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.banners.index') }}">
            <i class="fas fa-fw fa-image"></i>
            <span> بنرها </span></a>
    </li>
<li class="nav-item active">
    <a class="nav-link" href="{{ route('logout') }}">
        <i class="fas fa-sign-in-alt"></i> <span> خروج</span>

    </a>
</li> --}}



    <!-- Divider -->
    {{-- <hr class="sidebar-divider d-none d-md-block"> --}}

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="border-0 rounded-circle" id="sidebarToggle"></button>
    </div>

</ul>