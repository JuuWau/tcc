@props([
    'id' => null,
    'label' => 'Deletar',
    'onclick' => null,
])

<button @if($id) id="{{ $id }}" @endif class="gap-3 px-3 py-2 text-gray-100 bg-red-500 rounded-lg hover:bg-red-600 focus:outline-none" @if($onclick) onclick="{{ $onclick }}" @endif>
    <i class="fas fa-trash"></i>
</button>