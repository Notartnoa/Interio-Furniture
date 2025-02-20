<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/bd9b5a24ba.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @vite('resources/css/app.css')
    <title>Interio.</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

</head>

<body>
    <div
        class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-white-600 text-black dark:text-black">

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
                                categories</h1>
                            <div class="flex">
                                <a href="/add-category"
                                    class=" text-white bg-white-400 hover:bg-orange-400 focus:ring-4 focus:ring-orange-400 font-medium rounded-lg text-sm px-4 lg:px-5 py-1 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-orange-400 dark:hover:bg-orange-900 focus:outline-none dark:focus:ring-purple-800">add
                                    a new category</a>
                            </div>
                        </div>
                        <br>
                        <table class="w-full">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-white-500 uppercase border-b dark:border-orange-400 bg-orange-400 dark:text-white-400 dark:bg-white-800">
                                    <th class="px-4 py-3">Category</th>
                                    <th class="px-4 py-3">description</th>
                                    <th class="px-4 py-3">Product total</th>
                                    <th class="px-4 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-white-400 dark:bg-white-400">
                                @foreach ($categories as $category)
                                    <tr
                                        class="bg-white-50 dark:bg-white-800 hover:bg-gray-100 dark:hover:bg-orange-400 text-gray-700 dark:text-black-400">
                                        <td class="px-4 py-3">
                                            <div class="flex items-center text-sm">
                                                <div>
                                                    <p class="font-semibold">{{ $category->name }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-sm">{{ $category->description }}</td>
                                        <td class="px-4 py-3 text-sm">{{ $category->products->count() }}</td>

                                        <td class="flex px-4 py-3 text-sm gap-2">
                                                <a href="{{ url('/delete-category',$category->id) }}" onclick="confirmation(event)" ><i class="fa-solid fa-trash"></i></a>

                                            <a href="{{route('category.edit',['id'=>$category->id])}}"><i class="fa-solid fa-pen-to-square"></i></a>

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
                text:'once gone you won\'t be able to retrieve infos about this category',
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
