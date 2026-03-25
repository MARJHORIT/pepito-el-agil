<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Pepito El Ágil</title>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Sora', sans-serif;
            background: linear-gradient(135deg, #0a0f1e 0%, #0f172a 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .register-container {
            width: 100%;
            max-width: 480px;
        }
        
        .register-card {
            background: rgba(17, 24, 39, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(0,180,216,0.3);
            border-radius: 24px;
            padding: 40px;
        }
        
        .logo {
            text-align: center;
            margin-bottom: 32px;
        }
        
        .logo-badge {
            display: inline-block;
            background: linear-gradient(135deg, #0077b6, #00b4d8);
            color: white;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 3px;
            padding: 6px 14px;
            border-radius: 8px;
            margin-bottom: 16px;
        }
        
        .logo h1 {
            font-size: 24px;
            color: white;
            margin-bottom: 8px;
        }
        
        .logo p {
            font-size: 13px;
            color: #94a3b8;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-size: 12px;
            font-weight: 500;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        input {
            width: 100%;
            padding: 12px 16px;
            background: #1a2235;
            border: 1px solid #1e3a5f;
            border-radius: 12px;
            color: #e2e8f0;
            font-family: 'Sora', sans-serif;
            font-size: 14px;
        }
        
        input:focus {
            outline: none;
            border-color: #00b4d8;
        }
        
        .btn-register {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #0077b6, #00b4d8);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 8px;
        }
        
        .login-link {
            text-align: center;
            margin-top: 24px;
            font-size: 13px;
            color: #94a3b8;
        }
        
        .login-link a {
            color: #00b4d8;
            text-decoration: none;
        }
        
        .error-message {
            background: rgba(239,71,111,0.1);
            border: 1px solid #ef476f;
            color: #ef476f;
            padding: 12px;
            border-radius: 12px;
            font-size: 13px;
            margin-bottom: 20px;
        }
        
        .error-text {
            color: #ef476f;
            font-size: 11px;
            margin-top: 4px;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-card">
            <div class="logo">
                <div class="logo-badge">PEPITO</div>
                <h1>Crear Cuenta</h1>
                <p>Regístrate para comenzar</p>
            </div>
            
            @if($errors->any())
                <div class="error-message">
                    ⚠️ Por favor, corrige los siguientes errores:
                    <ul style="margin-top: 8px; margin-left: 20px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label>👤 NOMBRE COMPLETO</label>
                    <input type="text" name="name" value="{{ old('name') }}" required>
                </div>
                
                <div class="form-group">
                    <label>📧 CORREO ELECTRÓNICO</label>
                    <input type="email" name="email" value="{{ old('email') }}" required>
                </div>
                
                <div class="form-group">
                    <label>🔒 CONTRASEÑA</label>
                    <input type="password" name="password" required>
                </div>
                
                <div class="form-group">
                    <label>🔒 CONFIRMAR CONTRASEÑA</label>
                    <input type="password" name="password_confirmation" required>
                </div>
                
                <button type="submit" class="btn-register">
                    REGISTRARSE →
                </button>
            </form>
            
            <div class="login-link">
                ¿Ya tienes una cuenta? <a href="{{ route('login') }}">Inicia sesión aquí</a>
            </div>
        </div>
    </div>
</body>
</html>