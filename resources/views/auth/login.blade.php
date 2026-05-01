<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>EducationCDB - Login</title>
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

            .caja {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 20px;
            padding: 2.75rem 2.25rem;
            width: 100%;
            max-width: 420px;
            backdrop-filter: blur(12px);
            }

            h2 { font-size: 22px; font-weight: 700; color: #ffffff; text-align: center; margin-bottom: 6px; }

            p { font-size: 13px; color: rgba(255,255,255,0.45); text-align: center; margin-bottom: 1.5rem; }

            label {
            display: block;
            font-size: 12px; font-weight: 500;
            color: rgba(255,255,255,0.55);
            margin-top: 1rem; margin-bottom: 6px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            }

            input[type=email], input[type=password] {
            width: 100%;
            padding: 11px 16px;
            background: rgba(255,255,255,0.07);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 10px;
            font-size: 14px; color: #fff;
            outline: none;
            }

            input[type=email]:focus, input[type=password]:focus {
            border-color: #818cf8;
            background: rgba(255,255,255,0.1);
            }

            input[type=email]::placeholder, input[type=password]::placeholder {
            color: rgba(255,255,255,0.25);
            }

            .error { color: #fca5a5; font-size: 12px; margin-top: 4px; display: block; }

            .alerta {
            background: rgba(255,100,100,0.15);
            border: 1px solid rgba(255,100,100,0.3);
            color: #fca5a5;
            padding: 10px 14px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 1rem;
            }

            label:has(input[type=checkbox]) {
            display: flex; align-items: center; gap: 8px;
            font-size: 13px; color: rgba(255,255,255,0.45);
            text-transform: none; letter-spacing: 0;
            margin-top: 1rem;
            }

            input[type=checkbox] { accent-color: #818cf8; width: 15px; height: 15px; }

input[type=submit] {
  width: 100%; padding: 12px;
  background: linear-gradient(90deg, #6366f1, #a855f7);
  color: white;
  font-size: 14px; font-weight: 600;
  border: none; border-radius: 10px; cursor: pointer;
  margin-top: 1.5rem;
}

.pie {
  text-align: center; margin-top: 1.25rem;
  font-size: 13px; color: rgba(255,255,255,0.4);
  border-top: 1px solid rgba(255,255,255,0.08);
  padding-top: 1rem;
}

.pie a { color: #a5b4fc; font-weight: 500; text-decoration: none; }
</style>
      
    
</head>
<body>
    
    <div class="caja">
        <h2>EducationCDB</h2>
        <p style="text-align:center; color:#666; margin-bottom:15px;">Iniciar sesión</p>

        @if ($errors->has('email') && !$errors->has('password'))
            <div class="alerta">{{ $errors->first('email') }}</div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf

            <label for="email">Correo:</label>
            <input type="email" id="email" name="email"
                value="{{ old('email', request()->cookie('email_recordado', '')) }}">
            @error('email') <span class="error">{{ $message }}</span> @enderror

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password">
            @error('password') <span class="error">{{ $message }}</span> @enderror

            <label style="margin-top:10px;">
                <input type="checkbox" name="recordarme" value="1"
                    {{ request()->cookie('email_recordado') ? 'checked' : '' }}>
                Recordarme
            </label>

            <input type="submit" value="Entrar">
        </form>

        <div class="pie">
            ¿No tienes cuenta? <a href="{{ route('registro') }}">Regístrate</a>
        </div>
    </div>
</body>
</html>
