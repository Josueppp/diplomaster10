<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-D...etc..." crossorigin="anonymous" referrerpolicy="no-referrer" />
 <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Mi Proyecto')</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px 40px;
            background-color: #f5f5f5; /* fondo claro */
            color: #333; /* texto oscuro */
        }
        header {
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #0b1e40; /* azul oscuro barra */
            padding: 12px 20px;
            border-radius: 8px;
            box-shadow: 0 3px 6px rgba(11, 30, 64, 0.5);
        }
        h1 {
            color: #bbdefb; /* azul claro para título */
            margin: 0;
            font-weight: 700;
            font-size: 2em;
        }
        nav a {
            margin-right: 15px;
            text-decoration: none;
            color: #bbdefb; /* azul claro */
            font-weight: bold;
            font-size: 1.1em;
            padding: 6px 10px;
            border-radius: 6px;
            transition: background-color 0.3s, color 0.3s;
        }
        nav a:hover {
            background-color: #144a9c; /* azul medio */
            color: #e0e7ff; /* texto más claro */
        }
        form button {
            background:none;
            border:none;
            color:#bbdefb;
            cursor:pointer;
            font-weight:bold;
            padding: 6px 10px;
            font-size: 1.1em;
            border-radius: 6px;
            transition: background-color 0.3s, color 0.3s;
        }
        form button:hover {
            background-color: #144a9c;
            color: #e0e7ff;
        }
        main {
            background: white; /* fondo blanco para el contenido */
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
            color: #333;
            min-height: 300px;
        }
        footer {
            margin-top: 40px;
            text-align: center;
            color: #777;
            font-size: 0.9em;
        }
        .success {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            padding: 12px 15px;
            margin-bottom: 15px;
            border-radius: 6px;
            box-shadow: 0 0 6px #a3d3a1;
        }
        .error {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
            padding: 12px 15px;
            margin-bottom: 15px;
            border-radius: 6px;
            box-shadow: 0 0 6px #d88b8b;
        }
    </style>
</head>
<body>
    <header>
        <h1>Diplomaster</h1>
        <nav>
            @auth
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <a href="{{ route('profile.edit') }}">Perfil</a>
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit">Salir</button>
                </form>
            @else
                <a href="{{ route('login') }}">Iniciar Sesión</a>
            @endauth
        </nav>
    </header>

    <main>
        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="error">{{ session('error') }}</div>
        @endif

        @yield('content')
    </main>

    <footer>
        &copy; {{ date('Y') }} Diplomaster. Todos los derechos reservados.
    </footer>
</body>
</html>
