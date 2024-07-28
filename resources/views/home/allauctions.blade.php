@extends('home.layouts.home')
@section('title')
    صفحه اصلی
@endsection
@section('script')
@endsection
@section('auctions')
    <div class="mx-auto  container ">
        <div class="bg-slate-50 border border-gray-200 rounded-lg shadow-md gap-x-3 gap-y-3 dark:bg-gray-800 dark:border-gray-700 dark:text-white mt-4 h-dvh" >
            <div id="" class="bg-slate-50 dark:bg-gray-800 dark:border-gray-700 mt-2 px-4 mb-4">
                <div id="" class="my-1 border rounded-lg border-1 bg-slate-100 px-8 dark:bg-gray-800 ">
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-hidden px-4">
                                    <div class="flex flex-col">
                                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                            <div class="inline-block min-w-full py-2 sm:px-6 xl:px-8 bg-stone-200 dark:bg-gray-800">
                                                <div class="overflow-hidden">
                                                    <table class="min-w-full text-left text-sm font-light rounded-sm border border-1 ">
                                                        <thead class="border bg-stone-300 font-medium dark:border-neutral-500 dark:bg-neutral-600 font-titr rounded-tr-lg">
                                                            <tr class="text-center  rounded-lg border-2">
                                                                <th scope="col" class="px-6 py-4" rounded-tl-sm>#</th>
                                                                <th scope="col" class="px-6 py-4 rounded-tl-sm">عنوان مناقضه</th>
                                                                <th scope="col" class="px-6 py-4 rounded-tl-sm">تاریخ شروع مناقضه</th>
                                                                <th scope="col" class="px-6 py-4 rounded-tl-sm">تاریخ پایان مناقضه</th>
                                                                <th scope="col" class="px-6 py-4 rounded-tl-sm">تاریخ درج مناقضه</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($auctions as $auction)
                                                                <tr class=" text-center dark:text-white dark:bg-gray-800 font-titr">
                                                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                                        <a
                                                                            href="{{ route('home.auction', ['auction' => $auction->id]) }}">
                                                                            {{ $auction->id }}
                                                                        </a>
                                                                    </td> 
                                                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                                        <a
                                                                            href="{{ route('home.auction', ['auction' => $auction->id]) }}">
                                                                            {{ $auction->title }}
                                                                        </a>
                                                                    </td>
                                                                    <td class="whitespace-nowrap px-6 py-4">
                                                                        <a
                                                                            href="{{ route('home.auction', ['auction' => $auction->id]) }}">
                                                                            {{ verta($auction->started_at)->formatJalaliDate() }}
                                                                        </a>
                                                                    </td>
                                                                    <td class="whitespace-nowrap px-6 py-4">
                                                                        <a
                                                                            href="{{ route('home.auction', ['auction' => $auction->id]) }}">
                                                                            {{ verta($auction->finished_at)->formatJalaliDate() }}
                                                                        </a>
                                                                    </td>
                                                                    <td class="whitespace-nowrap px-6 py-4">
                                                                        <a
                                                                            href="{{ route('home.auction', ['auction' => $auction->id]) }}">
                                                                            {{ verta($auction->updated_at)->formatJalaliDate() }}
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
