<x-app-layout>
    <div class="max-w-5xl py-8 mx-auto px-2 sm:px-6 lg:px-8">
        <h1 class="text-center uppercase font-sans text-3xl text-blue-500 shadow-text mb-6">{{ __('Category') }}
            {{ $category->name }}</h1>

        @foreach ($posts->chunk(3) as $postGroup)
            <div class="flex flex-wrap -mx-4">
                @foreach ($postGroup as $post)
                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
                        <div class="h-full">
                            <article
                                class="group max-w-sm mx-auto h-full overflow-hidden bg-white rounded-lg shadow-md transition-transform transform hover:scale-105 duration-300 ease-in-out">
                                <x-card-post :post="$post" />
                            </article>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach


        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>


</x-app-layout>
