<div>
    <section>
        <!--Title-->
        <div class="pt-16 text-center md:pt-32">
            <h1 class="text-3xl font-bold text-blue-300 break-normal md:text-5xl">{{ $post->title }}</h1>
            <p class="text-sm font-bold text-green-500 md:text-base">{{ $post->created_at }} <span
                    class="text-gray-900">/</span> Created</p>
        </div>
        <!--image-->
        <img class="container w-full max-w-6xl mx-auto mt-8 bg-white bg-cover rounded"
            src="{{ asset('storage/photos/'. $post->image) }}" />
        <!--Container-->
        <div class="container max-w-5xl mx-auto mt-8">
            <div class="mx-0 sm:mx-6">
                <div class="w-full p-8 text-xl leading-normal text-gray-800 bg-white rounded-lg dark:bg-gray-600 dark:text-gray-200 md:p-24 md:text-2xl"
                    style="font-family:Georgia,serif;">
                    <!--Post Content-->
                    {{ $post->body }}
                    <!--/ Post Content-->
                </div>
            </div>
        </div>
        </s ection>
</div>