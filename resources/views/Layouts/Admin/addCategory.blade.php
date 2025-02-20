<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/bd9b5a24ba.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Interio.</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

</head>

<body>
    <div
        class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-white-600 text-black dark:text-white">

        <!-- Header -->
        @component('Layouts.Components.header')
        @endcomponent
        <!-- ./Header -->

        <!-- Sidebar -->
        @component('Layouts.Components.dashboard')
        @endcomponent
        <!-- ./Sidebar -->
        <div class="h-full ml-14 mt-14 mb-10 md:ml-64">
            <div class="mt-4 mx-4">
                <form class="mt-8 space-y-6 p-7 rounded-md bg-white dark:bg-orange-400 text-black dark:text-white" action="{{route('category.add')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="flex w-full gap-5">
                        <label for="UserEmail"
                            class="relative w-full block overflow-hidden border-b border-gray-200 bg-transparent pt-3 focus-within:border-purple-700 dark:border-gray-700">
                            <input type="text" id="UserEmail" placeholder="Category Name" name="cname"
                                class="peer h-8 w-full border-none bg-transparent p-0 placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:text-white sm:text-sm" />

                            <span
                                class="absolute start-0 top-2 -translate-y-1/2 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-2 peer-focus:text-xs dark:text-gray-200">
                                Category Name
                            </span>
                        </label>

                    </div>
                    <div class="relative">
                        <label for="UserEmail"
                            class="relative block overflow-hidden border-b border-gray-200 bg-transparent pt-3 focus-within:border-purple-700 dark:border-gray-700">
                           <textarea class="peer h-8 w-full border-none bg-transparent p-0 placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:text-white sm:text-sm" name="description" id="" cols="30" rows="4" >Description</textarea>
                        </label>
                    </div>
                    <div>
                        <button type="submit"
                            class="block w-full text-white bg-orange-400 hover:bg-orange-400 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:orange-400 dark:hover:bg-orange-500 focus:outline-none dark:focus:ring-purple-800 p-4 transition hover:scale-105">Add
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')

</body>

</html>
