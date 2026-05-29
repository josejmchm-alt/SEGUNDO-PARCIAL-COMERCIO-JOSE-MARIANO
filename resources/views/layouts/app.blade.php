<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Productos</title>
    <style>
        :root {
            --amazon-blue: #131921;
            --amazon-yellow: #febd69;
            --amazon-light: #f3f3f3;
            --amazon-dark: #232f3e;
            --text-dark: #111;
            --border: #d5d9d9;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            background-color: #eaeded;
            color: var(--text-dark);
        }

        .site-header {
            background: linear-gradient(90deg, var(--amazon-blue), #232f3e);
            color: white;
            padding: 14px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .brand {
            font-size: 1.4rem;
            letter-spacing: 0.05em;
            font-weight: 700;
        }

        .brand span {
            color: var(--amazon-yellow);
        }

        .search-bar {
            flex: 1;
            display: flex;
            max-width: 700px;
            border-radius: 4px;
            overflow: hidden;
            border: 1px solid transparent;
            background: white;
        }

        .search-bar input {
            width: 100%;
            border: 0;
            padding: 12px 14px;
            font-size: 0.95rem;
            outline: none;
        }

        .search-bar button {
            border: none;
            background: var(--amazon-yellow);
            color: var(--amazon-blue);
            font-weight: 700;
            padding: 0 18px;
            cursor: pointer;
        }

        .top-actions a {
            background: var(--amazon-yellow);
            color: var(--amazon-blue);
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 4px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
        }

        .main-content {
            max-width: 1200px;
            margin: 24px auto;
            padding: 0 16px;
        }

        .page-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(15, 17, 17, 0.08);
            padding: 24px;
            margin-bottom: 20px;
        }

        .alert-success {
            padding: 14px 18px;
            background-color: #d4edda;
            color: #155724;
            border-radius: 6px;
            margin-bottom: 18px;
        }

        .alert-danger {
            padding: 14px 18px;
            background-color: #f8d7da;
            color: #721c24;
            border-radius: 6px;
            margin-bottom: 18px;
        }

        .section-title {
            margin: 0 0 12px;
            font-size: 1.8rem;
            font-weight: 700;
        }

        .section-subtitle {
            margin: 0 0 22px;
            color: #555;
            font-size: 0.96rem;
        }

        .product-grid {
            display: grid;
            gap: 18px;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        }

        .product-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 10px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            min-height: 320px;
            transition: transform 0.18s ease, box-shadow 0.18s ease;
        }

        .product-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 22px rgba(0, 0, 0, 0.08);
        }

        .product-card-header {
            background: #f7f7f7;
            padding: 14px 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .product-card-header .badge {
            background: var(--amazon-blue);
            color: white;
            font-size: 0.78rem;
            padding: 6px 10px;
            border-radius: 999px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .product-card-body {
            padding: 18px 16px 16px;
            flex: 1;
        }

        .product-card-body h2 {
            margin: 0 0 10px;
            font-size: 1.1rem;
            line-height: 1.3;
        }

        .product-card-body p {
            margin: 8px 0;
            color: #4b4f56;
            font-size: 0.95rem;
        }

        .product-price {
            color: #b12704;
            font-size: 1.25rem;
            font-weight: 800;
            margin-top: 10px;
        }

        .product-stock {
            margin-top: 8px;
            color: #007600;
            font-weight: 600;
        }

        .product-card-actions {
            padding: 16px;
            border-top: 1px solid var(--border);
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 16px;
            border-radius: 5px;
            border: none;
            text-decoration: none;
            font-weight: 700;
            cursor: pointer;
            transition: opacity 0.15s ease;
        }

        .btn:hover { opacity: 0.9; }
        .btn-primary { background: var(--amazon-blue); color: white; }
        .btn-secondary { background: #f0f0f0; color: var(--text-dark); }
        .btn-warning { background: var(--amazon-yellow); color: var(--amazon-blue); }
        .btn-danger { background: #d93025; color: white; }
        .btn-small { padding: 8px 12px; font-size: 0.9rem; }

        .form-group { margin-bottom: 18px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: 700; }
        .form-control { width: 100%; padding: 12px 14px; border: 1px solid #c4c4c4; border-radius: 6px; background: #fff; font-size: 0.95rem; }
        .form-control:focus { outline: none; border-color: var(--amazon-blue); box-shadow: 0 0 0 3px rgba(19, 25, 33, 0.08); }

        .form-card {
            background: white;
            border-radius: 10px;
            border: 1px solid var(--border);
            box-shadow: 0 6px 18px rgba(15, 17, 17, 0.06);
            padding: 26px;
        }

        .form-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 8px;
        }

        @media (max-width: 720px) {
            .site-header { flex-wrap: wrap; }
            .search-bar { max-width: 100%; }
            .product-card-actions { flex-direction: column; }
            .form-actions { flex-direction: column; }
        }
    </style>
</head>
<body>
    <header class="site-header">
        <div class="brand">Catálogo <span>+</span></div>
        <div class="search-bar">
            <input type="text" placeholder="Buscar productos, categorías o SKU...">
            <button type="button">Buscar</button>
        </div>
        <div class="top-actions">
            <a href="{{ route('productos.create') }}">Nuevo Producto</a>
        </div>
    </header>

    <main class="main-content">
        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </main>
</body>
</html>