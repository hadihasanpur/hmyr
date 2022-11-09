@extends('home.layouts.home')

@section('title')
صفحه اصلی
@endsection

@section('script')
<script>
    $('.variation-select').on('change' , function(){
            let variation = JSON.parse(this.value);
            let variationPriceDiv = $('.variation-price');
            variationPriceDiv.empty();

            if(variation.is_sale){
                let spanSale = $('<span />' , {
                    class : 'new',
                    text : toPersianNum(number_format(variation.sale_price)) + ' تومان'
                });
                let spanPrice = $('<span />' , {
                    class : 'old',
                    text : toPersianNum(number_format(variation.price)) + ' تومان'
                });

                variationPriceDiv.append(spanSale);
                variationPriceDiv.append(spanPrice);
            }else{
                let spanPrice = $('<span />' , {
                    class : 'new',
                    text : toPersianNum(number_format(variation.price)) + ' تومان'
                });
                variationPriceDiv.append(spanPrice);
            }

            $('.quantity-input').attr('data-max' , variation.quantity);
            $('.quantity-input').val(1);

        });
</script>
@endsection

@section('content')

<div class="mx-auto grid_container sm:grid_container_sm md:grid_container_md lg:grid_container_lg">

    <section id="fnew" class="rounded-lg md:grid_fnew">
        <div id="content"
            class="grid bg-white border border-gray-200 rounded-lg shadow-md md:grid-cols-2 dark:bg-gray-800 dark:border-gray-700 gap-x-3 gap-y-3 sm:grid_top_sm">
            <div id="TopPost" class="">
                <div id="topimg" class="relative overflow-hidden">
                    <img class="object-cover w-full" src="https://hmyr.ir//backend/web/uploads/991228%20(8).jpeg"
                        alt="Flower and sky" />
                    <div class="absolute bottom-0 left-0 w-full px-6 overflow-hidden bg-slate-600">
                        <h4 class="w-full mb-3 text-xl font-semibold text-white top-10 tracking-tigh">مجمع عمومی عادی
                            سالیانه
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
                        <p
                            class="px-4 mt-4 font-normal leading-6 text-justify text-gray-700 dark:text-gray-400 indent-16">
                            دومین متن خبری سایت باید از نظر ظاهری در بهترین مکان سایت قرار داشته باشد.سرلشکر باقری در
                            این
                            بازدید در جریان آخرین توانمندی‌ها در حوزه تولید انواع پهپادهای نظامی، تهاجمی و دوربرد ارتش
                            قرار گرفت</p>
                    </div>
                </div>
                <div id="3new" class="sm:grid md:flex">
                    <div>
                        <img class="object-cover w-full" src="https://hmyr.ir//backend/web/uploads/981009f.jpg"
                            alt="Flower and sky" />
                    </div>
                    <div>
                        <p
                            class="px-4 mt-2 mb-3 font-normal leading-6 text-justify text-gray-700 dark:text-gray-400 indent-16">
                            سرلشکر محمد
                            باقری رئیس
                            ستاد کل نیروهای
                            سومین متن خبری سایت باید از نظر ظاهری در بهترین مکان سایت قرار داشته باشد.سرلشکر باقری در
                            این
                            بازدید در جریان آخرین توانمندی‌ها در حوزه تولید انواع پهپادهای نظامی، تهاجمی و دوربرد ارتش
                            قرار گرفت</p>
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
                        <h5 class="mb-2 font-bold tracking-tight text-center text-gray-900 text-1xl dark:text-white">
                            بازدید
                            پرسنل
                            سازمان
                            از مناظر زیبای اروپای مرکزی
                        </h5>
                    </a>
                    <p class="mb-3 font-normal leading-6 text-justify text-gray-700 dark:text-gray-400 indent-16">سرلشکر
                        محمد
                        باقری رئیس
                        ستاد کل نیروهای
                        مسلح از یکی از
                        پایگاه‌های سری و زیرزمینی پهپادی ارتش جمهوری اسلامی ایران بازدید کرد.سرلشکر باقری در این بازدید
                        در جریان
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
                        <h5 class="mb-2 font-bold tracking-tight text-center text-gray-900 text-1xl dark:text-white">
                            بازدید
                            سرلشکر باقری
                            از
                            پهیاد های
                            ارتش
                        </h5>
                    </a>
                    <p class="mb-3 font-normal leading-6 text-justify text-gray-700 dark:text-gray-400 indent-16">سرلشکر
                        محمد
                        باقری رئیس
                        ستاد کل نیروهای
                        مسلح از یکی از
                        پایگاه‌های سری و زیرزمینی پهپادی ارتش جمهوری اسلامی ایران بازدید کرد.سرلشکر باقری در این بازدید
                        در جریان
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
                        <h5 class="mb-2 font-bold tracking-tight text-center text-gray-900 text-1xl dark:text-white">
                            بازدید
                            سرلشکر باقری
                            از
                            پهیاد های
                            ارتش
                        </h5>
                    </a>
                    <p class="mb-3 font-normal leading-6 text-justify text-gray-700 dark:text-gray-400 indent-16">سرلشکر
                        محمد
                        باقری رئیس
                        ستاد کل نیروهای
                        مسلح از یکی از
                        پایگاه‌های سری و زیرزمینی پهپادی ارتش جمهوری اسلامی ایران بازدید کرد.سرلشکر باقری در این بازدید
                        در جریان
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
                        <h5 class="mb-2 font-bold tracking-tight text-center text-gray-900 text-1xl dark:text-white">
                            بازدید
                            سرلشکر باقری
                            از
                            پهیاد های ارتش
                        </h5>
                    </a>
                    <p class="mb-3 font-normal leading-6 text-justify text-gray-700 dark:text-gray-400 indent-16">سرلشکر
                        محمد
                        باقری رئیس
                        ستاد کل نیروهای
                        مسلح از یکی از پایگاه‌های سری و زیرزمینی پهپادی ارتش جمهوری اسلامی ایران بازدید کرد.سرلشکر باقری
                        در این
                        بازدید در جریان آخرین توانمندی‌ها در حوزه تولید انواع پهپادهای نظامی، تهاجمی و دوربرد ارتش قرار
                        گرفت..
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
                            class="px-1 text-indigo-600">توليدي</span> <Span class="px-1 text-indigo-600">هتل داری
                        </Span><Span class="px-1 text-indigo-600">بازرگانی</Span>

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
                        <li x-text="tab.display_category" @click="tabName = tab.category"
                            class="px-4 py-2 cursor-pointer"
                            :class="tabName == tab.category && 'border-b-4 border-indigo-600'"></li>
                    </template>
                </ul>
                <template x-for="(tab , index) in tabs" :key="index">
                    <div x-show="tab.category == tabName"
                        class="grid grid-cols-1 gap-5 mt-5 sm:grid-cols-2 lg:grid-cols-3">
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

</div>

@endsection