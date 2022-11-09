<header id="header" class="shadow-lg ">
    <div class="container px-10 py-4 mx-auto">
        <nav class="flex items-center justify-between  z-1">
            <!-- desktop nav -->
            <div class="items-center hidden lg:text-xs xl:flex">
                <div>
                    @auth
                        <button class="btn btn-primary" href="{{ route('logout') }}">عضویت</button>
                    @else
                        {{-- <button class="mr-2 btn btn-secondary" href="{{ route('login') }}">ورود</button> --}}
                  <a class="mr-2 btn btn-secondary" href="{{ route('login') }}">ورود</a>
                    @endauth

                    @auth
                    <li><a href="my-account.html" >پروفایل</a></li>
                    <li><a href="{{ route('logout') }}">خروج</a></li>
                    @else
                    <li><a href="{{ route('login') }}">ورود</a></li>
                    <li>
                        <a href="{{ route('register') }}">ایجاد حساب</a>
                    </li>
                    @endauth
                </div>
                <div class="mr-7">
                    <ul class="flex gap-7 dark:text-white">
                        <li class="nav-item-active"><a href="#">صفحه اصلی</a></li>
                        <div x-data="dropdown">
                            <li @click="toggle" class="nav-item" :class="{ 'nav-item-active' : open }">
                                <a href="#">
                                    معاونت ها
                                    <i class="fas fa-chevron-down text-[0.7rem]"></i>
                                </a>
                            </li>
                            <div x-show="open" x-cloak
                                class="absolute px-6 py-4 bg-white border rounded-lg top-12 dark:bg-gray-800 dark:text-white">
                                <ul class="space-y-3">
                                    <li class="hover:text-indigo-600">
                                        <a href="#">معاونت عمرانی</a>
                                    </li>
                                    <li class="hover:text-indigo-600">
                                        <a href="#"> معاونت بازرگانی </a>
                                    </li>
                                    <li class="hover:text-indigo-600">
                                        <a href="#">معاونت برنامه ریزی و توسعه</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <li class="nav-item"><a href="#">هیات مدیره</a></li>
                        <li class="nav-item"><a href="#">بتن صنعت</a></li>
                        <li class="nav-item"><a href="#">هتل مروارید</a></li>
                        <li class="nav-item"><a href="#">خانه جوان</a></li>
                        <li class="nav-item"><a href="#">مزایده و مناقضه</a></li>
                        <li class="nav-item"><a href="#">دوره های آموزشی</a></li>
                        <li class="nav-item"><a href="#">پیوندها</a></li>
                        <li class="nav-item"><a href="#">تماس با ما</a></li>
                        @auth
                        {{ Auth::user()->name }}
                        @endauth
                        
                        {{-- @role('admin') --}}
                        <li class="angle-shape">
                            <a href="{{ route('dashboard') }}"> پنل ادمین </a>
                        </li>
                        {{-- @endrole --}}
                    </ul>
                </div>
            </div>
            <!-- mobile nav -->
            <div class="xl:hidden" x-data="dropdown">
                <div @click="toggle">
                    <i class="text-xl fas fa-bars dark:text-white"></i>
                </div>
                <div class="absolute w-full px-6 py-4 bg-white border rounded-lg dark:text-white dark:bg-gray-800"
                    x-show="open" x-cloak x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-90"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-90">
                    <div class="absolute" @click="open = false">
                        <i class="text-xl fas fa-times"></i>
                    </div>
                    <ul class="flex flex-col text-center gap-7">
                        <li><a href="#">صفحه اصلی</a></li>
                        <div x-data="dropdown">
                            <li @click="toggle">
                                <a href="#">
                                    محصولات
                                    <i class="fas fa-chevron-down text-[0.7rem]"></i>
                                </a>
                            </li>
                            <div x-show="open" x-cloak
                                class="px-6 py-4 mx-auto bg-white border rounded-lg max-w-max dark:text-white dark:bg-gray-800">
                                <ul class="space-y-3">
                                    <li class="hover:text-indigo-600">
                                        <a href="#">معاونت عمرانی</a>
                                    </li>
                                    <li class="hover:text-indigo-600">
                                        <a href="#"> معاونت بازرگانی </a>
                                    </li>
                                    <li class="hover:text-indigo-600">
                                        <a href="#">معاونت برنامه ریزی و توسعه</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <li class="nav-item"><a href="#">هیات مدیره</a></li>
                        <li class="nav-item"><a href="#">بتن صنعت</a></li>
                        <li class="nav-item"><a href="#">هتل مروارید</a></li>
                        <li class="nav-item"><a href="#">خانه جوان</a></li>
                        <li class="nav-item"><a href="#">مزایده و مناقضه</a></li>
                        <li class="nav-item"><a href="#">دوره های آموزشی</a></li>
                        <li class="nav-item"><a href="#">پیوندها</a></li>
                        <li class="nav-item"><a href="#">تماس با ما</a></li>
                    </ul>
                    <div class="flex flex-col gap-5 mt-5">
                      @auth
                    {{ Auth::user()->name }}
                    @endauth
                    
                    @role('admin')
                    <li class="angle-shape">
                        <a href="{{ route('dashboard') }}"> پنل ادمین </a>
                    </li>
                    @endrole

                    </div>

                   
                    </ul>
                </div>
            </div>
            <!-- logo -->
            <div class="flex">
                <div class="ml-4">
                    <button x-show="nextMode == 'dark'" x-cloak @click="toDarkMode" class="btn btn-secondary leading-0">
                        <i class="fas fa-moon"></i>
                    </button>
                    <button x-show="nextMode == 'system'" x-cloak @click="toSystemMode"
                        class="btn btn-secondary leading-0">
                        <i class="fas fa-desktop"></i>
                    </button>
                    <button x-show="nextMode == 'light'" x-cloak @click="toLightMode"
                        class="btn btn-secondary leading-0">
                        <i class="fas fa-sun"></i>
                    </button>
                </div>
                <h2 class="text-2xl font-bold dark:text-white">hmyr.ir</h2>
            </div>
        </nav>
    </div>
</header>