@props([
    'id' => null,
    'label' => 'Salvar',
    'onclick' => null,
])

<button
    type="button" @if($id) id="{{ $id }}" @endif class="text-white bg-blue-500 hover:bg-blue-700 font-medium rounded-lg shadow-md px-4 py-2 me-2" @if($onclick) onclick="{{ $onclick }}" @endif >
    {{ $label }}
</button>
