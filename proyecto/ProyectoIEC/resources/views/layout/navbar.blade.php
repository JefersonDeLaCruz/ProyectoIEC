<div class="navbar bg-base-100 shadow-sm fixed top-0 z-50">
    <div class="navbar-start">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </div>
            <ul tabindex="-1" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                <li><a href="{{ route('home') }}">Calculadora</a></li>
                <li><a href="{{ route('historial') }}">Historial</a></li>
                <li><a href="{{ route('ejercicios') }}">Ejercicios</a></li>
            </ul>
        </div>
        <a class="btn btn-ghost text-xl" href="{{ route('home') }}">Anualidades Anticipadas | Trinity</a>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1">
            <li>
                <a class="font-bold" href="{{ route('home') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-calculator-icon lucide-calculator">
                        <rect width="16" height="20" x="4" y="2" rx="2" />
                        <line x1="8" x2="16" y1="6" y2="6" />
                        <line x1="16" x2="16" y1="14" y2="18" />
                        <path d="M16 10h.01" />
                        <path d="M12 10h.01" />
                        <path d="M8 10h.01" />
                        <path d="M12 14h.01" />
                        <path d="M8 14h.01" />
                        <path d="M12 18h.01" />
                        <path d="M8 18h.01" />
                    </svg>
                    Calculadora
                </a>
            </li>
            <li><a class="font-bold" href="{{ route('historial') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-folder-clock-icon lucide-folder-clock">
                        <path d="M16 14v2.2l1.6 1" />
                        <path
                            d="M7 20H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h3.9a2 2 0 0 1 1.69.9l.81 1.2a2 2 0 0 0 1.67.9H20a2 2 0 0 1 2 2" />
                        <circle cx="16" cy="16" r="6" />
                    </svg>Historial
                </a>
            </li>
            <li><a class="font-bold" href="{{ route('ejercicios') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-book-open-text">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
                        <path d="M6 8h2" />
                        <path d="M6 12h2" />
                        <path d="M16 8h2" />
                        <path d="M16 12h2" />
                    </svg>
                    Ejercicios
                </a>
            </li>
        </ul>
    </div>
    <div class="navbar-end">
    </div>
</div>