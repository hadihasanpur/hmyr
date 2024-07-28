<header id="header" class="shadow-lg dark:bg-gray-800 dark:border-gray-700 ">
    <div class=" container border-1 dark:border-gray-700 mx-auto px-8 rounded-lg ">
        
        <nav class="flex items-center justify-between z-1">
            
            <!-- desktop nav -->
            <div class="items-center lg:text-xs xl:flex xs:hidden ">
                <img class="rounded-full" style="width: 3.5rem;height: 3.5rem" src="{{ asset('images/hmyr_arm200.png') }}">
                <div class="mr-7">
                    <ul class="flex text-base gap-7 dark:text-white font-titr">
                        <li class="nav-item-active font-titr"><a href="{{ route('home.index') }}">صفحه اصلی</a></li>
                        <div id="chart" x-data="dropdown" class="hidden">
                            <li @click="toggle" @click.outside="open = false" @keyup.escape="open = false"
                                class="nav-item font-titr" :class="{ 'nav-item-active': open }">
                                <a href="#">
                                    چارت  سازمان
                                    <i class="fas f@click.outside="open=false"a-chevron-down text-[0.7rem]"></i>
                                </a>
                            </li>
                            <div x-show="open" x-cloak
                                class="absolute px-6 py-4 bg-white border rounded-lg top-12 dark:bg-gray-800 dark:text-white">
                                <ul x-data="dropdown" class="space-y-3 ">
                                    @isset($menu)
                                        @foreach ($menu as $menuItem)
                                            <li class="hover:text-indigo-600 dark:bg-gray-800 dark:text-white">
                                                <a href="{{ route('home.level1', ['level1' => $menuItem]) }}">
                                                    <h3
                                                        class="w-full mb-3 text-sm top-10 font-titr hover:text-indigo-600">
                                                        {{ $menuItem->name }}
                                                    </h3>
                                                </a>
                                            </li>
                                            @if (!$menuItem->level2s->isEmpty())
                                                <ul class="">
                                                    @foreach ($menuItem->level2s as $level2)
                                                        <li class="hover:text-indigo-600 text-sm">
                                                            <a
                                                                href="{{ route('home.level2', ['level2' => $level2->id, $level2->slug]) }}">
                                                                <h4
                                                                    class="w-full mb-3 text-sm font-normal text-slate-900 top-10 font-titr indent-8 dark:text-white hover:text-indigo-600">
                                                                    {{ $level2->name }}
                                                                </h4>
                                                            </a>
                                                            <ul class="">
                                                                @foreach ($level2->level3s as $level3)
                                                                    <li class="hover:text-indigo-600 ">
                                                                        <a
                                                                            href="{{ route('home.level3', ['level3' => $level3->id, $level3->slug]) }}">
                                                                            <h4
                                                                                class="w-full mb-3 text-sm font-normal text-slate-900 dark:text-white top-10 font-titr indent-20 hover:text-indigo-600 font-titr">
                                                                                {{ $level3->name }}
                                                                            </h4>
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        @endforeach
                                    @endisset
                                </ul>
                            </div>
                        </div>
                        <li class="nav-item font-titr"><a href="{{ route('home.auctions') }}">مزایده و مناقضه</a></li>
                        <li class="nav-item font-titr hidden"><a href="{{ route('home.projects') }}"> پروژه ها  </a></li>
                        <li class="nav-item font-titr hidden"><a href="{{ route('home.links') }}">پیوندها</a></li>
                        <li class="nav-item font-titr"><a href="{{ route('home.contactus') }}">تماس با ما</a></li>
                        @role('admin')
                            <li class="angle-shape font-titr">
                                <a href="{{ route('dashboard') }}"> پیش خوان</a>
                            </li>
                        @endrole
                    </ul>
                </div>
            </div>
            <!-- mobile nav -->
            <div class="xl:hidden" x-data="dropdown">
                <div @click="toggle">
                    <i class="text-xl fas fa-bars dark:text-white"></i>
                </div>
                <div class="absolute w-full px-6 bg-white border rounded-lg dark:text-white dark:bg-gray-800"
                    x-show="open" x-cloak x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-90"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-90">
                    <div class="absolute" @click="open = false">
                        <i class="text-xl fas fa-times"></i>
                    </div>
                    <ul class="flex flex-col text-center gap-7 dark:text-slate-100">
                        <li class="nav-item-active font-titr"><a href="{{ route('home.index') }}">صفحه اصلی</a></li>
                        <div id="chart" x-data="dropdown" class="hidden">
                            <li @click="toggle" @click.outside="open = false" @keyup.escape="open = false"
                                class="nav-item font-titr dark:text-slate-100" :class="{ 'nav-item-active': open }">
                                <a href="#">
                                    چارت  سازمان
                                    <i class="fas f@click.outside="open=false"a-chevron-down text-[0.7rem]"></i>
                                </a>
                            </li>
                            <div x-show="open" x-cloak
                                class="absolute px-6 py-4 bg-white border rounded-lg top-12 dark:bg-gray-800 dark:text-white">
                                <ul x-data="dropdown" class="space-y-3">
                                    @isset($menu)
                                        @foreach ($menu as $menuItem)
                                            <li class="hover:text-indigo-600 dark:bg-gray-800 dark:text-white text-slate-950">
                                                <a href="{{ route('home.level1', ['level1' => $menuItem]) }}">
                                                    <h3
                                                        class="w-full mb-3 text-base font-black text-white top-10 font-titr hover:text-indigo-600">
                                                        {{ $menuItem->name }}
                                                    </h3>
                                                </a>
                                            </li>
                                            @if (!$menuItem->level2s->isEmpty())
                                                <ul class="">
                                                    @foreach ($menuItem->level2s as $level2)
                                                        <li class="hover:text-indigo-600 text-sm ">
                                                            <a href="{{ route('home.level2', ['level2' => $level2]) }}">
                                                                <h4
                                                                    class="w-full mb-3 text-sm font-normal text-slate-100 top-10 font-titr indent-8">
                                                                    {{ $level2->name }}
                                                                </h4>
                                                            </a>
                                                            <ul class="">
                                                                @foreach ($level2->level3s as $level3)
                                                                    <li class="hover:text-indigo-300 ">
                                                                        <a
                                                                            href="{{ route('home.level3', ['level3' => $level3->id, $level3->slug]) }}">
                                                                            <h4
                                                                                class="w-full mb-3 text-xs font-normal text-slate-300 top-10 font-titr indent-20 hover:text-indigo-600">
                                                                                {{ $level3->name }}
                                                                            </h4>
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        @endforeach
                                    @endisset
                                </ul>
                            </div>
                        </div>
                        <li class="nav-item font-titr"><a href="{{ route('home.auctions') }}">مزایده و مناقضه</a></li>
                        <li class="nav-item font-titr"><a href="{{ route('home.projects') }}"> پروژه ها  </a></li>
                        <li class="nav-item font-titr"><a href="{{ route('home.links') }}">پیوندها</a></li>
                        <li class="nav-item font-titr"><a href="{{ route('home.contactus') }}">تماس با ما</a></li>
                    </ul>
                    <div class="flex flex-col gap-5 mt-5">

                        @role('Admin')
                            <li class="angle-shape">
                                <a href="{{ route('dashboard') }}">  پیشخوان </a>
                            </li>
                        @endrole

                    </div>


                    </ul>
                </div>
            </div>
            <!-- logo -->
            <form action="{{ route('home.search') }}" method="GET">
     <div class="xs:hidden md:flex mx-auto text-gray-600">
        <input class="border-2 border-gray-300 bg-white h-8 px-2 pr-8 rounded-lg text-sm focus:outline-none"
          type="search" name="search" placeholder="جستجو">
        <button type="submit" class=" right-0 top-0">
          <svg class="text-gray-800 h-4 w-4 fill-current dark:fill-white" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
            viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
            width="512px" height="512px">
            <path
              d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
          </svg>
        </button>
      </div>
            </form>
            <div class="xs:hidden md:flex xs:mb-4 md:mb-1 xs:hidden">
                @auth
                    <a href="{{ route('profile') }}"><img class="rounded-full" style="width: 40px;height: 40px"
                            src="{{ url(env('PROFILE_IMAGES_UPLOAD_PATH') . Auth::user()->profile_photo_path) }}">
                    </a>
                    <button class="mr-2 btn btn-secondary text-sm font-vazir"> <a href="{{ route('logout') }}">خروج</a> </button>
                @else
                    <button class="mr-2 btn btn-secondary xs:text-xs xs:mb-4 mt-5"> <a
                            href="{{ route('login') }}">ورود</a></button>
                    <button class="mr-2 btn btn-primary xs:text-xs xs:mb-4 mt-5 hidden"> <a
                            href="{{ route('register') }}">عضویت</a></button>
                @endauth
            </div>
            <div class="flex">
                <div class="ml-4 xs:mb-4 mt-5">
                    <button x-show="nextMode == 'dark'" x-cloak @click="toDarkMode"
                        class="btn btn-secondary leading-0">
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
            </div>
        </nav>
        
    </div>
</header>
