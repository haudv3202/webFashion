<div class="sidebar-wrapper group">
    <div id="bodyOverlay" class="w-screen h-screen fixed top-0 bg-slate-900 bg-opacity-50 backdrop-blur-sm z-10 hidden"></div>
    <div class="logo-segment">
        <a class="flex items-center" href="index.html">
            <img src="{{ asset('admin/assets/images/logo/logo-c.svg') }}" class="black_logo" alt="logo">
            <img src="{{ asset('admin/assets/images/logo/logo-c-white.svg') }}" class="white_logo" alt="logo">
            <span class="ltr:ml-3 rtl:mr-3 text-xl font-Inter font-bold text-slate-900 dark:text-white">DashCode</span>
        </a>
        <!-- Sidebar Type Button -->
        <div id="sidebar_type" class="cursor-pointer text-slate-900 dark:text-white text-lg">
          <span class="sidebarDotIcon extend-icon cursor-pointer text-slate-900 dark:text-white text-2xl">
        <div class="h-4 w-4 border-[1.5px] border-slate-900 dark:border-slate-700 rounded-full transition-all duration-150 ring-2 ring-inset ring-offset-4 ring-black-900 dark:ring-slate-400 bg-slate-900 dark:bg-slate-400 dark:ring-offset-slate-700"></div>
      </span>
            <span class="sidebarDotIcon collapsed-icon cursor-pointer text-slate-900 dark:text-white text-2xl">
        <div class="h-4 w-4 border-[1.5px] border-slate-900 dark:border-slate-700 rounded-full transition-all duration-150"></div>
      </span>
        </div>
        <button class="sidebarCloseIcon text-2xl">
            <iconify-icon class="text-slate-900 dark:text-slate-200" icon="clarity:window-close-line"></iconify-icon>
        </button>
    </div>
    <div id="nav_shadow" class="nav_shadow h-[60px] absolute top-[80px] nav-shadow z-[1] w-full transition-all duration-200 pointer-events-none
      opacity-0"></div>
    <div class="sidebar-menus bg-white dark:bg-slate-800 py-2 px-4 h-[calc(100%-80px)] overflow-y-auto z-50" id="sidebar_menus">
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('admin.slide') }}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="heroicons-outline:chat"></iconify-icon>
            <span>Quản lí slide</span>
              </span>
                </a>
            </li>
            <li>
                <a href="{{ route('categories.index') }}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="heroicons-outline:chat"></iconify-icon>
            <span>Quản Lí danh mục</span>
              </span>
                </a>
            </li>
            <li>
                <a href="{{ route('products.index') }}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="heroicons-outline:chat"></iconify-icon>
            <span>Quản Lí Sản Phẩm</span>
              </span>
                </a>
            </li>
            <li>
                <a href="{{ route('brands.index') }}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="heroicons-outline:chat"></iconify-icon>
            <span>Quản Lí nhãn hàng</span>
              </span>
                </a>
            </li>
            <li>
                <a href="{{ route('comments.index') }}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="heroicons-outline:chat"></iconify-icon>
            <span>Quản Lí bình luận</span>
              </span>
                </a>
            </li>
            <li>
                <a href="{{ route('newletter.index') }}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="heroicons-outline:chat"></iconify-icon>
            <span>Cấu hình khuyến mại </span>
              </span>
                </a>
            </li>
            <li>
                <a href="{{ route('infoNewsletter.index') }}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="heroicons-outline:chat"></iconify-icon>
            <span>Thông tin khách hàng </span>
              </span>
                </a>
            </li>
            <li>
                <a href="{{ route('comments.index') }}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class="nav-icon" icon="heroicons-outline:chat"></iconify-icon>
            <span>Quản lí đơn hàng</span>
              </span>
                </a>
            </li>
        </ul>
    </div>
</div>
