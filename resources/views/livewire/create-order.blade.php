<div class="container py-8 grid lg:grid-cols-2 xl:grid-cols-5 gap-6">
    <div class="order-2 lg:order-1 lg:col-span-1 xl:col-span-3">

        <div class="bg-white rounded-lg shadow p-6">

            <div class="mb-4">
                <x-jet-label value="Nombre de contacto" />

                <x-jet-input type="text" wire:model.defer='contact' placeholder="Ingresar nombre del remitente"
                    class="w-full" />
                <x-jet-input-error for="contact" />

            </div>



            <div>

                <x-jet-label value="Telefono de contacto" />

                <x-jet-input type="text" wire:model.defer='phone' placeholder="Ingresar numero del remitente"
                    class="w-full" />
                <x-jet-input-error for="phone" />

            </div>
        </div>

        <div x-data="{ envio_type: @entangle('envio_type') }">
            <p class="mt-6 mb-3 text-lg text-gray-700">Envios</p>

            <label class="bg-white rounded-lg shadow px-6 py-4 flex items-center mb-4 cursor-pointer">

                <input x-model="envio_type" type="radio" value="1" name="envio_type" class="text-blue-700">

                <span class="ml-2 text-gray-700">

                    Recojo en tienda

                </span>

                <span class="font-semibold text-gray-700 ml-auto">
                    Gratis
                </span>


            </label>

            <div class="bg-white rounded-lg shadow">

                <label class="px-6 py-4 flex items-center">

                    <input x-model="envio_type" type="radio" value="2" name="envio_type" class="text-blue-700">

                    <span class="ml-2 text-gray-700">

                        Envio a domicilio

                    </span>


                </label>

                <div class="px-6 pb-6 grid grid-cols-2 gap-6" :class="{ 'hidden': envio_type != 2 }">

                    {{-- //Departamento --}}
                    <div>

                        <x-jet-label value="Departamento" />

                        <select class="form-control w-full" wire:model="department_id">

                            <option value="" disabled selected>Seleccione un departamento</option>


                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}"> {{ $department->name }} </option>
                            @endforeach
                        </select>

                        <x-jet-input-error for="department_id" />

                    </div>

                    {{-- //Ciudades --}}
                    <div>

                        <x-jet-label value="Ciudad" />

                        <select class="form-control w-full" wire:model="city_id">

                            <option value="" disabled selected>Seleccione una ciudad</option>


                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}"> {{ $city->name }} </option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="city_id" />


                    </div>


                    {{-- //Distritos --}}
                    <div>

                        <x-jet-label value="Distrito" />

                        <select class="form-control w-full" wire:model="district_id">

                            <option value="" disabled selected>Seleccione un distrito</option>


                            @foreach ($districts as $district)
                                <option value="{{ $district->id }}"> {{ $district->name }} </option>
                            @endforeach
                        </select>

                        <x-jet-input-error for="district_id" />


                    </div>

                    <div>
                        <x-jet-label value="Direccion" />

                        <x-jet-input wire:model="address" class="w-full" type="text" />

                        <x-jet-input-error for="address" />


                    </div>


                    <div class="col-span-2">
                        <x-jet-label value="Referencia" />

                        <x-jet-input wire:model="references" class="w-full" type="text" />

                        <x-jet-input-error for="references" />


                    </div>

                </div>

            </div>
        </div>

        <div>
            <x-button wire:loading.attr="disabled" wire:target="create_order" class="mt-3 mb-6"
                wire:click="create_order" color="blue">
                Continuar con la compra
            </x-button>

            <hr>

            <p class="text-sm">Al realizar la compra estas aceptando los terminos de privacidad <a href=""
                    class="font-semibold text-blue-700">Politicas y terminos</a></p>

        </div>
    </div>

    <div class="order-1 lg:order-2 lg:col-span-1 xl:col-span-2">

        <div class="bg-white rounded-lg shadow p-6">
            <ul>
                @forelse (Cart::content() as $item)
                    <li class="flex p-2 border-b border-trueGray-500">
                        <img class=" w-20 h-20 object-cover mr-4" src="{{ $item->options->image }}" alt="">

                        <article class="flex-1">

                            <h1 class="font-bold">{{ $item->name }}</h1>

                            <p>cant: {{ $item->qty }}</p>

                            <p>$ {{ $item->price }}</p>

                        </article>
                    </li>

                @empty
                    <div class="py-6 px-4">
                        <p class="text-center text-gray-700">
                            No tiene agregado ningun item en el carrito
                        </p>
                    </div>
                @endforelse
            </ul>

            <hr class="mt-4 mb-3">

            <div class="text-gray-700">

                <p class="flex justify-between items-center">
                    Subtotal
                    <span>$ {{ Cart::subtotal() }}</span>
                </p>

                <p class="flex justify-between items-center">
                    Envio
                    <span class="font-semibold">
                        @if ($envio_type == 1 || $shipping_cost == 0)
                            Gratis
                        @else
                            $ {{ $shipping_cost }}
                        @endif
                    </span>
                </p>

                <hr class="mt-4 mb-3">


                <p class="flex justify-between items-center font-semibold">

                    <span class="text-lg">Total</span>

                    @if ($envio_type == 1)
                        $ {{ Cart::subtotal() }}
                    @else
                        $ {{ Cart::subtotal() + $shipping_cost }}
                    @endif
                </p>

            </div>
        </div>


    </div>
</div>
