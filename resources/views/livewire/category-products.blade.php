<div wire:init="loadPosts">
    @if (count($products))


        <div class="glider-contain bg-white p-8 rounded-lg">

            <div class="flex items-center mb-2">
                <h1 class="text-lg uppercase font-semibold text-gray-700">
                    {{ $category->name }}
                </h1>
                <a href="{{ route('categories.show', $category) }}"
                    class="text-blue-500 hover:text-orange-500 hover:underline ml-2 font-semibold">Ver más</a>
            </div>


            <ul class="glider-{{ $category->id }}">
                @foreach ($products as $product)
                    <li class=" rounded-lg border border-gray-200 shadow {{ $loop->last ? '' : 'sm:mr-4' }}">

                        <article>
                            <figure>
                                <img class="h-48 w-full object-cover object-center" src="{{ Storage::url($product->images->first()->url) }}" alt="">
                            </figure>

                            <div class="py-4 px-6">
                                <h1 class="text-lg font-semibold">
                                    <a href="{{ route('products.show', $product) }}">
                                        {{ Str::limit($product->name, 10) }}</a>
                                </h1>

                                <p class="font-bold text-green-500">$ {{ $product->price }}</p>
                            </div>

                        </article>
                    </li>
                @endforeach
            </ul>


            <button aria-label="Previous" class="glider-prev">«</button>
            <button aria-label="Next" class="glider-next">»</button>
            <div role="tablist" class="dots"></div>

        </div>

</div>
@else
<div class="mb-4 h-48 flex justify-center items-center  shadow-xl border bg-white rounded-lg">
    <div class="rounded animate-spin ease duration-300 w-10 h-10 border-2 border-indigo-500"></div>
</div>



@endif



@push('script')
    <script>
        Livewire.on('glider', function(id) {
            new Glider(document.querySelector('.glider-' + id), {
                slidesToScroll: 1,
                slidesToShow: 1,
                draggable: true,
                dots: '.glider-' + id + '~ .dots',
                arrows: {
                    prev: '.glider-' + id + '~ .glider-prev',
                    next: '.glider-' + id + '~ .glider-next'
                },

                responsive: [{
                        breakpoint: 640,
                        settings: {
                            slidesToScroll: 2,
                            slidesToShow: 2.5,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToScroll: 3,
                            slidesToShow: 3.5,
                        }
                    }, {
                        breakpoint: 1024,
                        settings: {
                            slidesToScroll: 4,
                            slidesToShow: 4.5,
                        }
                    }, {
                        breakpoint: 1240,
                        settings: {
                            slidesToScroll: 5,
                            slidesToShow: 6,
                        }
                    }
                ]


            });

        });


        // $(document).ready(function() {
        //     $('.flexslider').flexslider({
        //         animation: "slide"
        //     });
        // });
    </script>
@endpush

</div>
