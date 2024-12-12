<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diseño Responsive</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>
<body>
    <div class="hoja">
        <!-- resources/views/layouts/header.blade.php -->

        <header class="header">
            <div class="header-container"> <!-- Nuevo contenedor -->
                <!-- Logo a la izquierda -->
                <div class="logo">
                    <a href="">
                        <img src="{{ asset('img/logo.webp') }}" alt="Logo OP" class="logo-img">
                    </a>
                </div>

                <!-- Botones a la derecha -->
                <div class="botones">
                    @if(Auth::check()) <!-- Si el usuario está autenticado -->
                        <div class="dropdown">
                            <div class="user-info">
                                <span>Hola, <b>{{ Auth::user()->name }}</b></span>
                                <i class="fas fa-caret-down"></i>
                            </div>

                            <!-- Menú desplegable -->
                            <div class="dropdown-content">
                                <a href="{{ route('perfil') }}">
                                    <i class="fas fa-user"></i> Mi Perfil
                                </a>
                                <a href="{{ route('mis-pedidos') }}">
                                    <i class="fas fa-box"></i> Mis Pedidos
                                </a>
                                <form action="{{ route('logout') }}" method="POST" class="form-logout">
                                    @csrf
                                    <button type="submit">
                                        <i class="fas fa-sign-out-alt"></i> Cerrar sesión
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else <!-- Si el usuario no está autenticado -->
                        <a href="{{ route('login') }}" class="btn">
                            <i class="fas fa-sign-in-alt"></i> Iniciar sesión
                        </a>
                        <a href="{{ route('register') }}" class="btn">
                            <i class="fas fa-user-plus"></i> Registrar
                        </a>
                    @endif
                </div>

            </div>
        </header>