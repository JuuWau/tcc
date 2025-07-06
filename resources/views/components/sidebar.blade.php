<!-- resources/views/components/sidebar.blade.php -->

<div class="sidebar">
    <x-sidebar.header>
        <x-slot name="icon">
            <i class="fas fa-tooth text-blue-500 text-2xl"></i>
        </x-slot>
        <x-slot name="title">DentalCare</x-slot>
    </x-sidebar.header>

    <x-sidebar.menu>
        <x-sidebar.item 
            :active="request()->routeIs('dashboard')"
            icon="home" 
            text="Dashboard"
            :badge="null"
            :route="route('dashboard')"
        />

        <x-sidebar.dropdown icon="edit" text="Cadastros">
            <x-sidebar.item
                :active="request()->routeIs('employes.index')"
                text="Funcionários"
                :badge="null"
                icon="user-tie"
                :route="route('employes.index')"
            />
            <x-sidebar.item
                text="Dentistas"
                :badge="null"
                icon="user-graduate"
            />
            <x-sidebar.item
                text="Pacientes"
                icon="user"
                :badge="null"
            />
        </x-sidebar.dropdown>
    </x-sidebar.menu>
    
    <x-sidebar.footer 
        :avatar="Auth::user()->avatar_url ?? 'https://randomuser.me/api/portraits/lego/1.jpg'"
        :name="Auth::user()->name"
        :role="Auth::user()->role"
    />
</div>

@vite(['resources/css/sidebar.css', 'resources/js/sidebar.js'])