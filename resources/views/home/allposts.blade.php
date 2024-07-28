@extends('home.layouts.home')
@section('title')
    صفحه اصلی
@endsection
@section('script')
@endsection
@section('allposts')
    <div class="mx-auto  container">
        <div class="bg-white border border-gray-200 rounded-lg shadow-md gap-x-3 gap-y-3 dark:bg-gray-800 dark:border-gray-700">
            <div class="bg-stone-100 dark:bg-gray-800 dark:border-gray-700">
                <div  class="my-1 border rounded-lg border-1">
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-hidden px-36">
                                    <table class="min-w-full text-left text-sm font-light">
                                        <tbody>
                                            @foreach ($allposts as $post)
                                                <tr class="border-b bg-neutral-100 dark:border-neutral-500 dark:bg-slate-800 dark:text-white">
                                                    <td class="whitespace-nowrap font-sm text-center ">
                                                        <p class="text-xs my_title4">{{  verta($post->created_at)->formatJalaliDate() }}</p>
                                                    </td>
                                                    <td class="px-4 text-right font-vazir">
                                                        <a href="{{ route('home.content', ['content' => $post->id]) }}">
                                                        <img class="object-scale-down h-auto w-24 my-1 "
                                                            src="{{ url(env('POST_IMAGES_UPLOAD_PATH') . $post->primary_image) }}"
                                                            all="{{ $post->title }}" />
                                                        </a>
                                                    </td>
                                                    <td class="whitespace-nowrap px-2 py-4 text-right dark:text-white font-titr">
                                                        <a href="{{ route('home.content', ['content' => $post->id]) }}">
                                                        {{ $post->title }}
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                            <span class="text-center mx-auto font-titr"> 
                                {{ $allposts->onEachSide(5)->links('pagination::tailwindim') }}
                            </span>  
                    </div>
                </div>
            </div>
        </div>
        <button id="to-top-button" onclick="goToTop()" title="Go To Top" 
            class="hidden fixed z-50 bottom-10 right-10 p-4 border-0 w-14 h-14 rounded-full shadow-md bg-sky-600 hover:bg-purple-700 text-white text-lg font-semibold transition-colors duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
            <path d="M12 4l8 8h-6v8h-4v-8H4l8-8z" />
            </svg>
            <span class="sr-only">برو بالا</span>
        </button>
    </div>
@endsection
