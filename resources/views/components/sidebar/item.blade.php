@props([
'active' => false,
'icon' => '',
'text' => '',
'badge' => null,
'route' => '#'
])
<li>
    <a href="{{ $route }}"
        class="flex items-center w-full px-4 py-2 transition-colors duration-200 relative
            {{ $active 
                ? 'bg-blue-100 text-blue-600 font-semibold border-l-4 border-blue-500' 
                : 'text-gray-700 hover:bg-gray-100' }}">
        <i class="fas fa-{{ $icon }} text-lg mr-3"></i>
        <span class="item-text">{{ $text }}</span>
        @if($badge !== null)
        <span class="ml-auto bg-blue-100 text-gray-800 text-xs px-2 py-0.5 rounded-full">{{ $badge }}</span>
        @endif
        <span class="absolute left-full ml-3 top-1/2 -translate-y-1/2 bg-gray-800 text-white text-xs rounded px-2 py-1 whitespace-nowrap opacity-0 pointer-events-none group-hover:opacity-100 z-10">
            {{ $text }}
        </span>
    </a>
</li>