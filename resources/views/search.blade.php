<x-app-layout>
<div class="container py-8">
    <ul>
        @forelse ($products as $product)

                <x-product-list :product="$product" />


        @empty

            <li class="bg-white rounded-lg shadow-2xl">
                <div class=" p-4 mt-4">
                    <p class="text-lg text-gray-700 text-center font-semibold">

                        Ningun producto coincide con la busqueda

                    </p>
                </div>
            </li>
        @endforelse
    </ul>

    <div class="mt-4 ">

        {{ $products->links() }}
    </div>
</div>
</x-app-layout>
