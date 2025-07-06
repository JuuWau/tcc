@props([
    'id' => null,
    'label' => 'Editar',
    'onclick' => null,
])

<button @if($id) id="{{ $id }}" @endif class="gap-3 px-4 py-3 bg-gray-200 rounded-lg hover:bg-gray-300 focus:outline-none" @if($onclick) onclick="{{ $onclick }}" @endif>
    <i class="fas fa-edit"></i>
</button>