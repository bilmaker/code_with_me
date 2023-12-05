<x-app-layout>
    <div class="flex justify-end">
        <a href="{{ route('categories.create') }}"
            class="py-2 px-4 m-2 bg-green-500 hover:bg-green-300 text-black-50">Add Category</a>
    </div>

    @if (session('message'))
    <div class="bg-green-600 text-black-200 m-2 p-2 rounded-md"> {{session('message')}}
    </div>
    @endif

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Category name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Slug
                    </th>
                    <th scope="col" class="px-6 py-3">
                        image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr
                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $category->name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $category->slug }}
                    </td>
                    <td class="px-6 py-4">
                        <img class="h-10 w-10 rounded-md" src="{{ Storage::url($category->image) }}"> </img>
                    </td>
                    <td class="px-6 py-4">


                        <a class="text-white-500 hover:text-black-900 px-2"
                            href="{{ route('categories.show', $category) }}">View</a>



                        <br><br>
                        <a href="{{ route('categories.edit', $category->id) }}"
                            class="p-2 font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <br><br>
                        <form method="POST" action="{{ route('categories.destroy', $category->id) }}">
                            @csrf
                            @method('DELETE')
                            <a class="text-red-500 hover:text-red-900 px-2"
                                href="{{ route('categories.destroy', $category->id) }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                Delete
                            </a>
                        </form>
                    </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>

</x-app-layout>