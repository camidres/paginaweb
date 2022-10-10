<x-app-layout>






    <div class="container py-8 ">

        <x-slide></x-slide>


        @foreach ($categories as $category)
            <section class="mb-4">


                @livewire('category-products', ['category' => $category])
            </section>
        @endforeach
    </div>



</x-app-layout>
