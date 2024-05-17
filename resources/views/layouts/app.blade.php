<!DOCTYPE html>
<html lang="en">

<head>

    {{-- Header Section --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- TailwindCss Style --}}
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- flowbite Style --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    {{-- heroicons --}}
    <link rel="stylesheet"
        href="https://horizon-tailwind-react-git-tailwind-components-horizon-ui.vercel.app/static/css/main.ad49aa9b.css" />
    {{-- style css --}}
    <link rel="stylesheet" href="{{ url('css/app.css') }}">

    {{-- jQuery CDN --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <title>LARAVEL - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.6/dist/full.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="style.css">

</head>

<body class="bg-gray-100 dark:bg-gray-900 h-full">
    <div class="flex flex-col w-full border-opacity-50 p-4 bg-gray-100 dark:bg-gray-900 h-full">
        <div class="grid card rounded-box bg-gray-100 dark:bg-gray-900 drop-shadow-xl z-40">
            <div class="navbar p-2 rounded-box w-full bg-gray-100 dark:bg-gray-900">
                <div class="navbar-start">
                    <div class="dropdown z-40">
                        <label tabindex="0" class="btn btn-ghost lg:hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                            </svg>
                        </label>
                        <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-5 w-96 shadow bg-gray-900 rounded-box dark:bg-gray-100 dark:text-gray-900">
                            <li><a href="{{ route('vacances.index') }}">Vacances</a></li>
                            <li><a href="{{ route('employees.index') }}">Employees</a></li>
                            <li><a href="{{ route('departments.index') }}">Departments</a></li>
                            <li><a href="{{ route('vacances.history') }}">Vacance History</a></li>
                        </ul>
                    </div>
                    <a href="{{ route('vacances.index') }}" class="btn btn-ghost normal-case text-xl dark:text-white">Vacances de travail</a>
                </div>
                <div class="navbar-center hidden lg:flex">
                    <ul class="menu menu-horizontal px-1 dark:text-white">
                        <li><a href="{{ route('vacances.index') }}">Vacances</a></li>
                        <li><a href="{{ route('employees.index') }}">Employees</a></li>
                        <li><a href="{{ route('departments.index') }}">Departments</a></li>
                        <li><a href="{{ route('vacances.history') }}">Vacance History</a></li>
                    </ul>
                </div>
                <div class="navbar-end">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="flex items-center px-4 py-3 rounded-xl text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-800 active:bg-grey-900 focus:outline-none transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                            </svg>
                            <h1 class="ml-1">Logout</h1>
                        </button>
                    </form>
                    <label for="dark-toggle" class="flex items-center cursor-pointer ml-2">
                        <div class="btn dark:bg-yellow-500 dark:text-gray-900 border border-gray-600">
                            <input type="checkbox" name="dark-mode" id="dark-toggle" class="checkbox hidden">
                            <div class="dark:hidden flex">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                                </svg>
                            </div>
                            <div class="hidden dark:flex dark:text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L
                                        d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                                </svg>
                            </div>

                            <div class="hidden dark:flex dark:text-gray-700 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                                </svg>
                            </div>


                        </div>

                    </label>
                </div>
            </div>
        </div>

        <div class="z-30 dark:bg-gray-700 card rounded-box drop-shadow-xl  my-3">
            @if (Session::has('success'))
                <div id="alert"
                    class="flex p-4  text-green-800 rounded-box bg-green-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ml-3 text-sm font-medium">
                        {{ Session::get('success') }}
                    </div>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                        data-dismiss-target="#alert" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            @endif
            @if (Session::has('error'))
                <div id="alert-2"
                    class="flex p-4 text-red-800 rounded-box bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ml-3 text-sm font-medium">
                        {{ Session::get('error') }}

                    </div>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                        data-dismiss-target="#alert-2" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            @endif
        </div>

        <div class="bg-white z-30 dark:bg-gray-700 h-full card rounded-box drop-shadow-xl  mb-4">
            <div class="flex w-full ">
                @yield('content')
            </div>
        </div>

        <div
            class="grid z-30 card rounded-box place-items-center px-4 bg-gray-800 dark:bg-gray-700 dark:text-gray-50 drop-shadow-xl">
            <div class="p-6">
                <span class="text-muted">© {{ date('Y') }} Vacance Management Application Developped by Amghar Nada using Laravel.</span>
            </div>
        </div>
    </div>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
    <script>
        function darkModeListener() {
            document.querySelector("body").classList.toggle("dark");
        }

        document.querySelector("input[type='checkbox']#dark-toggle").addEventListener("click", darkModeListener);
    </script>
</body>

</html>
