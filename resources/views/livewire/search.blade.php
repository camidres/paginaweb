<div class="flex-1 relative" x-data>

    <form action="{{ route('search') }}" autocomplete="off">

        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-blue-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>

        <x-jet-input name="name" wire:model="search" tiye="text" class=" h-10 pl-10 w-full  outline-none border border-blue-500 "
            placeholder="Busca aqui tus productos" />

            <button type="submit" class="text-white absolute top-1.5 right-2.5 outline-none  bg-blue-400  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-1 dark:bg-blue-400 ">Buscar</button>

    </form>

    <div class="absolute w-full mt-1  hidden" :class="{ 'hidden': !$wire.open }" @click.away="$wire.open = false">

        <div class="bg-white rounded-lg shadow mt-1">

            <div class="px-4 py-3 space-y-2 ">

                @forelse ($products as $product)
                    <a href="{{ route('products.show', $product) }}" class="flex">

                        <img class="w-20 h-16 object-cover" src="{{ Storage::url($product->images->first()->url) }}">

                        <div class="ml-2 text-gray-700">

                            <p class="text-lg font-semibold leading-5">{{ $product->name }}</p>
                            <p>{{ $product->subcategory->category->name }}</p>

                        </div>

                    </a>


                @empty

                    <p class="text-lg font-semibold leading-5">
                        Este producto no existe
                    </p>
                @endforelse

            </div>

        </div>

    </div>



</div>
