<div class="container p-10 mx-auto">
    <ul class="grid grid-cols-1 gap-1 sm:grid-cols-2 md:grid-cols-3 md:gap-8">
        @foreach($posts as $post)
        <li class="bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <a href="{{ route('posts.show', $post->slug) }}"
                class="max-w-sm mx-auto overflow-hidden transition duration-500 ease-in-out bg-white rounded-lg group hover:shadow-lg dark:bg-gray-800 hover:bg-gray-200">
                <img class="object-cover object-center w-full transition duration-500 ease-in-out rounded-lg h-44 opacity-90 group-hover:opacity-100"
                    src="{{ asset('storage/uploads/'. $post->img1) }}" alt="avatar">

                <div class="mt-2">
                    <div class="flex items-center px-6 py-3 bg-gray-900 rounded-lg rounded-b-none">
                        <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M17 21C15.8954 21 15 20.1046 15 19V15C15 13.8954 15.8954 13 17 13H19V12C19 8.13401 15.866 5 12 5C8.13401 5 5 8.13401 5 12V13H7C8.10457 13 9 13.8954 9 15V19C9 20.1046 8.10457 21 7 21H3V12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12V21H17ZM19 15H17V19H19V15ZM7 15H5V19H7V15Z" />
                        </svg>

                        <h1 class="mx-3 text-lg font-sm text-white group-hover:text-indigo-600">Focusing</h1>
                    </div>

                    <div
                        class="px-6 py-4 transition duration-500 ease-in-out rounded-lg group-hover:bg-gray-200 dark:group-hover:bg-gray-700">
                        <h1
                            class="text-xl font-medium text-gray-800 transition duration-500 ease-in-out dark:text-white dark:group-hover:text-blue-200 text-right">
                            {{ strip_tags($post->title) }}</h1>

                        <p class="py-2 text-gray-700 dark:text-gray-400 text-right">
                            {{ strip_tags(Str::limit($post->body, 400))}}
                        </p>
                    </div>
                </div>
            </a>
        </li>
        @endforeach
    </ul>
</div>
<section>
    <div class="relative items-center w-full px-5 py-12 mx-auto md:px-12 lg:px-24 max-w-7xl">
        <div class="grid w-full grid-cols-1 gap-6 mx-auto lg:grid-cols-3">
    @foreach($posts as $post)
            <div class="p-6">
                <img class="object-cover object-center w-full mb-8 lg:h-48 md:h-36 rounded-xl"
                    src="{{ asset('storage/uploads/'. $post->img1) }}" alt="avatar">
                <h1 class="mx-auto mb-8 text-lg font-normal leading-none tracking-tighter text-neutral-600 lg:text-2xl text-right">
                    ({{ strip_tags($post->title) }}) </h1>
                <p class="mx-auto text-base leading-relaxed text-gray-500 text-right"> ({{strip_tags (Str::limit($post->body, 400))}})</p>
                <div class="mt-4 text-right">
                    <a href="#"
                        class="inline-flex items-center mt-4 font-semibold text-blue-600 lg:mb-0 hover:text-neutral-600 "
                        title="read more"> بیشتر... </a>
                </div>
            </div>
    @endforeach
    </div>
</section>