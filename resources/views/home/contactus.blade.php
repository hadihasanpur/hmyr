@extends('home.layouts.home')
@section('title')
    صفحه اصلی
@endsection
@section('script')
@endsection
@section('auction')
    <div class="mx-auto  container">
        <div class="border border-gray-200 rounded-lg shadow-md gap-x-3 gap-y-3 dark:bg-gray-800 dark:border-gray-700 bg-slate-50">
            <div class="h-auto grid grid-cols-1 gap-4 content-center">
                <table class="border-separate border border-slate-500 dark:text-gray-50 text-center mx-10 table-auto" > 
                    <thead class="bg-slate-500 ">
                        <tr >
                            <th class="border border-slate-600 font-titr py-2 "> واحد</th>
                            <th class="border border-slate-600 font-titr py-2 "> تلفن</th>
                            <th class="border border-slate-600 font-titr py-2 "> تلفن</th>
                            <th class="border border-slate-600 font-titr py-2 "> فکس</th>
                            <th class="border border-slate-600 font-titr py-2 "> پست الکترونیک</th>
                        </tr>
                    </thead>
                    <tbody class="bg-slate-200 dark:bg-slate-800">
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2">دفتر مدیر عامل</td>
                            <td class="border border-slate-700 font-titr hover:py-2">33482533</td>
                            <td class="border border-slate-700 font-titr hover:py-2">(داخلی)203</td>
                            <td class="border border-slate-700 font-titr hover:py-2">33448185</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                        </tr>
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2">دفتر مرکزی</td>
                            <td class="border border-slate-700 font-titr hover:py-2">33451006</td>
                            <td class="border border-slate-700 font-titr hover:py-2">33441901</td>
                            <td class="border border-slate-700 font-titr hover:py-2">33448185</td>
                            <td class="border border-slate-700 font-titr hover:py-2">info@hmyr.ir</td>
                        </tr>
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2">کارخانه بتن صنعت</td>
                            <td class="border border-slate-700 font-titr hover:py-2">32527386</td>
                            <td class="border border-slate-700 font-titr hover:py-2">32527534</td>
                            <td class="border border-slate-700 font-titr hover:py-2">32527274</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                        </tr>
                       
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2">واحد فن آوری و اطلاعات </td>
                            <td class="border border-slate-700 font-titr hover:py-2">33481846</td>
                            <td class="border border-slate-700 font-titr hover:py-2">(داخلی)121</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2">it@hmyr.ir</td>
                        </tr>
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2">فرهنگسرای خانه جوان</td>
                            <td class="border border-slate-700 font-titr hover:py-2">33469906</td>
                            <td class="border border-slate-700 font-titr hover:py-2">33469907</td>
                            <td class="border border-slate-700 font-titr hover:py-2">33443658</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                        </tr>
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2"> پذیرش هتل مروارید ارومیه</td>
                            <td class="border border-slate-700 font-titr hover:py-2">33466300</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2">33464030</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                        </tr>
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2">هتل مروارید سردشت</td>
                            <td class="border border-slate-700 font-titr hover:py-2">44333337</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                        </tr>

                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2">واحد ماشین آلات</td>
                            <td class="border border-slate-700 font-titr hover:py-2">33387013</td>
                            <td class="border border-slate-700 font-titr hover:py-2">33385959</td>
                            <td class="border border-slate-700 font-titr hover:py-2">33380504</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                        </tr>
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2">حراست سازمان</td>
                            <td class="border border-slate-700 font-titr hover:py-2">32230102</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td></td>
                        </tr>
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2">انبار مرکزی</td>
                            <td class="border border-slate-700 font-titr hover:py-2">32779899</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                        </tr>
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2">پلاک 9</td>
                            <td class="border border-slate-700 font-titr hover:py-2">33440999</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                        </tr>
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2">پیش شماره استانی</td>
                            <td class="border border-slate-700 font-titr hover:py-2">(044)</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td> 
                        </tr>
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <th class="border border-slate-700 font-titr hover:py-2">
                                شماره های داخلی سازمان
                            </th>
                            <th class="hover:py-2">
                            </th>
                            <th class="hover:py-2">
                            </th>
                            <th class="hover:py-2">
                            </th> 
                            <th class="hover:py-2">
                            </th>

                        </tr>
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50 ">
                            <td class="border border-slate-700 font-titr hover:py-2">دفتر مدیر عامل</td>
                            <td class="border border-slate-700 font-titr hover:py-2">احسان بابایی </td>
                            <td class="border border-slate-700 font-titr hover:py-2">203</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                        </tr>
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2">معاونت برنامه ریزی و توسعه</td>
                            <td class="border border-slate-700 font-titr hover:py-2">مهندس نادر بر</td>
                            <td class="border border-slate-700 font-titr hover:py-2">403</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                        </tr>
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2">معاونت بازرگانی</td>
                            <td class="border border-slate-700 font-titr hover:py-2">بابک بهنام</td>
                            <td class="border border-slate-700 font-titr hover:py-2">205</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                        </tr>
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2">مدیر مالی</td>
                            <td class="border border-slate-700 font-titr hover:py-2">سیف الله حاجی زاده</td>
                            <td class="border border-slate-700 font-titr hover:py-2">113</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                        </tr>
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2">رییس حسابداری</td>
                            <td class="border border-slate-700 font-titr hover:py-2">یونس احمدی</td>
                            <td class="border border-slate-700 font-titr hover:py-2">110</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                        </tr>
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2">مدیر واحد فناوری اطلاعات</td>
                            <td class="border border-slate-700 font-titr hover:py-2">مهدی اسمخانی</td>
                            <td class="border border-slate-700 font-titr hover:py-2">121</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                        </tr>
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2">فناوری اطلاعات</td>
                            <td class="border border-slate-700 font-titr hover:py-2">هادی حسن پور</td>
                            <td class="border border-slate-700 font-titr hover:py-2">۱۲۳</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                        </tr>
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2">امور مالی</td>
                            <td class="border border-slate-700 font-titr hover:py-2">خانم غفاری و هاشمی </td>
                            <td class="border border-slate-700 font-titr hover:py-2">107</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                        </tr>
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2">امور مالی</td>
                            <td class="border border-slate-700 font-titr hover:py-2">خانم سلمانی آذر</td>
                            <td class="border border-slate-700 font-titr hover:py-2">115</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                        </tr>
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2">امور مالی</td>
                            <td class="border border-slate-700 font-titr hover:py-2">یوسف نوری</td>
                            <td class="border border-slate-700 font-titr hover:py-2">118</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                        </tr>
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2">امور مالی</td>
                            <td class="border border-slate-700 font-titr hover:py-2">حیدرزاده</td>
                            <td class="border border-slate-700 font-titr hover:py-2">116</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                        </tr>
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2">امور مالی</td>
                            <td class="border border-slate-700 font-titr hover:py-2">خام عیوضلو ناصر منصوری</td>
                            <td class="border border-slate-700 font-titr hover:py-2">117</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                        </tr>
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2">امور مالی</td>
                            <td class="border border-slate-700 font-titr hover:py-2">محمد تقی قلی نژاد</td>
                            <td class="border border-slate-700 font-titr hover:py-2">115</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                        </tr>
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2">امور مالی</td>
                            <td class="border border-slate-700 font-titr hover:py-2">فاطمه حیدرزاده  </td>
                            <td class="border border-slate-700 font-titr hover:py-2">114</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                        </tr>
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2">امور مالی</td>
                            <td class="border border-slate-700 font-titr hover:py-2">عباسی</td>
                            <td class="border border-slate-700 font-titr hover:py-2">119</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                        </tr> 
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2">اموال </td>
                            <td class="border border-slate-700 font-titr hover:py-2">محمد قهرمانی</td>
                            <td class="border border-slate-700 font-titr hover:py-2">105</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                        </tr> 
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2">بایگانی مالی </td>
                            <td class="border border-slate-700 font-titr hover:py-2">چواد فرجامی </td>
                            <td class="border border-slate-700 font-titr hover:py-2">۱۲۵</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                        </tr>
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2">مدیر حقوقی</td>
                            <td class="border border-slate-700 font-titr hover:py-2">علی شریعتی</td>
                            <td class="border border-slate-700 font-titr hover:py-2">217</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                        </tr>
                         <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2">امور حقوقی</td>
                            <td class="border border-slate-700 font-titr hover:py-2">عرب باغی - نعمت الهی -سرباز رشید - ستاری  </td>
                            <td class="border border-slate-700 font-titr hover:py-2">217</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                        </tr>
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2">مدیر روابط عمومی</td>
                            <td class="border border-slate-700 font-titr hover:py-2">هادی پناهی</td>
                            <td class="border border-slate-700 font-titr hover:py-2">132</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                        </tr>
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2"> حراست </td>
                            <td class="border border-slate-700 font-titr hover:py-2">احد جعفری</td>
                            <td class="border border-slate-700 font-titr hover:py-2">208</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                        </tr>
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2"> کارگزینی </td>
                            <td class="border border-slate-700 font-titr hover:py-2">جواد حسینی</td>
                            <td class="border border-slate-700 font-titr hover:py-2">120</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                        </tr> 
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2"> کارگزینی </td>
                            <td class="border border-slate-700 font-titr hover:py-2">خانم فرزانه نژاد</td>
                            <td class="border border-slate-700 font-titr hover:py-2">126</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                        </tr> 
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2"> کارگزینی </td>
                            <td class="border border-slate-700 font-titr hover:py-2">خانم  عباسلو</td>
                            <td class="border border-slate-700 font-titr hover:py-2">۱۲۸</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                        </tr> 
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2"> کارگزینی </td>
                            <td class="border border-slate-700 font-titr hover:py-2"> خانم لک </td>
                            <td class="border border-slate-700 font-titr hover:py-2">127</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                        </tr>
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2"> مخابرات </td>
                            <td class="border border-slate-700 font-titr hover:py-2">خانم  فخری</td>
                            <td class="border border-slate-700 font-titr hover:py-2">۱۰۱-۳۲۴</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                        </tr> 
                        <tr class="border-b dark:hover:bg-gray-300 dark:text-slate-50 dark:hover:text-slate-950 hover:bg-gray-600 hover:text-slate-50">
                            <td class="border border-slate-700 font-titr hover:py-2"> امور قراردادها </td>
                            <td class="border border-slate-700 font-titr hover:py-2">مجتبی  رشدی</td>
                            <td class="border border-slate-700 font-titr hover:py-2">۲۱۳</td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                            <td class="border border-slate-700 font-titr hover:py-2"></td>
                        </tr>
                            
                    </tbody>
                </table>
                
            </div>
            </div>
        </div>
       
    </div>
@endsection
