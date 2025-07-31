@props([
    'id' => null,
    'label' => 'Editar',
    'onclick' => null,
])

<button @if($id) id="{{ $id }}" @endif class="gap-3 px-3 py-2 bg-yellow-300 rounded-lg hover:bg-yellow-400 focus:outline-none" @if($onclick) onclick="{{ $onclick }}" @endif>
    <i class="fas fa-edit"></i>
</button>