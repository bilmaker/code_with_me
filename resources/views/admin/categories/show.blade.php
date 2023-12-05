<x-app-layout>
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
            @foreach($category->subcategories as $subcategory)
                <tr
                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $subcategory->name }}
                    </th>
                    <td class="px-6 py-4">
                    {{ $subcategory->slug }}
                    </td>
                    <td class="px-6 py-4">
                        <img class="h-10 w-10 rounded-md" src="{{ Storage::url( $subcategory->image) }}"> </img>
                    </td>
                    <td class="px-6 py-4">
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