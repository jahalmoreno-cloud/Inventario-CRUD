<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nueva Tienda</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Registrar Nueva Tienda</h1>
            <a href="{{ route('stores.index') }}" class="text-gray-600 hover:text-gray-900 text-sm">
                &larr; Volver al listado
            </a>
        </div>

        <!-- Mostrar errores de validación si existen -->
        @if ($errors->any())
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                <strong class="font-bold">¡Atención!</strong>
                <ul class="mt-2 list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario apuntando a la ruta store -->
        <form action="{{ route('stores.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="Nombre_Tienda" class="block text-sm font-medium text-gray-700 mb-1">Nombre de la Tienda *</label>
                <input type="text" name="Nombre_Tienda" id="Nombre_Tienda" value="{{ old('Nombre_Tienda') }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="Direccion" class="block text-sm font-medium text-gray-700 mb-1">Dirección *</label>
                <input type="text" name="Direccion" id="Direccion" value="{{ old('Direccion') }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="Telefono" class="block text-sm font-medium text-gray-700 mb-1">Teléfono</label>
                    <input type="text" name="Telefono" id="Telefono" value="{{ old('Telefono') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="Email" class="block text-sm font-medium text-gray-700 mb-1">Correo Electrónico</label>
                    <input type="email" name="Email" id="Email" value="{{ old('Email') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div class="mb-6 flex items-center">
                <input type="checkbox" name="Estado_Activo" id="Estado_Activo" value="1" checked
                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                <label for="Estado_Activo" class="ml-2 block text-sm text-gray-900">Tienda Activa</label>
            </div>

            <div class="flex justify-end space-x-3">
                <a href="{{ route('stores.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 transition">
                    Cancelar
                </a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    Guardar Tienda
                </button>
            </div>
        </form>
    </div>
</body>
</html>