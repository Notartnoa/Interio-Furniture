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
                <form class="mt-8 space-y-6 p-7 rounded-md bg-white dark:bg-orange-400 text-black dark:text-white"
                    enctype="multipart/form-data" method="post"
                    action="{{route('product.update',$product->id)}}">
                    @method('PUT')
                    @csrf
                    <div class="flex w-full gap-5">
                        <label for="UserEmail"
                            class="relative w-1/2 block overflow-hidden border-b border-gray-200 bg-transparent pt-3 focus-within:border-purple-700 dark:border-gray-700">
                            <input type="text" id="UserEmail" placeholder="Product Name" name="pname"
                                value="{{ $product->name }}"
                                class="peer h-8 w-full border-none bg-transparent p-0 placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:text-white sm:text-sm" />

                            <span
                                class="absolute start-0 top-2 -translate-y-1/2 text-xs text-black-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-2 peer-focus:text-xs dark:text-black-900">
                                Product Name
                            </span>
                        </label>
                        <label for="UserEmail"
                            class="relative block w-1/2 overflow-hidden border-b border-gray-200 bg-transparent pt-3 focus-within:border-purple-700 dark:border-gray-700">
                            <input type="number" min=0 id="UserEmail" placeholder="Price" name="price"
                                value="{{ $product->price }}"
                                class="peer h-8 w-full border-none bg-transparent p-0 placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:text-white sm:text-sm" />

                            <span
                                class="absolute start-0 top-2 -translate-y-1/2 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-2 peer-focus:text-xs dark:text-gray-200">
                                Price
                            </span>
                        </label>

                    </div>
                    <div class="relative">
                        <label for="UserEmail"
                            class="relative block overflow-hidden border-b border-gray-200 bg-transparent pt-3 focus-within:border-purple-700 dark:border-gray-700">Description
                            <textarea
                                class="peer h-8 w-full border-none bg-transparent p-0 placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:text-white sm:text-sm"
                                name="description" id="" cols="30" rows="4">{{ $product->description }}</textarea>
                        </label>
                    </div>
                    <div class="flex w-full gap-5">
                        <label for="UserEmail"
                            class="relative w-1/2 block overflow-hidden border-b border-gray-200 bg-transparent pt-3 focus-within:border-purple-700 dark:border-gray-700">
                            <input type="number" id="UserEmail" placeholder="Quantity" name="quantity"
                                value="{{ $product->quantity }}"
                                class="peer h-8 w-full border-none bg-transparent p-0 placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:text-white sm:text-sm" />

                            <span
                                class="absolute start-0 top-2 -translate-y-1/2 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-2 peer-focus:text-xs dark:text-gray-200">
                                Quantity
                            </span>
                        </label>
                        <label for="UserEmail"
                            class="relative block w-1/2 overflow-hidden border-b border-gray-200 bg-transparent pt-3 focus-within:border-purple-700 dark:border-gray-700">
                            <select id="UserEmail" placeholder="Category" name="category"
                                class="peer h-8 w-full border-none bg-transparent p-0 placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:text-white-400 sm:text-sm">
                                <option value="{{ $product->category->id }}">{{ $product->category->name }}</option>
                                @foreach ($categories as $category)
                                    @if ($product->category->name !== $category->name)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </label>

                    </div>
                    <div class="mt-8 content-center">
                        <label
                            class="w-44 flex flex-col items-center px-1 py-3  tracking-wide uppercase cursor-pointer ">
                            <img src="{{ asset('storage/' . $product->img) }}" class="rounded-md" alt="">
                            <input type="file" id="UserEmail" placeholder="Image" name="img"
                                value="{{ $product->img }}"
                                class="hidden peer h-8 w-full border-none bg-transparent p-0 placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:text-white sm:text-sm" />

                        </label>

                    </div>
                    <div>
                        <button type="submit"
                            class="block w-full text-white bg-orange-400 hover:bg-orange-900 focus:ring-4 focus:ring-orange-400 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-orange-400 dark:hover:bg-orange-900focus:outline-none dark:focus:ring-purple-800 p-4 transition hover:scale-105">Update
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
    @include('sweetalert::alert')

</body>

</html>
