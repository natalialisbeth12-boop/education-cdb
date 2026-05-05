<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>EducationCDB - @yield('titulo')</title>
    <style>
  /* Basee */
  *, *::before, *::after { box-sizing: border-box; }
  body {
    font-family: 'Segoe UI', Arial, sans-serif;
    background: #e8e8e8;
    margin: 0;
  }

  /* Navv */
  nav {
    background: #2b2b2b;
    padding: 12px 24px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  nav span { color: #fff; font-weight: 700; font-size: 15px; letter-spacing: 0.5px; }
  nav a {
    color: #fff;
    background: #c0392b;
    padding: 7px 14px;
    text-decoration: none;
    font-size: 13px;
    font-weight: 500;
    border-radius: 3px;
    transition: background 0.15s;
  }
  nav a:hover { background: #a93226; }

  /* Layoutt */
  .page-wrap { padding: 32px 28px; }
  .section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
  }

  /* Tipografiaa */
  h1 { font-size: 22px; font-weight: 700; color: #1a1a1a; margin: 0; }

  /* Tablaa - index.blade.php */
  .table-wrap {
    background: #fff;
    border-radius: 6px;
    border: 1px solid #ddd;
    overflow: hidden;
  }
  table { width: 100%; border-collapse: collapse; font-size: 13.5px; }
  thead { background: #2b2b2b; }
  th {
    color: #e0e0e0;
    font-weight: 600;
    padding: 11px 16px;
    text-align: left;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.6px;
  }
  tbody tr {
    border-bottom: 1px solid #f0f0f0;
    transition: background 0.15s;
  }
  tbody tr:last-child { border-bottom: none; }
  tbody tr:hover { background: #f7f8fc; }
  td { padding: 12px 16px; color: #333; vertical-align: middle; }

  /* Badges Rool - index.blade.php */
  .rol-badge {
    display: inline-block;
    padding: 3px 10px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.4px;
    text-transform: uppercase;
  }
  .rol-admin    { background: #fdecea; color: #c0392b; border: 1px solid #f5c6cb; }
  .rol-profesor { background: #e8f0fe; color: #1a56c0; border: 1px solid #b8d0f8; }
  .rol-alumno   { background: #e6f9f0; color: #1a7a4a; border: 1px solid #b2dfc8; }

  /* Accioness - index.blade.php */
  .acciones { display: flex; gap: 8px; align-items: center; }
  .btn-editar, .btn-eliminar {
    padding: 5px 12px;
    border-radius: 3px;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.15s;
    background: transparent;
  }
  .btn-editar  { color: #2c3e8c; border: 1px solid #2c3e8c; }
  .btn-editar:hover  { background: #2c3e8c; color: #fff; }
  .btn-eliminar { color: #c0392b; border: 1px solid #c0392b; }
  .btn-eliminar:hover { background: #c0392b; color: #fff; }

  /* Boton Crearr - index.blade.php y teacher.blade.php */
  .btn-crear {
    background: #2c3e8c;
    color: #fff;
    padding: 8px 18px;
    border-radius: 4px;
    font-size: 13px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    letter-spacing: 0.3px;
    transition: background 0.15s;
  }
  .btn-crear:hover { background: #1e2d6b; }

  /* Modall - index.blade.php */
  .modal-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.4);
    z-index: 100;
    align-items: center;
    justify-content: center;
  }
  .modal-overlay.activo { display: flex; }
  .modal {
    background: #fff;
    border-radius: 8px;
    padding: 28px 32px;
    width: 360px;
    text-align: center;
    border: 1px solid #ddd;
  }
  .modal h2 { font-size: 18px; font-weight: 700; margin-bottom: 8px; color: #1a1a1a; }
  .modal p { font-size: 14px; color: #666; margin-bottom: 24px; }
  .modal-botones { display: flex; gap: 10px; justify-content: center; }
  .btn-cancelar {
    padding: 9px 20px;
    border-radius: 4px;
    font-size: 13px;
    font-weight: 600;
    border: 1px solid #ccc;
    background: transparent;
    color: #555;
    cursor: pointer;
    transition: all 0.15s;
  }
  .btn-cancelar:hover { background: #f0f0f0; }
  .btn-confirmar {
    padding: 9px 20px;
    border-radius: 4px;
    font-size: 13px;
    font-weight: 600;
    border: none;
    background: #c0392b;
    color: #fff;
    cursor: pointer;
    transition: background 0.15s;
  }
  .btn-confirmar:hover { background: #a93226; }

  /* Form Card - create.blade.php y edit.blade.php */
  .form-card {
    background: #fff;
    border-radius: 6px;
    border: 1px solid #ddd;
    padding: 28px 32px;
    max-width: 480px;
    margin: 0 auto;
  }

  /* Form Header - create.blade.php y edit.blade.php */
  .form-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
    padding-bottom: 16px;
    border-bottom: 1px solid #eee;
  }
  .form-header h1 { font-size: 20px; }

  /* Btn Volver - create.blade.php y edit.blade.php */
  .btn-volver {
    font-size: 13px;
    color: #555;
    text-decoration: none;
    border: 1px solid #ccc;
    padding: 5px 12px;
    border-radius: 3px;
    transition: all 0.15s;
  }
  .btn-volver:hover { background: #f0f0f0; color: #333; }

  /* Camposs - create.blade.php y edit.blade.php */
  .campo {
    display: flex;
    flex-direction: column;
    gap: 6px;
    margin-bottom: 18px;
  }
  .campo label {
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: #777;
  }
  .campo input,
  .campo select {
    padding: 9px 12px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
    color: #1a1a1a;
    background: #fafafa;
    transition: border 0.15s;
    outline: none;
    width: 100%;
  }
  .campo input:focus,
  .campo select:focus {
    border-color: #2c3e8c;
    background: #fff;
  }

  /* Btn Actualizar - edit.blade.php */
  .btn-actualizar {
    background: #2c3e8c;
    color: #fff;
    border: none;
    padding: 10px 24px;
    border-radius: 4px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    width: 100%;
    transition: background 0.15s;
  }
  .btn-actualizar:hover { background: #1e2d6b; }

  /* Btn Guardar - create.blade.php */
  .btn-guardar {
    background: #1a7a4a;
    color: #fff;
    border: none;
    padding: 10px 24px;
    border-radius: 4px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    width: 100%;
    transition: background 0.15s;
  }
  .btn-guardar:hover { background: #145c38; }

  /* Panell - teacher.blade.php y student.blade.php */
  .contenido {
    width: 680px;
    margin: 30px auto;
    background: #fff;
    padding: 28px;
    border-radius: 6px;
    border: 1px solid #ddd;
  }
  .rol { display: inline-block; padding: 3px 10px; border-radius: 12px; font-size: 11px; font-weight: 700; text-transform: uppercase; }
  .rol-admin    { background: #fdecea; color: #c0392b; border: 1px solid #f5c6cb; }
  .rol-profesor { background: #e8f0fe; color: #1a56c0; border: 1px solid #b8d0f8; }
  .rol-alumno   { background: #e6f9f0; color: #1a7a4a; border: 1px solid #b2dfc8; }

  /* Avisoss - teacher.blade.php y student.blade.php */
  .aviso { padding: 10px 14px; margin-bottom: 14px; font-size: 14px; border-radius: 4px; }
  .aviso-info    { background: #e8f0fe; border: 1px solid #b8d0f8; color: #1a56c0; }
  .aviso-peligro { background: #fdecea; border: 1px solid #f5c6cb; color: #c0392b; }
  .aviso-exito   { background: #e6f9f0; border: 1px solid #b2dfc8; color: #1a7a4a; }
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
