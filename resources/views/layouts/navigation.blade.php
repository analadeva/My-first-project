<!-- Primary Navigation Menu -->
<nav>   
    <div>

        <div>
            @if(isset(Auth::user()->img))
            <div class="d-flex">
                <div class="col-12 col-md-8 col-lg-3">
            <img class="rounded-circle mr-0 mr-md-3 img-fluid" src="{{ asset(Storage::url(Auth::user()->img)) }}" alt="">
                </div>
                <div>
                    <b class="d-none d-md-block d-lg-block mt-0 mt-md-3 mt-lg-2">{{Auth::user()->name}} {{Auth::user()->surname}}</b>
                    <p class="d-none d-md-none d-lg-block">{{Auth::user()->email}}</p>
                </div>
            </div>
            @else
            <div class="d-flex">
                <div class="col-12 col-md-8 col-lg-3">
            <img class="rounded-circle mr-0 mr-md-3 img-fluid" src="https://static.vecteezy.com/system/resources/thumbnails/001/840/618/small/picture-profile-icon-male-icon-human-or-people-sign-and-symbol-free-vector.jpg" alt="">
                </div>
                <div>
                    <b class="d-none d-md-block d-lg-block mt-0 mt-md-3 mt-lg-2">{{Auth::user()->name}} {{Auth::user()->surname}}</b>
                    <p class="d-none d-md-none d-lg-block">{{Auth::user()->email}}</p>
                </div>
            </div>
            @endif
            <div class="pl-3">
                <a class="text-dark mt-3 w-100 mb-2 p-2 d-flex item rounded" data-color="pink" href="{{route('product')}}"><i class="fa-solid fa-clover"></i><p class="ml-2 d-none d-md-block d-lg-block">Vintage Облека</p></a>
                <a class="text-dark w-100 mb-2 p-2 d-flex item rounded" data-color="pink" href="{{route('discount')}}"><i class="fa-solid fa-percent"></i><p class="ml-2 d-none d-md-block d-lg-block">Попусти / промо</p></a>
                <a class="text-dark w-100 mb-2 p-2 d-flex item rounded" data-color="pink" href="{{route('brand')}}"><i class="fa-solid fa-o"></i><p class="ml-2 d-none d-md-block d-lg-block">Брендови</p></a>
                <a class="text-dark w-100 mb-2 p-2 d-flex item rounded" data-color="pink" href="{{route('profile')}}"><i class="fa-solid fa-user"></i><p class="ml-2 d-none d-md-block d-lg-block">Профил</p></a>
</div>
        </div>

        <div class="logout-form mb-5">
            <hr style="width:20%;">
            <form action="{{route('logout')}}" method="POST" class="pl-3">
                @csrf
                <button class="p-2 d-flex"><i class="fa-solid fa-right-from-bracket"></i> <p class="ml-2 d-none d-md-block d-lg-block">Одјави се</p></button>
            </form>
        </div>

    </div>
</nav>




<script>
    document.addEventListener('DOMContentLoaded', function() {
        const items = document.querySelectorAll('.item');
        const currentUrl = window.location.href;

        items.forEach(item => {
            const itemUrl = item.getAttribute('href');

            if (currentUrl.includes(itemUrl)) {
                item.style.backgroundColor = item.dataset.color;
            }

            item.addEventListener('click', function() {
                items.forEach(otherItem => {
                    otherItem.style.backgroundColor = '';
                });

                this.style.backgroundColor = this.dataset.color;
            });
        });
    });

    document.getElementById("searchInput").addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("searchForm").submit();
        }
    });
</script>
