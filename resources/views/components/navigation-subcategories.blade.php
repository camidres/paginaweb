@props(['category'])

<div class="w-full  bg-white text-sm text-gray-700 dark:text-gray-700 md:grid-cols-3 md:px-6">

    <div>
        {{--  <p class=" text-lg font-bold text-center text-trueGray-500 md-3">Subcategoria</p> --}}
        <ul class="space-y-4 sm:mb-4 md:mb-0">
            @foreach ($category->subcategories as $subcategory)
                <li class="">
                    <a href="{{route('categories.show', $category) . '?subcategoria=' . $subcategory->slug}}"
                        class="hover:underline hover:text-blue-600 dark:hover:text-blue-500">
                        {{ $subcategory->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- <div class="col-span-3">

        <img class="h-64 w-full object-cover object-center" src="{{Storage::url($category->image)}}" alt="">

    </div> --}}
</div>
