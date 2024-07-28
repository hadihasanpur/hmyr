@extends('home.layouts.home')
@section('title')
    صفحه اصلی
@endsection
@section('script')
@endsection
@section('allpictorials')
    <div class="mx-auto  container">
        <div
            class="bg-white border border-gray-200 rounded-lg shadow-md gap-x-3 gap-y-3 dark:bg-gray-800 dark:border-gray-700">
            <div id="" class="bg-sky-100 dark:bg-gray-800 dark:border-gray-700">
                <div id="" class="my-1 border rounded-lg border-1 ">
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-hidden px-4">
                                    <table class="min-w-full text-left text-sm font-light">
                                        <tbody>
                                            @foreach ($allpictorials as $pictorial)
                                                <tr class="border-b bg-neutral-100 dark:border-neutral-500 dark:bg-slate-800 dark:text-white">
                                                    <td class="whitespace-nowrap font-sm text-center font-vazir">
                                                            <p class="text-xs my_title4">{{ verta($pictorial->created_at)->formatJalaliDate() }}</p>

                                                    </td>
                                                    <td class="whitespace-nowrap px-6 text-right">
                                                        <a href="{{ route('home.pictorial', ['pictorial' => $pictorial->id]) }}">
                                                        <img class="object-scale-down h-auto w-24 my-1 mb-4"
                                                            src="{{ url(env('PICTORIAL_IMAGES_UPLOAD_PATH') . $pictorial->primary_image) }}"
                                                            alt="{{ $pictorial->title }}" />
                                                        </a>
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4 text-right dark:text-white font-titr">
                                                        
                                                        <a href="{{ route('home.pictorial', ['pictorial' => $pictorial->id]) }}">
                                                        {{ $pictorial->title }}
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <span class="text-center mx-auto"> 
                                {{ $allpictorials->onEachSide(5)->links('pagination::tailwindim') }}
                            </span>  

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
