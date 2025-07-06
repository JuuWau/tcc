
<div class="sidebar-footer flex justify-start pl-8 pb-4 pt-4 border-t border-gray-200">
    <a href="{{ route('logout') }}" 
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
       class="logout-btn"
       title="Sair">
        <i class="fas fa-sign-out-alt text-xl text-gray-500"></i>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
    </form>
</div>