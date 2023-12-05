<x-app-layout>
<h1>{{ $category->name }}</h1>

<ul>
  @foreach($category->subcategories as $subcategory)
    <li>{{ $subcategory->name }}</li> 
  @endforeach
</ul>
</x-app-layout>