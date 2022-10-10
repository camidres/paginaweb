<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">

            <div>
                <div class="flexslider">
                    <ul class="slides">

                        @foreach ($product->images as $image)
                            <li data-thumb="{{ Storage::url($image->url) }}">
                                <img src="{{ Storage::url($image->url) }}" />
                            </li>
                        @endforeach

                    </ul>
                </div>

                <div class="-mt-10 text-gray-700">
                    <h2 class="font-bold text-lg">Descripción</h2>
                    {!! $product->description !!}
                </div>




                <div class="text-gray-700 mt-4">
                    <h2 class="font-bold text-lg">Dejar reseña</h2>

                    <form action="{{ route('reviews.store', $product) }}" method="POST">

                        @csrf

                        <textarea name="comment" id="editor"></textarea>

                        <x-jet-input-error for="comment" />

                        <div class="flex items-center mt-2" x-data="{rating: 5}">

                            <p class="font-semibold mr-3 ">puntuacion:</p>
                            <ul class="flex space-x-2">


                                <li x-bind:class="rating >= 1 ? 'text-yellow-500' : ''">
                                    <button type="button" class="focus:outline-none" x-on:click="rating = 1">
                                        <i class="fas fa-star"></i>
                                    </button>
                                </li>

                                <li x-bind:class="rating >= 2 ? 'text-yellow-500' : ''">
                                    <button type="button" class="focus:outline-none" x-on:click="rating = 2">
                                        <i class="fas fa-star"></i>
                                    </button>
                                </li>

                                <li x-bind:class="rating >= 3 ? 'text-yellow-500' : ''">
                                    <button type="button" class="focus:outline-none" x-on:click="rating = 3">
                                        <i class="fas fa-star"></i>
                                    </button>
                                </li>

                                <li x-bind:class="rating >= 4 ? 'text-yellow-500' : ''">
                                    <button type="button" class="focus:outline-none" x-on:click="rating = 4">
                                        <i class="fas fa-star"></i>
                                    </button>
                                </li>

                                <li x-bind:class="rating >= 5 ? 'text-yellow-500' : ''">
                                    <button type="button" class="focus:outline-none" x-on:click="rating = 5">
                                        <i class="fas fa-star"></i>
                                    </button>
                                </li>




                            </ul>

                            <input class="hidden" type="number" x-model="rating">

                            <x-jet-button class="ml-auto bg-blue-500 ">
                                Agregar reseña
                            </x-jet-button>
                        </div>
                    </form>

                </div>



            </div>



            <div>
                <h1 class="text-xl font-bold text-blue-500">{{ $product->name }}</h1>
                <div class="flex">
                    <p class="text-gray-700">Marca: <a class="underline capitalize hover:text-blue-400"
                            href="">{{ $product->brand->name }}</a></p>
                    <p class="text-gray-700 ml-6">5 <i class="fas fa-star text-sm text-yellow-400"></i></p>
                    <a class="text-gray-600 hover:text-blue-400 underline ml-6" href="">51 Reseñas</a>
                </div>

                <p class="text-2xl font-semibold text-gray-800 my-4">$ {{ $product->price }} Pesos</p>

                <div class=" bg-white rounded-lg shadow-lg mb-6">
                    <div class="p-4 flex items-center">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full bg-blue-300">
                            <i class="fas fa-truck text-sm text-blue-700"></i>
                        </span>

                        <div class="ml-4">
                            <p class="text-lg font-semibold text-black">Se hace envío a todo Colombia</p>
                            <p class="">Recibelo el {{ Date::now()->addDay(5)->locale('es')->format('l j F') }}
                            </p>
                        </div>
                    </div>
                </div>

                @livewire('add-cart-item', ['product' => $product])

            </div>
        </div>
    </div>

    {{-- script del slider --}}
    @push('script')
        <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>

        <script>
            ClassicEditor
                .create(document.querySelector('#editor'), {
                    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],

                })
                .catch(error => {
                    console.log(error);
                });
        </script>

        <script>
            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });
        </script>
    @endpush
</x-app-layout>
