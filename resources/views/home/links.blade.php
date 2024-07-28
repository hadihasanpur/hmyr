@extends('home.layouts.home')
@section('title')
    صفحه اصلی
@endsection
@section('script')
@endsection
@section('links')
    <div class="mx-auto  container">
        <div
            class="bg-white border border-gray-200 rounded-lg shadow-md gap-x-3 gap-y-3 dark:bg-gray-800 dark:border-gray-700">
            <div id="" class="bg-zinc-100 dark:bg-gray-800 dark:border-gray-700">
                <div id="" class="my-1 border rounded-lg border-1 ">
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8 h-dvh">
                                <div class="overflow-hidden px-4">
                                    <table class="min-w-full text-center">
                                        <tbody>
                                            @foreach ($links as $link)
                                                <tr class="bg-neutral-100 dark:border-neutral-500 dark:bg-slate-800 dark:text-white">
                                                    <td class="whitespace-nowrap  text-center font-titr text-xs text-neutral-800">
                                                        {{ $link->id }}
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4  dark:text-white font-vazir text-center text-sm">
                                                        <a href="{{ $link->link }}">
                                                        {{ $link->title }}
                                                        </a>
                                                    </td> 
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @php
                                     //Columns must be a factor of 12 (1,2,3,4,6,12)
                                    $numOfCols = 6;
                                    $rowCount = 0;
                                    $bootstrapColWidth = 12 / $numOfCols;
                                @endphp
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
