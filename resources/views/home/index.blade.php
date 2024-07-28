@extends('home.layouts.home')

@section('title')
    صفحه اصلی
@endsection
@section('script')
@endsection
@section('content')
    <div class="lg:mx-1 xl:mx-2 2xl:mx-16 3xl:mx-40">
        <section class='hidden'>
            <form action="{{ route('home.search') }}" method="GET">
                <input type="text" name="search" required />
                <button type="submit">Search</button>
            </form>
        </section>
        <section id="NewsOhneCarousel">
            <div id="news1" class="grid  p-1 border-gray-200 rounded-lg shadow-md border-1 bg-whie gap-x-3 gap-y-3 sm:grid_top_sm dark:bg-gray-800 dark:border-gray-700 lg:col-span-5 ">
                <div class="relative block h-32  lg:h-full overflow-hidden bg-state-600 dark:bg-gray-800 dark:border-gray-700 xs:pb-9/12 lg:pb-0 ">
                    @isset($post1)
                        <a href="{{ route('home.content', ['content' => $post1->id]) }}">
                            <img class="postimg1" src="{{ url(env('POST_IMAGES_UPLOAD_PATH') . $post1->primary_image) }}"
                                all="{{ $post1->title }}" />
                        </a>
                        <div class="absolute bottom-0 w-full py-2  bg-slate-50 dark:bg-slate-200 ">
                            <a href="{{ route('home.content', ['content' => $post1->id]) }}">
                                <h4 class="title1">
                                    {{ $post1->title }}
                                </h4>
                            </a>
                        </div>
                    </div>
                @endisset
            </div>
            <div id="news2" class=" bg-sky-50 dark:bg-gray-800 lg:col-span-8 ">
                <div id="posts2">
                    @foreach ($posts2 as $post2)
                        <div class=" border border-gray-300 rounded-lg shadow-lg dark:border-gray-700">
                            <a href="{{ route('home.content', ['content' => $post2->id, 'post2' => $post2->slug]) }}">
                                <img class="postimg2"
                                    src="{{ url(env('POST_IMAGES_UPLOAD_PATH') . $post2->primary_image) }}"
                                    all="" />
                            </a>
                            <a href="{{ route('home.content', ['content' => $post2->id, 'post2' => $post2->slug]) }}">
                                <p class="title2">
                                    {{ $post2->title }}
                                </p>
                            </a>
                            <p class=" my_abstract xs:hidden md:block">
                                {{ $post2->abstract }}</p>
                            {{-- <a href="{{ route('home.content', ['content' => $post2->id,'post2' => $post2->slug]) }}"
                                class="text-white btn_more1">
                            </a> --}}
                        </div>
                    @endforeach
                </div>
            </div>
            



            <div id="sidebar">
                @isset($pictorial->title)
                    <div id="GTasviri">
                        <p class="text-sm font-black text-center dark:text-black font-vazir">
                            گزارش تصویری
                        </p>
                    </div>
                    <a href="{{ route('home.pictorial', ['pictorial' => $pictorial]) }}">
                        <img class="object-fill  w-full h-full pt-2 mt-1 rounded-lg" data-aos-delay="200"
                            src="{{ url(env('PICTORIAL_IMAGES_UPLOAD_PATH') . $pictorial->primary_image) }}" alt="">
                    </a>
                @endisset
            </div>
        </section>
        <section id="NewsMitCarousel">
            <div class="grid gap-4 grid-cols-12">
                <div id="carousel_wrapper" class="col-span-9 ">
                    <div id="indicators-carousel" class=" w-full" data-carousel="slide">
                            <!-- Carousel wrapper -->
                        <div class="relative h-56 overflow-hidden rounded-lg md:h-56">
                            @foreach ($carousels as $carousel)
                                <!-- Item 1 -->
                                <div class="hidden duration-300 ease-in-out" data-carousel-item>
                                    <div class="grid gap-2 grid-cols-2  absolute">
                                        <div>
                                            <img class="object-cover  w-full h-full pt-2 mt-1 rounded-lg 3xl:h-14 " src="{{ url(env('POST_IMAGES_UPLOAD_PATH') . $carousel->primary_image) }}" alt="">
                                        </div>
                                        <div>
                                            <p class="title2 mt-8">
                                                {{ $carousel->title }}
                                            </p>
                                            <p class=" my_abstract xs:hidden md:block">
                                                {{ $carousel->abstract }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- Slider indicators -->
                            <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                            </div>
                            <!-- Slider controls -->
                            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                    </svg>
                                    <span class="sr-only">Previous</span>
                                </span>
                            </button>
                            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                    </svg>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-span-9 hidden">
                    <div class="grid grid-cols-12"> 
                        <div id="News1" class="grid p-1 border-gray-200 rounded-lg shadow-md border-1 bg-whie gap-x-3 gap-y-3 sm:grid_top_sm dark:bg-gray-800 dark:border-gray-700 lg:col-span-4 ">
                            <div class="relative block h-32  lg:h-full overflow-hidden bg-state-600 dark:bg-gray-800 dark:border-gray-700 xs:pb-9/12 lg:pb-0 ">
                            @isset($post1)
                                <a href="{{ route('home.content', ['content' => $post1->id]) }}">
                                    <img class="postimg1" src="{{ url(env('POST_IMAGES_UPLOAD_PATH') . $post1->primary_image) }}"
                                        all="{{ $post1->title }}" />
                                </a>
                                <div class="absolute bottom-0 w-full py-2  bg-slate-50 dark:bg-slate-200 ">
                                    <a href="{{ route('home.content', ['content' => $post1->id]) }}">
                                        <h4 class="title1">
                                            {{ $post1->title }}
                                        </h4>
                                    </a>
                                </div>
                            </div>
                            @endisset
                        </div>
                        <div id="News2" class="bg-sky-50 dark:bg-gray-800 lg:col-span-8 ">
                            <div id="posts2">
                                @foreach ($posts2 as $post2)
                                    <div class=" border border-gray-300 rounded-lg shadow-lg dark:border-gray-700">
                                        <a href="{{ route('home.content', ['content' => $post2->id, 'post2' => $post2->slug]) }}">
                                            <img class="postimg2" src="{{ url(env('POST_IMAGES_UPLOAD_PATH') . $post2->primary_image) }}" all="" />
                                        </a>
                                        <a href="{{ route('home.content', ['content' => $post2->id, 'post2' => $post2->slug]) }}">
                                            <p class="title2">
                                                {{ $post2->title }}
                                            </p>
                                        </a>
                                        <p class=" my_abstract xs:hidden md:block">
                                            {{ $post2->abstract }}
                                        </p> 
                                            {{-- <a href="{{ route('home.content', ['content' => $post2->id,'post2' => $post2->slug]) }}"
                                        class="text-white btn_more1">
                                        </a> --}}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div id="sidebar" class="col-span-3">
                    @isset($pictorial->title)
                        <div id="GTasviri">
                            <p class="text-sm font-black text-center dark:text-black font-vazir">
                                گزارش تصویری
                            </p>
                        </div>
                        <a href="{{ route('home.pictorial', ['pictorial' => $pictorial]) }}">
                            <img class="object-cover  w-full h-full pt-2 mt-1 rounded-lg xl:h-2/4" data-aos-delay="200"
                                src="{{ url(env('PICTORIAL_IMAGES_UPLOAD_PATH') . $pictorial->primary_image) }}" alt="">
                        </a>
                    @endisset
                </div>
            </div>
        </section>
        <section id="news4">
            <div id="news44">
                @foreach ($posts4 as $post4)
                    <div class="postsdiv">
                        <a href="{{ route('home.content', ['content' => $post4->id, 'post2' => $post4->slug]) }}">
                            <img id="news40img" class="h-48 w-full object-cover" src="{{ url(env('POST_IMAGES_UPLOAD_PATH') . $post4->primary_image) }}"
                                alt="" />
                        </a>
                        <div class="p-2 max-h-fit	">
                            <a href="#">
                                <p class="title2">
                                    {{ $post4->title }}
                                </p>
                            </a>
                            <p class="my_abstract">
                                {{ $post4->abstract }}
                            </p>
                            <a href="{{ route('home.content', ['content' => $post4->id, 'post2' => $post4->slug]) }}"
                                class="text-xs dark:text-white">
                                ادامه...
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <section id="AllNews">
            <div
                class="w-full h-auto mb-2 bg-gray-200 border-2 border-gray-400 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 ">
                <a href="{{ route('home.allposts') }}">
                    <p class="text-center title1 text-gray-950 dark:text-slate-300 py-2">ادامه اخبار سازمان</p>
                </a>
            </div>
        </section>
        <section id="galery"
            class="bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-sky lg:mx-16">
            <div class="py-4 mx-auto lg:w-4/5 lg:px-20">
                <div data-aos="fade-left" data-aos-delay="400" class="mb-12 text-center">
                    <h1 class="mb-5 text-2xl font-bold dark:text-white font-titr">
                        تصاویری از زیرمجموع های
                        <span class="text-indigo-600 font-titr">سازمان همیاری</span>
                    </h1>
                </div>
                <div x-data="{ tab: 'hotel' }">
                    <div class="px-2">
                        <ul class="flex justify-center mb-3 text-center dark:text-white gap-x-3 font-titr">
                            <div class="flex justify-center " :class="{ 'border-b-4 border-yellow-400': tab === 'hotel' }"
                                @click="tab = 'hotel'">
                                <li x-text="Hotel" @click="tab === 'hotel'" class="px-4 py-2 cursor-pointer"
                                    :class="'border-b-4 border-sky-600'">
                                    هتل مروارید
                                </li>
                            </div>
                            <div class="flex justify-center " :class="{ 'border-b-4 border-yellow-400': tab === 'beton' }"
                                @click="tab = 'beton'">
                                <li x-text="Beton" @click="tab === 'beton'" class="px-4 py-2 cursor-pointer"
                                    :class="'border-b-4 border-sky-600'">
                                    بتن صنعت
                                </li>
                            </div>
                            <div class="flex justify-center " :class="{ 'border-b-4 border-yellow-400': tab === 'javan' }"
                                @click="tab = 'javan'">
                                <li x-text="Javan" @click="tab === 'javan'" class="px-4 py-2 cursor-pointer"
                                    :class="'border-b-4 border-sky-600'">
                                    خانه جوان
                                </li>
                            </div>
                            <div class="flex justify-center " :class="{ 'border-b-4 border-yellow-400': tab === 'omrani' }"
                                @click="tab = 'omrani'">
                                <li x-text="omrani" @click="tab === 'omrani'" class="px-4 py-2 cursor-pointer"
                                    :class="'border-b-4 border-sky-600'">
                                    معاونت عمرانی
                                </li>
                            </div>
                        </ul>


                    </div>
                    <div x-cloak x-show="tab === 'hotel'" class="gap-x-3 gap-y-3 dark:bg-gray-900 bg-sky-300" x-transition>
                        <div
                            class="grid px-2 xs:grid-cols-1 lg:grid-cols-4 xl:grid-cols-4 md:grid-cols-2 gap-x-3 dark:bg-gray-900 bg-sky-100">
                            @foreach ($hotels as $hotel)
                                <div
                                    class="relative overflow-hidden bg-gray-200 border-2 border-gray-400 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 xl:shadow-2xl xs:pb-9/12">
                                    <a href="#">
                                        <img class="absolute object-cover w-full h-full rounded-t-lg"
                                            src="{{ url(env('GALLERY_IMAGES_UPLOAD_PATH') . $hotel->photo) }}"
                                            alt="">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div x-cloak x-show="tab === 'beton'" class="gap-x-3 gap-y-3 dark:bg-gray-900 bg-sky-100" x-transition>
                        <div
                            class="grid px-2 xs:grid-cols-1 lg:grid-cols-4 xl:grid-cols-4 md:grid-cols-2 gap-x-3 dark:bg-gray-900 bg-sky-100">
                            @foreach ($betons as $beton)
                                <div
                                    class="relative overflow-hidden bg-gray-200 border-2 border-gray-400 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 xl:shadow-2xl xs:pb-9/12">
                                    <a href="#">
                                        <img class="absolute object-cover w-full h-full rounded-t-lg"
                                            src="{{ url(env('GALLERY_IMAGES_UPLOAD_PATH') . $beton->photo) }}"
                                            alt="">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div x-cloak x-show="tab === 'javan'" class="gap-x-3 gap-y-3 dark:bg-gray-900 bg-sky-100"
                        x-transition>
                        <div
                            class="grid px-2 xs:grid-cols-1 lg:grid-cols-4 xl:grid-cols-4 md:grid-cols-2 gap-x-3 dark:bg-gray-900 bg-sky-100">
                            @foreach ($javans as $javan)
                                <div
                                    class="relative overflow-hidden bg-gray-200 border-2 border-gray-400 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 xl:shadow-2xl xs:pb-9/12">
                                    <a href=" #">
                                        <img class="absolute object-cover w-full h-full rounded-t-lg"
                                            src="{{ url(env('GALLERY_IMAGES_UPLOAD_PATH') . $javan->photo) }}"
                                            alt="">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div x-cloak x-show="tab === 'omrani'" class="gap-x-3 gap-y-3 dark:bg-gray-900 bg-sky-100"
                        x-transition>
                        <div
                            class="grid px-2 xs:grid-cols-1 lg:grid-cols-4 xl:grid-cols-4 md:grid-cols-2 gap-x-3 dark:bg-gray-900 bg-sky-100">
                            @foreach ($omrans as $omran)
                                <div
                                    class="relative overflow-hidden bg-gray-200 border-2 border-gray-400 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 xl:shadow-2xl xs:pb-9/12">
                                    <a href="#">
                                        <img class="absolute object-cover w-full h-full rounded-t-lg"
                                            src="{{ url(env('GALLERY_IMAGES_UPLOAD_PATH') . $omran->photo) }}"
                                            alt="">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="service">
            <div style="height: 100px; overflow: hidden" class="dark:hidden">
                <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%">
                    <path class="fill-gray-100 dark:fill-gray-800"
                        d="M-37.02,164.10 C328.66,20.03 595.03,10.16 618.74,-65.81 L500.00,150.00 L0.00,150.00 Z"></path>
                </svg>
            </div>
            <section class="bg-gray-100 dark:bg-gray-800">
                <div class="px-10 py-4 mx-auto lg:w-4/5 lg:px-20">
                    <div data-aos="fade-up" class="mb-12 text-center">
                        <p class="mb-6 leading-8 text-gray-700 dark:text-white font-vazir">فعالیت های <span
                                class="px-1 text-indigo-600 font-vazir">توليدي</span> <Span
                                class="px-1 text-indigo-600 font-vazir">هتل داری
                            </Span><Span class="px-1 text-indigo-600 font-vazir">بازرگانی</Span>
                        </p>
                    </div>
                    <div data-aos="zoom-in" data-aos-delay="400"
                        class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-3 dark:text-white">
                        <div class="flex">
                            <div>
                                <i
                                    class="fas fa-cogs text-[2rem] p-4 rounded-full border border-1 border-indigo-600 text-indigo-600"></i>
                            </div>
                            <p>
                            <ul class="mr-5 font-vazir">
                                <li>اجرای راهسازی، زیر سازی راه آهن و باند فرودگاه</li>
                                <li>اجرای شبکه های آبیاری و زهکشی</li>
                                <li>اجرای پل سازی</li>
                            </ul>
                            </p>
                        </div>
                        <div class="flex">
                            <div>
                                <i
                                    class="fas fa-drafting-compass text-[2rem] p-4 rounded-full border border-1 border-indigo-600 text-indigo-600"></i>
                            </div>
                            <ul class="mr-5 font-vazir">
                                <li>احداث طرحهای آبخیزداری</li>
                                <li>احداث پارکها و مراکز تفریحی</li>
                                <li>احداث مجتمع های ساختمانی</li>
                                <li>تولید پلهای تی شکل، دیوار های پیش ساخته</li>
                            </ul>
                        </div>
                        <div class="flex">
                            <div>
                                <i
                                    class="fas fa-users-cog text-[2rem] p-4 rounded-full border border-1 border-indigo-600 text-indigo-600"></i>
                            </div>
                            <ul class="mr-5 font-vazir">
                                <li> تولید انواع لوله های مسلح و غیر مسلح</li>
                                <li>تولید انواع بلوک، انواع جداول در سایز های مختلف</li>
                                <li>تولید سنگفرشهای بتنی، دال بتنی، باکس های بتنی</li>
                            </ul>
                        </div>
                        <div class="flex">
                            <div>
                                <i
                                    class="fas fa-handshake text-[2rem] p-4 rounded-full border border-1 border-indigo-600 text-indigo-600"></i>
                            </div>
                            <ul class="mr-5 font-vazir">
                                <li>انواع فعالیت های بازرکانی</li>
                                <li>واردات </li>
                                <li>صادرات</li>
                            </ul>
                        </div>
                        <div class="flex">
                            <div>
                                <i
                                    class="fas fa-truck-monster text-[2rem] p-4 rounded-full border border-1 border-indigo-600 text-indigo-600"></i>
                            </div>
                            <ul class="mr-5 font-vazir">
                                <li>انواع ماشین آلات سنگین و سبک</li>
                                <li> </li>
                                <li></li>
                            </ul>
                        </div>
                        <div class="flex">
                            <div>
                                <i
                                    class="fas fa-hotel text-[2rem] p-4 rounded-full border border-1 border-indigo-600 text-indigo-600"></i>
                            </div>
                            <ul class="mr-5 font-vazir">
                                <li>هتل مروارید با انواع اتاق های مجهز جهت اقامت</li>
                                <li>پذیرای از مراسم و جشن ها با سالن های پذیرایی بزرگ و زیبا</li>
                                <li>کافی شاپ</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <div style="height: 100px; overflow: hidden" class="dark:hidden">
                <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%">
                    <path class="fill-gray-100 dark:fill-gray-800"
                        d="M-12.19,148.31 C145.82,120.69 576.41,-24.36 565.12,-20.42 L499.66,-2.66 L0.00,0.00 Z"></path>
                </svg>
            </div>
        </section>
        <section id="price"
            class="bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 hidden">
            <div class="px-5 py-4 mx-auto lg:w-4/5 lg:px-20">
                <div data-aos="fade-up" class="mb-12 text-center">
                    <h1 class="mb-5 text-2xl font-bold dark:text-white font-vazir">
                        هتل مروارید
                        <span class="text-indigo-600 font-vazir">ارومیه</span>
                    </h1>
                    <p class="mb-6 leading-8 text-gray-700 dark:text-white font-vazir">
                        هتل مروارید ارومیه در کنار رودخانه شهر چائی ارومیه و با داشتن اتاق ها و
                        رستورانهایی با چشم اندازهای زیبا و انواع غذاهای ایرانی و فرنگی آماده پذیرای از مهمانان می باشد.
                    </p>
                </div>
                <div class="flex flex-col justify-between gap-8 lg:flex-row">
                    <div data-aos="flip-right" data-aos-delay="600"
                        class="px-20 py-5 text-center border border-t-8 border-indigo-600 rounded-lg dark:bg-gray-800 dark:text-white">
                        <div class="py-5">
                            <h1 class="text-xl font-bold font-vazir">اتاق تک خوابه</h1>
                            <p class="my-6">
                                <span class="text-2xl font-bold font-vazir">250,000</span> تومان
                            </p>
                            <p class="font-bold text-gray-700 dark:text-white font-vazir">امکانات اتاق</p>
                        </div>
                        <hr />
                        <div class="py-5 space-y-4 font-vazir">
                            <p class="">حمام و دستشویی </p>
                            <p>تلویزیون</p>
                            <p>یخچال</p>
                            <p>میز تحریر</p>
                            <p>سیستم تهویه مرکزی</p>
                        </div>
                        <div class="py-4">
                            <button class="btn btn-primary font-vazir">رزرو اتاق</button>
                        </div>
                    </div>
                    <div data-aos="flip-right" data-aos-delay="400"
                        class="px-20 py-5 text-center text-white bg-indigo-600 border border-t-8 border-indigo-600 rounded-lg">
                        <div class="py-5 font-vazir">
                            <h1 class="text-2xl font-bold">اتاق دوتخته</h1>
                            <p class="my-6">
                                <span class="text-2xl font-bold font-vazir">150,000</span> تومان
                            </p>
                            <p class="font-bold">ماهانه</p>
                        </div>
                        <hr />
                        <div class="py-5 space-y-4 font-vazir">
                            <p class="">حمام و دستشویی </p>
                            <p>تلویزیون</p>
                            <p>یخچال</p>
                            <p>میز تحریر</p>
                            <p>سیستم تهویه مرکزی</p>
                        </div>
                        <div class="py-4 font-vazir">
                            <button class="btn btn-secondary">رزرو اتاق</button>
                        </div>
                    </div>
                    <div data-aos="flip-right" data-aos-delay="600"
                        class="px-20 py-5 text-center border border-t-8 border-indigo-600 rounded-lg dark:bg-gray-800 dark:text-white">
                        <div class="py-5 font-vazir">
                            <h1 class="text-xl font-bold">اتاق سه خوابه</h1>
                            <p class="my-6">
                                <span class="text-2xl font-bold">450,000</span> تومان
                            </p>
                            <p class="font-bold text-gray-700 dark:text-white">امکانات اتاق</p>
                        </div>
                        <hr />
                        <div class="py-5 space-y-4 font-vazir">
                            <p class="">حمام و دستشویی </p>
                            <p>تلویزیون</p>
                            <p>یخچال</p>
                            <p>میز تحریر</p>
                            <p>سیستم تهویه مرکزی</p>
                        </div>
                        <div class="py-4 font-vazir">
                            <button class="btn btn-primary">رزرو اتاق</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <button id="to-top-button" onclick="goToTop()" title="برو بالا" 
            class="hidden fixed z-50 bottom-10 right-10 p-4 border-0 w-14 h-14 rounded-full shadow-md bg-gray-400 hover:bg-gray-100 text-gray-700 text-lg font-semibold transition-colors duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
            <path d="M12 4l8 8h-6v8h-4v-8H4l8-8z" />
            </svg>
            <span class="sr-only">برو بالا</span>
        </button>
    </div>
@endsection
