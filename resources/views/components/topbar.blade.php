<!-- Topbar -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <button id="mobileSidebarToggle" class="btn d-lg-none me-2">
                <i class="fas fa-bars"></i>
            </button>
            <h2 class="h5 mb-0 text-gray-800">@yield('title', 'Dashboard')</h2>
        </div>
        
        <div class="d-flex align-items-center">
            <div class="input-group me-3 d-none d-lg-flex" style="width: 250px;">
                <input type="text" class="form-control form-control-sm" placeholder="Pesquisar...">
                <button class="btn btn-sm btn-outline-secondary" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            
            <div class="dropdown me-3">
                <a href="#" class="d-flex align-items-center text-decoration-none" id="notificationsDropdown" data-bs-toggle="dropdown">
                    <div class="position-relative">
                        <i class="fas fa-bell text-gray-500"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 10px;">
                            {{ $unreadNotificationsCount ?? 3 }}
                        </span>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow">
                    <li><h6 class="dropdown-header">Notificações</h6></li>
                    @forelse($notifications ?? [] as $notification)
                        <li><a class="dropdown-item" href="#">{{ $notification->message }}</a></li>
                    @empty
                        <li><a class="dropdown-item text-muted" href="#">Nenhuma notificação</a></li>
                    @endforelse
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-primary" href="#">Ver todas</a></li>
                </ul>
            </div>
            
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-decoration-none" id="userDropdown" data-bs-toggle="dropdown">
                    <img src="{{ Auth::user()->avatar_url ?? 'https://randomuser.me/api/portraits/lego/1.jpg' }}" 
                        alt="{{ Auth::user()->name }}" 
                        width="32" height="32" class="rounded-circle me-2">
                    <span class="d-none d-md-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow">
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="fas fa-user me-2"></i>Perfil</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Configurações</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="fas fa-sign-out-alt me-2"></i>Sair
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>