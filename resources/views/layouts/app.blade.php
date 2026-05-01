<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>EducationCDB - @yield('titulo')</title>
    <style>
        body { font-family: Arial, sans-serif; background: #eee; }
        nav { background: #333; padding: 10px 20px; overflow: hidden; }
        nav span { color: #fff; font-weight: bold; font-size: 16px; }
        nav a { float: right; color: #fff; background: #c00; padding: 6px 12px; text-decoration: none; font-size: 14px; }
        nav a:hover { background: #a00; }
        .contenido { width: 600px; margin: 30px auto; background: #fff; padding: 25px; border: 1px solid #ccc; }
        h1 { margin-bottom: 15px; border-bottom: 1px solid #ccc; padding-bottom: 8px; font-size: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        td { padding: 8px; border-bottom: 1px solid #eee; }
        td:first-child { font-weight: bold; width: 130px; color: #555; }
        .rol { display: inline-block; padding: 2px 10px; color: #fff; font-size: 13px; }
        .rol-admin    { background: #c00; }
        .rol-profesor { background: #069; }
        .rol-alumno   { background: #090; }
        .aviso { padding: 8px 12px; margin-bottom: 12px; font-size: 14px; }
        .aviso-info    { background: #d1ecf1; border: 1px solid #bee5eb; color: #0c5460; }
        .aviso-peligro { background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; }
        .aviso-exito   { background: #d4edda; border: 1px solid #c3e6cb; color: #155724; }
    </style>
</head>
<body>
    <nav>
        <span>EducationCDB</span>
        @auth
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Cerrar Sesión
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                @csrf
            </form>
        @endauth
    </nav>

    @yield('contenido')
</body>
</html>
