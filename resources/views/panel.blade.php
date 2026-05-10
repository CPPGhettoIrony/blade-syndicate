<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Principal</title>

    <style>
        *{ box-sizing: border-box; }

        body{
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(135deg, #0f172a, #111827);
            color: white;
            font-family: Arial, Helvetica, sans-serif;
        }

        .layout{
            display: grid;
            grid-template-columns: 320px 1fr;
            min-height: 100vh;
        }

        .sidebar{
            background-color: #1f2937;
            padding: 50px 35px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .brand{
            font-size: 42px;
            font-weight: bold;
            line-height: 1.1;
        }

        .brand span{
            color: #f59e0b;
        }

        .sidebar p{
            color: #d1d5db;
            margin-top: 25px;
            line-height: 1.6;
        }

        .main{
            padding: 60px;
        }

        .top{
            margin-bottom: 45px;
        }

        .top h1{
            font-size: 48px;
            margin: 0 0 10px;
        }

        .top p{
            color: #d1d5db;
            font-size: 18px;
        }

        .grid{
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 28px;
        }

        .card{
            background-color: #1f2937;
            border-radius: 24px;
            padding: 35px;
            min-height: 280px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border: 1px solid rgba(255,255,255,0.08);
            box-shadow: 0 18px 45px rgba(0,0,0,0.35);
            transition: 0.3s;
        }

        .card:hover{
            transform: translateY(-8px);
            border-color: #f59e0b;
        }

        .icono{
            font-size: 42px;
            margin-bottom: 20px;
        }

        .card h2{
            color: #f59e0b;
            font-size: 32px;
            margin: 0 0 12px;
        }

        .card p{
            color: #d1d5db;
            line-height: 1.5;
            margin-bottom: 30px;
        }

        .card a{
            display: inline-block;
            background-color: #f59e0b;
            color: #111827;
            padding: 14px 22px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: bold;
            text-align: center;
        }

        .card a:hover{
            background-color: #fbbf24;
        }

        .footer{
            color: #9ca3af;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <div class="layout">

        <aside class="sidebar">
            <div>
                <div class="brand">
                    Blade<br>
                    <span>Syndicate</span>
                </div>

                <p>
                    Panel interno para gestionar barberías, citas y servicios del sistema.
                </p>
            </div>

            <div class="footer">
                Proyecto Laravel CRUD
            </div>
        </aside>

        <main class="main">

            <div class="top">
                <h1>Panel Principal</h1>
                <p>Selecciona el módulo que quieres gestionar.</p>
            </div>

            <div class="grid">

                <div class="card">
                    <div>
                        <div class="icono">🏪</div>
                        <h2>Barberías</h2>
                        <p>Gestiona centros, horarios, teléfonos y direcciones.</p>
                    </div>

                    <a href="/barberias">Entrar</a>
                </div>

                <div class="card">
                    <div>
                        <div class="icono">📅</div>
                        <h2>Citas</h2>
                        <p>Administra reservas, clientes, barberos, fechas y servicios.</p>
                    </div>

                    <a href="/citas">Entrar</a>
                </div>

                <div class="card">
                    <div>
                        <div class="icono">✂️</div>
                        <h2>Servicios</h2>
                        <p>Gestiona cortes, precios, duración y descripción.</p>
                    </div>

                    <a href="/servicios">Entrar</a>
                </div>

                <div class="card">
                    <div>
                        <div class="icono">👤</div>
                        <h2>Usuarios</h2>
                        <p>Gestiona clientes, barberos, administradores y roles del sistema.</p>
                    </div>

                    <a href="/usuarios">Entrar</a>
                </div>

            </div>

        </main>

    </div>

</body>
</html>