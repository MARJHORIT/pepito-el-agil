<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sistema de Cajas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <h1 class="text-xl font-bold text-gray-800">💰 Sistema de Cajas</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">Hola, {{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm transition">
                            Cerrar Sesión
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Sistema de Cajas</h2>
            <p class="text-gray-600 mb-6">Bienvenido al sistema de gestión de ingresos y egresos.</p>
            
            <!-- Tarjetas de resumen -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-lg p-6 text-white">
                    <div class="text-3xl mb-2">💰</div>
                    <h3 class="text-lg font-semibold">Total Ingresos</h3>
                    <p class="text-2xl font-bold mt-2">S/ 0.00</p>
                </div>
                
                <div class="bg-gradient-to-r from-red-500 to-red-600 rounded-lg p-6 text-white">
                    <div class="text-3xl mb-2">💸</div>
                    <h3 class="text-lg font-semibold">Total Egresos</h3>
                    <p class="text-2xl font-bold mt-2">S/ 0.00</p>
                </div>
                
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg p-6 text-white">
                    <div class="text-3xl mb-2">📊</div>
                    <h3 class="text-lg font-semibold">Saldo Actual</h3>
                    <p class="text-2xl font-bold mt-2">S/ 0.00</p>
                </div>
            </div>
            
            <!-- Botones de acción -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-8">
                <a href="#" class="bg-green-500 hover:bg-green-600 text-white text-center py-3 rounded-lg transition">
                    Registrar Ingreso
                </a>
                <a href="#" class="bg-red-500 hover:bg-red-600 text-white text-center py-3 rounded-lg transition">
                    Registrar Egreso
                </a>
                <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white text-center py-3 rounded-lg transition">
                    Gestionar Contribuyentes
                </a>
            </div>
        </div>
    </div>
</body>
</html>