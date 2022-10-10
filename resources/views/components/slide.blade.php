{{-- <style>
    .slider {

        width: 95%;
        height: 400px;
        margin: auto;
        overflow: hidden;

    }


    .slider ul {

        display: flex;
        padding: 0;
        width: 300%;


        animation: cambio 20s infinite alternate;

    }


    .slider li {
        width: 100%;
        list-style: none;

    }

    .slider img {
        width: 100%;
        height: 400px;
        border-radius: 10px;
    }

    @keyframes cambio {

        0% {
            margin-left: 0;
        }

        35% {
            margin-left: 0;
        }

        40% {
            margin-left: -100%
        }

        75% {
            margin-left: -100%
        }

        80% {
            margin-left: -200%
        }

        100% {
            margin-left: -200%
        }


    }
</style>




<div class="mb-8">


    <div class="slider">

        <ul>
            <li><img src="{{ asset('img/slide1.png') }}" alt=""></li>
            <li><img src="{{ asset('img/slide2.png') }}" alt=""></li>
            <li><img src="{{ asset('img/slide3.png') }}" alt=""></li>

        </ul>

    </div>

</div> --}}


<div class="glider-contain">
    <ul class="glider">
        <li class="mb-6 " ><img class="w-full rounded-lg" style="height: 450px" src="{{ asset('img/slide1.png') }}" alt=""></li>
        <li class="mb-6 " ><img class="w-full rounded-lg" style="height: 450px" src="{{ asset('img/slide2.png') }}" alt=""></li>
        <li class="mb-6 " ><img class="w-full rounded-lg" style="height: 450px" src="{{ asset('img/slide3.png') }}" alt=""></li>


    </ul>

    <button aria-label="Previous" class="glider-prev mt-10"><i class="fas fa-chevron-left bg-white p-3 rounded-lg "></i></button>
    <button aria-label="Next" class="glider-next mt-10 "><i class="fas fa-chevron-right bg-white p-3 rounded-lg "></i></button>
    <div role="tablist" class="dots"></div>
</div>

@push('script')
    <script>
        new Glider(document.querySelector('.glider'), {
            slidesToShow: 1,
            dots: '#dots',
            draggable: true,
            arrows: {
                prev: '.glider-prev',
                next: '.glider-next'
            }
        });
    </script>
@endpush
