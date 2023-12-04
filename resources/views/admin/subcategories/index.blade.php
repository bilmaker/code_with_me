<x-app-layout>
    <div class="flex justify-end">
        <a href="{{ route('subcategories.create') }}"
            class="py-2 px-4 m-2 bg-green-500 hover:bg-green-300 text-black-50">Add SubCategory</a>
    </div>

    @if (session('message'))
    <div class="bg-green-600 text-black-200 m-2 p-2 rounded-md">{{ session('message') }}</div>
    @endif

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        SubCategory name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Slug
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sub_categories as $sub_category)
                <tr class="@if ($loop->even) even:bg-gray-50 even:dark:bg-gray-800 @else odd:bg-white odd:dark:bg-gray-900 @endif border-b dark:border-gray-700">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $sub_category->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $sub_category->slug }}
                    </td>
                    <td class="px-6 py-4">
                        <img class="h-10 w-10 rounded-md" src="{{ Storage::url($sub_category->image) }}" alt="Subcategory Image">
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('subcategories.edit', $sub_category->id) }}" class="p-2 font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <form method="POST" action="{{ route('subcategories.destroy', $sub_category->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-900 px-2">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @if ($sub_categories->isEmpty())
                <tr>
                    <td colspan="4" class="px-6 py-4">
                        <div class="m-2 p-2">No Sub Categories</div>
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</x-app-layout>
