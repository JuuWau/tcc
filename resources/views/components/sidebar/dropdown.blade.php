@props([
    'icon' => '',
    'text' => '',
    'open' => false, 
])

<li class="sidebar-dropdown">
    <button type="button" class="dropdown-tog flex items-center w-full px-4 py-2 transition-colors duration-200 relative text-gray-700">
        <i class="fas fa-{{ $icon }} text-lg mr-3 pl-0.5"></i>
        <span class="item-text bold">{{ $text }}</span>
        <i class="dropdown-sub-item fas fa-chevron-down ml-auto text-sm"></i>
    </button>
    <ul class="sidebar-submenu hidden mt-1 space-y-1 pl-5 pr-4 py-1 text-sm">
        {{ $slot }}
    </ul>
</li>
