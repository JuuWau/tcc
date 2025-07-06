@props([
    'id' => null,
    'icon' => 'fas fa-plus',
    'label' => 'Criar',
    'onclick' => null,
])

<div class="flex justify-start mb-4">
    <button
        type="button" @if($id) id="{{ $id }}" @endif class="text-white bg-blue-500 hover:bg-blue-700 font-medium rounded px-5 py-2 me-2 mb-2 focus:outline-none" @if($onclick) onclick="{{ $onclick }}" @endif >
        <i class="{{ $icon }} mr-2"></i>
        {{ $label }}
    </button>
</div>