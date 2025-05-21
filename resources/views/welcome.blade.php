<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>INSTA LAFONTETA</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-[#FDFDFC] text-[#1b1b18] flex p-6 items-center  min-h-screen flex-col">
    <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
        <nav class="flex items-center">
            <div class="row d-flex justify-content-center align-items-center me-auto w-100">
                <div class="col-auto">
                    <a class="bg-warning" href="{{ url('/home') }}">
                        <img src="{{ asset('axolotl.svg') }}" alt="logo insta_lafonteta" width="70">
                    </a>
                </div>
                <div class="col px-0 mx-0"> <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        <i class="fa-solid fa-home"></i> {{ __('Home') }}
                    </x-responsive-nav-link></div>
                <div class="col px-0 mx-0"><x-responsive-nav-link :href="route('nube')" :active="request()->routeIs('nube')">
                        <i class="fa-solid fa-cloud"></i> {{ __('Nube') }}
                    </x-responsive-nav-link></div>


            </div>
            @if (Route::has('login'))
            <!-- <div class=""> -->
            @auth
            <!-- <a
                    href="{{ url('/home') }}"
                    class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                    Home
                </a> -->


            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3  text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        <div>{{ Auth::user()->name }}</div>

                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>

            @else
            <a
                href="{{ route('login') }}"
                class="btn btn-outline-primary btn-sm col-auto mx-1">
                Log in
            </a>

            @if (Route::has('register'))
            <a
                href="{{ route('register') }}"
                class="btn btn-outline-secondary btn-sm  col-auto  mx-1">
                Register
            </a>
            @endif
            @endauth
            <!-- </div> -->
            @endif
        </nav>

    </header>
    @if(request()->routeIs('nube'))
    @include('layouts.nube')
    @else
    @include('layouts.home')
    @endif
    </div>

    @if (Route::has('login'))
    <div class="h-14.5 hidden lg:block"></div>
    @endif
</body>

</html>


<script>
    let str = '';
</script>
@if (session('msgCreated'))

<script>
    str = "Mensaje enviado!";

    Swal.fire({
        icon: "success",
        title: str,
        showConfirmButton: false,
        timer: 700
    });
</script>
@elseif(session('commentCreated'))
<script>
    str = "Comentario enviado!";

    Swal.fire({
        icon: "success",
        title: str,
        showConfirmButton: false,
        timer: 700
    });
</script>
@elseif(session('manipulator'))
<script>
    str = "Esta acción es solo para ADMIN!";

    Swal.fire({
        icon: "error",
        title: str,
        showConfirmButton: false,
        timer: 700
    });
</script>

@elseif(session('commentDel'))
<script>
    str = "Comentario eliminado con éxito!";

    Swal.fire({
        icon: "success",
        title: str,
        showConfirmButton: false,
        timer: 700
    });
</script>
@elseif(session('msgDel'))
<script>
    str = "Mensaje eliminado con éxito!";

    Swal.fire({
        icon: "success",
        title: str,
        showConfirmButton: false,
        timer: 700
    });
</script>
@elseif (session('msgEdited'))

<script>
    str = "Mensaje editado con éxito!";

    Swal.fire({
        icon: "success",
        title: str,
        showConfirmButton: false,
        timer: 700
    });
</script>
@elseif (session('commentEdited'))

<script>
    str = "Comentario editado con éxito!";

    Swal.fire({
        icon: "success",
        title: str,
        showConfirmButton: false,
        timer: 700
    });
</script>
@endif