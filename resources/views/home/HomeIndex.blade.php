<!DOCTYPE html>
<html x-data="darkMode" lang="fa" dir="rtl" :class="{ 'dark' : darkMode }">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>سازمان همیاری</title>

  <script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="./dist/style.css" />
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <style></style>
</head>

<body class="font-vazir dark:bg-gray-900">
  <div class="mx-auto grid_container sm:grid_container_sm md:grid_container_md lg:grid_container_lg">
    <header id="header" class="shadow-lg ">
      <div class="container px-10 py-4 mx-auto">
        <nav class="flex items-center justify-between  z-1">
          <!-- desktop nav -->
          <div class="items-center hidden lg:text-xs xl:flex">
            <div>
              <button class="btn btn-primary">عضویت</button>
              <button class="mr-2 btn btn-secondary">ورود</button>
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
                <button class="btn btn-primary">عضویت</button>
                <button class="mr-2 btn btn-secondary">ورود</button>
              </div>
            </div>
          </div>
          <!-- logo -->
          <div class="flex">
            <div class="ml-4">
              <button x-show="nextMode == 'dark'" x-cloak @click="toDarkMode" class="btn btn-secondary leading-0">
                <i class="fas fa-moon"></i>
              </button>
              <button x-show="nextMode == 'system'" x-cloak @click="toSystemMode" class="btn btn-secondary leading-0">
                <i class="fas fa-desktop"></i>
              </button>
              <button x-show="nextMode == 'light'" x-cloak @click="toLightMode" class="btn btn-secondary leading-0">
                <i class="fas fa-sun"></i>
              </button>
            </div>
            <h2 class="text-2xl font-bold dark:text-white">hmyr.ir</h2>
          </div>
        </nav>
      </div>
    </header>

    <section id="fnew" class="rounded-lg md:grid_fnew">
      <div id="content"
        class="grid bg-white border border-gray-200 rounded-lg shadow-md md:grid-cols-2 dark:bg-gray-800 dark:border-gray-700 gap-x-3 gap-y-3 sm:grid_top_sm">
        <div  id="TopPost" class="">
          <div id="topimg" class="relative overflow-hidden">
            <img class="object-cover w-full" src="https://hmyr.ir//backend/web/uploads/991228%20(8).jpeg"
              alt="Flower and sky" />
            <div class="absolute bottom-0 left-0 w-full px-6 overflow-hidden bg-slate-600">
              <h4 class="w-full mb-3 text-xl font-semibold text-white top-10 tracking-tigh">مجمع عمومی عادی سالیانه
                سازمان همیاری برگزار شد</h4>
            </div>
          </div>
        </div>
        <div class="grid grid-rows-2 ">
          <div id="2new" class="sm:grid md:flex">
            <div>
              <img class="object-cover w-full mt-4" src="https://hmyr.ir//backend/web/uploads/981009h.jpg"
                alt="Flower and sky" />
            </div>
            <div>
              <p class="px-4 mt-4 font-normal leading-6 text-justify text-gray-700 dark:text-gray-400 indent-16">
                دومین متن خبری سایت باید از نظر ظاهری در بهترین مکان سایت قرار داشته باشد.سرلشکر باقری در این
                بازدید در جریان آخرین توانمندی‌ها در حوزه تولید انواع پهپادهای نظامی، تهاجمی و دوربرد ارتش قرار گرفت</p>
            </div>
          </div>
          <div id="3new" class="sm:grid md:flex">
            <div>
              <img class="object-cover w-full" src="https://hmyr.ir//backend/web/uploads/981009f.jpg"
                alt="Flower and sky" />
            </div>
            <div>
              <p class="px-4 mt-2 mb-3 font-normal leading-6 text-justify text-gray-700 dark:text-gray-400 indent-16">
                سرلشکر محمد
                باقری رئیس
                ستاد کل نیروهای
                سومین متن خبری سایت باید از نظر ظاهری در بهترین مکان سایت قرار داشته باشد.سرلشکر باقری در این
                بازدید در جریان آخرین توانمندی‌ها در حوزه تولید انواع پهپادهای نظامی، تهاجمی و دوربرد ارتش قرار گرفت</p>
            </div>

          </div>
        </div>
      </div>
      <div id="sidebar"
        class="mx-2 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 md:hidden lg:grid md:grid_top_sm">
        <div class="">
          <img class="content-center object-cover px-6 mx-auto mt-2 rounded-lg shadow-lg" data-aos="fade-down"
            data-aos-delay="400" src="https://hmyr.ir//backend/web/images/bahari.jpg" all="33" />
          <p class="px-4 mt-4 text-center text-gray-700 dark:text-white">
            محمود اسکندری سرهنگ‌دوم خلبان اف-۴ فانتوم ۲ نیروی هوایی ارتش
          </p>
        </div>
      </div>
    </section>

    <section id="new">
      <div class="grid grid-cols-1 px-2 lg:grid-cols-4 md:grid-cols-2 gap-x-3 gap-y-3 dark:bg-gray-900">
        <div
          class="bg-white border border-gray-200 rounded-lg shadow-md lg:lg:max-w-sm dark:bg-gray-800 dark:border-gray-700">
          <a href="#">
            <img class="rounded-t-lg" src="https://hmyr.ir//backend/web/uploads/981009e.jpg" alt="">
          </a>
          <div class="p-5">
            <a href="#">
              <h5 class="mb-2 font-bold tracking-tight text-center text-gray-900 text-1xl dark:text-white"> بازدید
                پرسنل
                سازمان
                از مناظر زیبای اروپای مرکزی
              </h5>
            </a>
            <p class="mb-3 font-normal leading-6 text-justify text-gray-700 dark:text-gray-400 indent-16">سرلشکر محمد
              باقری رئیس
              ستاد کل نیروهای
              مسلح از یکی از
              پایگاه‌های سری و زیرزمینی پهپادی ارتش جمهوری اسلامی ایران بازدید کرد.سرلشکر باقری در این بازدید در جریان
              آخرین
              توانمندی‌ها در حوزه تولید انواع پهپادهای نظامی، تهاجمی و دوربرد ارتش قرار گرفت..</p>
            <a href="#"
              class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              ادامه</a>
          </div>
        </div>

        <div
          class="bg-white border border-gray-200 rounded-lg shadow-md lg:max-w-sm dark:bg-gray-800 dark:border-gray-700">
          <a href="#">
            <img class="rounded-t-lg" src="https://hmyr.ir//backend/web/uploads/981009h.jpg" alt="">
          </a>
          <div class="p-5">
            <a href="#">
              <h5 class="mb-2 font-bold tracking-tight text-center text-gray-900 text-1xl dark:text-white"> بازدید
                سرلشکر باقری
                از
                پهیاد های
                ارتش
              </h5>
            </a>
            <p class="mb-3 font-normal leading-6 text-justify text-gray-700 dark:text-gray-400 indent-16">سرلشکر محمد
              باقری رئیس
              ستاد کل نیروهای
              مسلح از یکی از
              پایگاه‌های سری و زیرزمینی پهپادی ارتش جمهوری اسلامی ایران بازدید کرد.سرلشکر باقری در این بازدید در جریان
              آخرین
              توانمندی‌ها در حوزه تولید انواع پهپادهای نظامی، تهاجمی و دوربرد ارتش قرار گرفت..</p>
            <a href="#"
              class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-indigo-600 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              ادامه</a>
          </div>
        </div>

        <div
          class="bg-white border border-gray-200 rounded-lg shadow-md lg:max-w-sm dark:bg-gray-800 dark:border-gray-700">
          <a href="#">
            <img class="rounded-t-lg" src="https://hmyr.ir//backend/web/uploads/980828e.jpg" alt="">
          </a>
          <div class="p-5">
            <a href="#">
              <h5 class="mb-2 font-bold tracking-tight text-center text-gray-900 text-1xl dark:text-white"> بازدید
                سرلشکر باقری
                از
                پهیاد های
                ارتش
              </h5>
            </a>
            <p class="mb-3 font-normal leading-6 text-justify text-gray-700 dark:text-gray-400 indent-16">سرلشکر محمد
              باقری رئیس
              ستاد کل نیروهای
              مسلح از یکی از
              پایگاه‌های سری و زیرزمینی پهپادی ارتش جمهوری اسلامی ایران بازدید کرد.سرلشکر باقری در این بازدید در جریان
              آخرین
              توانمندی‌ها در حوزه تولید انواع پهپادهای نظامی، تهاجمی و دوربرد ارتش قرار گرفت..</p>
            <a href="#"
              class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-indigo-600 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              ادامه</a>
          </div>
        </div>

        <div
          class="bg-white border border-gray-200 rounded-lg shadow-md lg:max-w-sm dark:bg-gray-800 dark:border-gray-700">
          <a href="#">
            <img class="rounded-t-lg" src="https://hmyr.ir//backend/web/uploads/980828h.jpg" alt="">
          </a>
          <div class="p-5">
            <a href="#">
              <h5 class="mb-2 font-bold tracking-tight text-center text-gray-900 text-1xl dark:text-white"> بازدید
                سرلشکر باقری
                از
                پهیاد های ارتش
              </h5>
            </a>
            <p class="mb-3 font-normal leading-6 text-justify text-gray-700 dark:text-gray-400 indent-16">سرلشکر محمد
              باقری رئیس
              ستاد کل نیروهای
              مسلح از یکی از پایگاه‌های سری و زیرزمینی پهپادی ارتش جمهوری اسلامی ایران بازدید کرد.سرلشکر باقری در این
              بازدید در جریان آخرین توانمندی‌ها در حوزه تولید انواع پهپادهای نظامی، تهاجمی و دوربرد ارتش قرار گرفت..
            </p>
            <a href="#"
              class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-indigo-600 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              ادامه</a>
          </div>
        </div>
      </div>
    </section>

    <section id="service">
      <div style="height: 100px; overflow: hidden">
        <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%">
          <path class="fill-gray-100 dark:fill-gray-800"
            d="M-37.02,164.10 C328.66,20.03 595.03,10.16 618.74,-65.81 L500.00,150.00 L0.00,150.00 Z"></path>
        </svg>
      </div>
      <section class="bg-gray-100 dark:bg-gray-800">
        <div class="container px-10 py-4 mx-auto lg:w-4/5 lg:px-20">
          <div data-aos="fade-up" class="mb-12 text-center">
            <h1 class="mb-5 text-2xl font-bold dark:text-white">
              سازمان همیاری
              <span class="text-indigo-600">شهرداریهای استان آذربایجان غربی</span>
            </h1>
            <p class="mb-6 leading-8 text-gray-700 dark:text-white">فعالیت های <span
                class="px-1 text-indigo-600">توليدي</span> <Span class="px-1 text-indigo-600">هتل داری </Span><Span
                class="px-1 text-indigo-600">بازرگانی</Span>

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
              <ul class="mr-5">
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
              <ul class="mr-5">
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
              <ul class="mr-5">
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
              <ul class="mr-5">
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
              <ul class="mr-5">
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
              <ul class="mr-5">
                <li>هتل مروارید با انواع اتاق های مجهز جهت اقامت</li>
                <li>پذیرای از مراسم و جشن ها با سالن های پذیرایی بزرگ و زیبا</li>
                <li>کافی شاپ</li>

              </ul>
            </div>
          </div>
        </div>
      </section>
      <div style="height: 100px; overflow: hidden">
        <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%">
          <path class="fill-gray-100 dark:fill-gray-800"
            d="M-12.19,148.31 C145.82,120.69 576.41,-24.36 565.12,-20.42 L499.66,-2.66 L0.00,0.00 Z"></path>
        </svg>
      </div>
    </section>

    <section id="price"
      class="bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
      <div class="container px-10 py-4 mx-auto lg:w-4/5 lg:px-20">
        <div data-aos="fade-up" class="mb-12 text-center">
          <h1 class="mb-5 text-2xl font-bold dark:text-white">
            هتل مروارید
            <span class="text-indigo-600">ارومیه</span>
          </h1>
          <p class="mb-6 leading-8 text-gray-700 dark:text-white">
            هتل مروارید ارومیه در کنار رودخانه شهر چائی ارومیه و با داشتن اتاق ها و
            رستورانهایی با چشم اندازهای زیبا و انواع غذاهای ایرانی و فرنگی آماده پذیرای از مهمانان می باشد.
          </p>
        </div>

        <div class="flex flex-col justify-between gap-8 lg:flex-row">
          <div data-aos="flip-right" data-aos-delay="600"
            class="px-20 py-5 text-center border border-t-8 border-indigo-600 rounded-lg dark:bg-gray-800 dark:text-white">
            <div class="py-5">
              <h1 class="text-xl font-bold">اتاق تک خوابه</h1>
              <p class="my-6">
                <span class="text-2xl font-bold">250,000</span> تومان
              </p>
              <p class="font-bold text-gray-700 dark:text-white">امکانات اتاق</p>
            </div>
            <hr />
            <div class="py-5 space-y-4">
              <p class="">حمام و دستشویی </p>
              <p>تلویزیون</p>
              <p>یخچال</p>
              <p>میز تحریر</p>
              <p>سیستم تهویه مرکزی</p>
            </div>
            <div class="py-4">
              <button class="btn btn-primary">رزرو اتاق</button>
            </div>
          </div>

          <div data-aos="flip-right" data-aos-delay="400"
            class="px-20 py-5 text-center text-white bg-indigo-600 border border-t-8 border-indigo-600 rounded-lg">
            <div class="py-5">
              <h1 class="text-2xl font-bold">اتاق دوتخته</h1>
              <p class="my-6">
                <span class="text-2xl font-bold">150,000</span> تومان
              </p>
              <p class="font-bold">ماهانه</p>
            </div>
            <hr />
            <div class="py-5 space-y-4">
              <p class="">حمام و دستشویی </p>
              <p>تلویزیون</p>
              <p>یخچال</p>
              <p>میز تحریر</p>
              <p>سیستم تهویه مرکزی</p>
            </div>
            <div class="py-4">
              <button class="btn btn-secondary">رزرو اتاق</button>
            </div>
          </div>

          <div data-aos="flip-right" data-aos-delay="600"
            class="px-20 py-5 text-center border border-t-8 border-indigo-600 rounded-lg dark:bg-gray-800 dark:text-white">
            <div class="py-5">
              <h1 class="text-xl font-bold">اتاق سه خوابه</h1>
              <p class="my-6">
                <span class="text-2xl font-bold">450,000</span> تومان
              </p>
              <p class="font-bold text-gray-700 dark:text-white">امکانات اتاق</p>
            </div>
            <hr />
            <div class="py-5 space-y-4">
              <p class="">حمام و دستشویی </p>
              <p>تلویزیون</p>
              <p>یخچال</p>
              <p>میز تحریر</p>
              <p>سیستم تهویه مرکزی</p>
            </div>
            <div class="py-4">
              <button class="btn btn-primary">رزرو اتاق</button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="galery"
      class="bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
      <div class="container px-10 py-4 mx-auto lg:w-4/5 lg:px-20">
        <div data-aos="fade-left" data-aos-delay="400" class="mb-12 text-center">
          <h1 class="mb-5 text-2xl font-bold dark:text-white">
            تصاویری از زیرمجموع های
            <span class="text-indigo-600">سازمان همیاری</span>
          </h1>
          <p class="mb-6 leading-8 text-gray-700 dark:text-white">
            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
            استفاده از طراحان گرافیک است.
          </p>
        </div>

        <div data-aos="fade-up" x-data="tabs">
          <ul class="flex justify-center dark:text-white">
            <template x-for="(tab , index) in tabs" :key="index">
              <li x-text="tab.display_category" @click="tabName = tab.category" class="px-4 py-2 cursor-pointer"
                :class="tabName == tab.category && 'border-b-4 border-indigo-600'"></li>
            </template>
          </ul>
          <template x-for="(tab , index) in tabs" :key="index">
            <div x-show="tab.category == tabName" class="grid grid-cols-1 gap-5 mt-5 sm:grid-cols-2 lg:grid-cols-3">
              <template x-for="(image , index) in tab.images" :key="index">
                <div>
                  <img class="rounded-lg" :src="image" alt="" />
                </div>
              </template>
            </div>
          </template>
        </div>
      </div>
    </section>

    <section id="footer">
      <div style="height: 100px; overflow: hidden">
        <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%">
          <path class="fill-gray-100 dark:fill-gray-800"
            d="M-37.02,164.10 C328.66,20.03 595.03,10.16 618.74,-65.81 L500.00,150.00 L0.00,150.00 Z"></path>
        </svg>
      </div>
      <footer class="bg-gray-100 dark:bg-gray-800">
        <div class="container px-10 py-4 mx-auto lg:px-20">
          <div class="flex flex-col items-center justify-between lg:flex-row">
            <div data-aos="fade-down" data-aos-delay="400" class="dark:text-white">
              <h1 class="text-2xl font-bold">WebProg.io</h1>
              <p class="mt-3 mb-6 leading-8 text-gray-700 dark:text-white">
                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                استفاده از طراحان گرافیک است.
              </p>
              <div class="space-x-4 space-x-reverse">
                <a href="#"><i class="text-4xl fab fa-instagram"> </i></a>
                <a href="#"><i class="text-4xl fab fa-telegram-plane"> </i></a>
                <a href="#"><i class="text-4xl fab fa-facebook-square"></i></a>
                <a href="#"><i class="text-4xl fab fa-linkedin-in"> </i></a>
              </div>
            </div>
            <div class="grid grid-cols-2 gap-8 mt-8 lg:grid-cols-4 lg:mt-0 dark:text-white">
              <div data-aos="fade-down" data-aos-delay="500">
                <h2 class="mb-3 font-bold leading-10 border-b-2 border-indigo-600">
                  بخش وبسایت
                </h2>
                <ul class="space-y-3">
                  <li>صفحه اصلی</li>
                  <li>محصولات</li>
                  <li>درباره ما</li>
                  <li>تماس با ما</li>
                </ul>
              </div>
              <div data-aos="fade-down" data-aos-delay="600">
                <h2 class="mb-3 font-bold leading-10 border-b-2 border-indigo-600">
                  محصولات
                </h2>
                <ul class="space-y-3">
                  <li>لورم ایپسوم</li>
                  <li>لورم ایپسوم متن</li>
                  <li>لورم ایپسوم</li>
                  <li>لورم ایپسوم متن</li>
                </ul>
              </div>
              <div data-aos="fade-down" data-aos-delay="700">
                <h2 class="mb-3 font-bold leading-10 border-b-2 border-indigo-600">
                  لورم ایپسوم
                </h2>
                <ul class="space-y-3">
                  <li>لورم ایپسوم</li>
                  <li>لورم ایپسوم متن</li>
                  <li>لورم ایپسوم</li>
                  <li>لورم ایپسوم متن</li>
                </ul>
              </div>
              <div data-aos="fade-down" data-aos-delay="800">
                <h2 class="mb-3 font-bold leading-10 border-b-2 border-indigo-600">
                  درباره ما
                </h2>
                <ul class="space-y-3">
                  <li>درباره ما</li>
                  <li>تماس با ما</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </section>
  </div>

  <script>
    document.addEventListener("alpine:init", () => {
      Alpine.data("dropdown", () => ({
        open: false,

        toggle() {
          this.open = !this.open;
        },
      })),
        Alpine.data("darkMode", () => ({
          darkMode: false,
          nextMode: "",

          init() {
            this.nextMode = localStorage.nextThemeMode;
            if (localStorage.theme === "dark") {
              this.darkMode = true;
            } else {
              this.darkMode = false;
            }
          },
          toDarkMode() {
            localStorage.theme = "dark";
            localStorage.nextThemeMode = "system";
            this.darkMode = true;
            this.nextMode = "system";
          },

          toSystemMode() {
            localStorage.theme = window.matchMedia(
              "(prefers-color-scheme: dark)"
            ).matches
              ? "dark"
              : "light";
            localStorage.nextThemeMode = "light";
            this.darkMode = window.matchMedia(
              "(prefers-color-scheme: dark)"
            ).matches;
            this.nextMode = "light";
          },

          toLightMode() {
            localStorage.theme = "light";
            localStorage.nextThemeMode = "dark";
            this.darkMode = false;
            this.nextMode = "dark";
          },
        })),
        Alpine.data("tabs", () => ({
          tabName: "nature",
          tabs: [
            {
              category: "nature",
              display_category: "هتل مروارید",
              images: [
                "./dist/images/hotel/hotel1.jpg",
                "./dist/images/hotel/hotel2.jpg",
                "./dist/images/hotel/room1.jpg",
                "./dist/images/hotel/room3.jpg",
                "./dist/images/hotel/room5.jpg",
                "./dist/images/hotel/room9.jpg",
                "./dist/images/hotel/room10.jpg",
                "./dist/images/hotel/room21.jpg",
                "./dist/images/hotel/hptel6.jpg",
                "./dist/images/hotel/shab.jpg",
                "./dist/images/hotel/sham1.jpg",
                "./dist/images/hotel/sham3.jpg",
                "./dist/images/hotel/shish1.jpg",
                "./dist/images/hotel/shish3.jpg",

              ],
            },
            {
              category: "technology",
              display_category: "خانه جوان",
              images: [
                "./dist/images/phantom/pa2.jpg",
                "./dist/images/phantom/pa2.png",
                "./dist/images/phantom/pa3.jpg",
                "./dist/images/phantom/pa4.jpg",
                "./dist/images/phantom/ph1.jpg",

              ],
            },
            {
              category: "travel",
              display_category: "بتن صنعت",
              images: [
                "./dist/images/beton/block.jpg",
                "./dist/images/beton/das1.jpg",
                "./dist/images/beton/kaf.jpg",
                "./dist/images/beton/kaf4.jpg",
              ],
            },
            {
              category: "all",
              display_category: "همه",
              images: [
                "./dist/images/nature/img_1.jpg",
                "./dist/images/nature/img_2.jpg",
                "./dist/images/nature/img_3.jpg",
                "./dist/images/nature/img_4.jpg",
                "./dist/images/technology/img_1.jpg",
                "./dist/images/technology/img_2.jpg",
                "./dist/images/technology/img_3.jpg",
                "./dist/images/technology/img_4.jpg",
                "./dist/images/travel/img_1.jpg",
                "./dist/images/travel/img_2.jpg",
                "./dist/images/travel/img_3.jpg",
                "./dist/images/travel/img_4.jpg",
              ],
            },
          ],
        }));
    });
  </script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>
