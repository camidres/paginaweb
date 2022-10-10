<div class="container py-8">



    {{-- <section class="bg-white rounded-lg shadow-lg p-6 text-gray-700">

        <h1 class="text-lg font-semibold mb-6">
            Carro de compras
        </h1>


        @if (Cart::count())





            <table class="table-auto w-full">

                <thead>
                    <tr>
                        <th></th>
                        <th>Precio</th>
                        <th>Cant</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>


                <tbody>

                    @foreach (Cart::content() as $item)
                        <tr>
                            <td>
                                <div class="flex">
                                    <img class="h-15 w-28 object-cover mr-4" src="{{ $item->options->image }}"
                                        alt="">

                                    <p class="font-bold">
                                        {{ $item->name }}
                                    </p>
                                </div>
                            </td>
                            <td class="text-center">
                                <span>{{ $item->price }}</span>


                            </td>
                            <td>
                                <div class="flex justify-center">
                                    @livewire('update-cart-item', ['rowId' => $item->rowId], key($item->rowId))
                                </div>


                            </td>

                            <td class="text-center">

                                $ {{ $item->price * $item->qty }}

                            </td>

                            <td>
                                <a class="ml-6 cursor-pointer hover:text-red-600"

                                wire:click="delete('{{ $item->rowId }}')"
                                wire:loading.class="text-red-600"
                                wire:target="delete('{{ $item->rowId }}')"


                                >


                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>


            </table>

            <a class="text-sm cursor-pointer hover:underline mt-3 inline-block" wire:click="destroy">

                <i class="fas fa-trash"></i>
                Borrar pedidos

            </a>
        @else
            <div class="flex flex-col items-center">

                <x-cart />

                <p class="text-lg text-gray-700 mt-4">aun no tienes productos en tu carrito</p>


                <x-button-enlace href="/" class="mt-4 px-10">

                    Ir a comprar

                </x-button-enlace>

            </div>


        @endif
    </section> --}}
    <x-table-responsive>
        <div class="px-6 py-4 bg-white">
            <h1 class="text-lg font-semibold text-gray-700">CARRO DE COMPRAS</h1>
        </div>

        @if (Cart::count())

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nombre
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Precio
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Cantidad
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Total
                        </th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">

                    @foreach (Cart::content() as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full object-cover object-center"
                                            src="{{ $item->options->image }}" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $item->name }}
                                        </div>

                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">

                                <div class="text-sm text-gray-500">
                                    <span>$ {{ $item->price }}</span>
                                    <a class="ml-6 cursor-pointer hover:text-red-600"
                                        wire:click="delete('{{ $item->rowId }}')"
                                        wire:loading.class="text-red-600 opacity-25"
                                        wire:target="delete('{{ $item->rowId }}')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">


                                    @livewire('update-cart-item', ['rowId' => $item->rowId], key($item->rowId))


                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div class="text-sm text-gray-500">
                                    $ {{ $item->price * $item->qty }}
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

            <div class="px-6 py-4">
                <a class="text-sm cursor-pointer hover:underline mt-3 inline-block" wire:click="destroy">
                    <i class="fas fa-trash"></i>
                    Borrar carrito de compras
                </a>
            </div>
        @else
        <div class="flex flex-col items-center">

            <x-cart />

            <p class="text-lg text-gray-700 mt-4">aun no tienes productos en tu carrito</p>


            <x-button-enlace href="/" class="mt-4 px-10">

                Ir a comprar

            </x-button-enlace>

        </div>
        @endif

    </x-table-responsive>

    @if (Cart::count())
        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mt-4">

            <div class="flex justify-between">

                <div>

                    <p class="text-gray-700">
                        <span class="font-bold text-lg">Total:</span>

                        $ {{ Cart::subtotal() }}
                    </p>

                </div>

                <div>

                    {{-- agregando lo nuevo --}}
                    <x-button-enlace href="{{ route('orders.create') }}">
                        Crear orden
                    </x-button-enlace>

                </div>

            </div>

        </div>
    @endif


</div>
