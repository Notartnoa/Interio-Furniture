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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <div class="flex justify-between">
                            <h1 class="p-3 text-orange-400 dark:text-black text-center text-2xl font-semibold">All
                                products</h1>
                            <div class="flex">
                                <a href="/add-product"
                                    class=" text-white bg-orange-400 hover:bg-orange-400 focus:ring-4 focus:ring-orange-400 font-medium rounded-lg text-sm px-4 lg:px-5 py-1 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-orange-400 dark:hover:bg-orange-900 focus:outline-none dark:focus:ring-orange-400">add
                                    a new product</a>
                            </div>
                        </div>
                        <br>
                        <table class="w-full">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-white-500 uppercase border-b dark:border-orange-400 bg-orange-400 dark:text-black-400 dark:bg-white-800">
                                    <th class="px-4 py-3">Product</th>
                                    <th class="px-4 py-3">Price</th>
                                    <th class="px-4 py-3">Category</th>
                                    <th class="px-4 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-white-400 dark:bg-white-800">
                                @foreach ($products as $product)
                                    <tr
                                        class="bg-white-50 dark:bg-white-800 hover:bg-gray-100 dark:hover:bg-orange-400 text-gray-700 dark:text-black-400">
                                        <td class="px-4 py-3">
                                            <div class="flex items-center text-sm">
                                                <div>
                                                    <p class="font-semibold">{{ $product->name }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-sm">{{ $product->price }} $</td>
                                        <td class="px-4 py-3">
                                            <p class="font-semibold "> {{ $product->category->name }} </p>
                                        </td>
                                        <td class="flex px-4 py-3 text-sm gap-2">
                                                <a href="{{ url('/delete-product',$product->id) }}" onclick="confirmation(e)"><i class="fa-solid fa-trash"></i></a>

                                            <a href="{{route('product.edit',$product->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('sweetalert::alert')

    <script>
        function confirmation(e){
            e.preventDefault()
            var urlOfIt=e.currentTarget.getAttribute('href')
            console.log(urlOfIt)
            swal({
                title:'Are you sure?',
                text:'once gone you won\'t be able to retrieve infos about this product',
                icon:'warning',
                buttons:true,
                dangerMode:true,
            }).then((willCancel)=>{
                if(willCancel){
                    window.location.href=urlOfIt
                }
            })
        }
        </script>
</body>

</html>
