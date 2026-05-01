<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>EducationCDB - Registro</title>
    <style>
        
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

body {
  font-family: 'Segoe UI', system-ui, sans-serif;
  min-height: 100vh;
  background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 2rem;
}

.card {
  display: contents;
}

.brand {
  display: none;
}

.caja {
  background: rgba(255,255,255,0.05);
  border: 1px solid rgba(255,255,255,0.12);
  border-radius: 20px;
  padding: 2.75rem 2.25rem;
  width: 100%;
  max-width: 420px;
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
}

h2 {
  font-size: 22px; font-weight: 700;
  color: #ffffff; text-align: center;
  margin-bottom: 6px;
}

p {
  font-size: 13px;
  color: rgba(255,255,255,0.45);
  text-align: center;
  margin-bottom: 1.5rem;
}

label {
  display: block;
  font-size: 12px; font-weight: 500;
  color: rgba(255,255,255,0.55);
  margin-top: 1rem; margin-bottom: 6px;
  letter-spacing: 0.5px;
  text-transform: uppercase;
}

input[type=text],
input[type=email],
input[type=password] {
  width: 100%;
  padding: 11px 16px;
  background: rgba(255,255,255,0.07);
  border: 1px solid rgba(255,255,255,0.12);
  border-radius: 10px;
  font-size: 14px; color: #fff;
  outline: none;
  transition: border-color 0.2s, background 0.2s;
}

input[type=text]:focus,
input[type=email]:focus,
input[type=password]:focus {
  border-color: #818cf8;
  background: rgba(255,255,255,0.1);
}

input[type=text]::placeholder,
input[type=email]::placeholder,
input[type=password]::placeholder {
  color: rgba(255,255,255,0.25);
}

select {
  width: 100%;
  padding: 11px 16px;
  background: rgba(255,255,255,0.07);
  border: 1px solid rgba(255,255,255,0.12);
  border-radius: 10px;
  font-size: 14px; color: #fff;
  outline: none;
  cursor: pointer;
  margin-top: 0;
}

select option {
  background: #302b63;
  color: #fff;
}

.error {
  color: #fca5a5;
  font-size: 12px;
  margin-top: 4px;
  display: block;
}

.alerta {
  background: rgba(255,100,100,0.15);
  border: 1px solid rgba(255,100,100,0.3);
  color: #fca5a5;
  padding: 10px 14px;
  border-radius: 8px;
  font-size: 13px;
  margin-bottom: 1rem;
}

input[type=submit] {
  width: 100%; padding: 12px;
  background: linear-gradient(90deg, #6366f1, #a855f7);
  color: white;
  font-size: 14px; font-weight: 600;
  border: none; border-radius: 10px; cursor: pointer;
  margin-top: 1.5rem;
}

input[type=submit]:hover { opacity: 0.88; }

.pie {
  text-align: center; margin-top: 1.25rem;
  font-size: 13px; color: rgba(255,255,255,0.4);
  border-top: 1px solid rgba(255,255,255,0.08);
  padding-top: 1rem;
}

.pie a { color: #a5b4fc; font-weight: 500; text-decoration: none; }
</style>


</style>
</head>
<body>
    <div class="card">

        <div class="brand">
            <div class="brand-icon">
                <svg fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
            </div>
            <h1>EducationCDB</h1>
            <p>Bienvenida de nuevo</p>
        </div>  
    <div class="caja">
        <h2>EducationCDB</h2>
        <p style="text-align:center; color:#666; margin-bottom:15px;">Crear cuenta nueva</p>

        <form action="{{ route('registro.post') }}" method="POST">
            @csrf

            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
            @error('name') <span class="error">{{ $message }}</span> @enderror

            <label for="email">Correo:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
            @error('email') <span class="error">{{ $message }}</span> @enderror

            <label for="password">Contraseña: <small>(mínimo 6 caracteres)</small></label>
            <input type="password" id="password" name="password">
            @error('password') <span class="error">{{ $message }}</span> @enderror

            <label for="password_confirmation">Confirmar contraseña:</label>
            <input type="password" id="password_confirmation" name="password_confirmation">

            <label for="role">Rol:</label>
            <select id="role" name="role">
                <option value="">-- Selecciona un rol --</option>
                <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Estudiante</option>
                <option value="teacher" {{ old('role') == 'teacher' ? 'selected' : '' }}>Profesor</option>
            </select>
            @error('role') <span class="error">{{ $message }}</span> @enderror

            <input type="submit" value="Crear cuenta">
        </form>

        <div class="pie">
            ¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión</a>
        </div>
    </div>
</body>
</html>
