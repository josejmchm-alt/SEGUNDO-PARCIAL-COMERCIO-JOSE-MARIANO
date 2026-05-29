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
            --surface-dark: #09090b;
            --surface-mid: #111827;
            --surface-soft: #141a2d;
            --text-light: #f8fafc;
            --text-muted: #cbd5e1;
            --border: rgba(255,255,255,0.1);
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            background-color: #090b10;
            color: var(--text-light);
        }

        .site-header {
            background: linear-gradient(120deg, #614cfa, #b63bff, #ff6a00);
            color: white;
            padding: 18px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            box-shadow: 0 24px 60px rgba(0, 0, 0, 0.18);
        }

        .brand {
            font-size: 1.55rem;
            letter-spacing: 0.08em;
            font-weight: 800;
            text-transform: uppercase;
            text-shadow: 0 0 18px rgba(255,255,255,0.16);
        }

        .brand span {
            color: rgba(255, 255, 255, 0.85);
        }

        .search-bar {
            flex: 1;
            display: flex;
            max-width: 720px;
            border-radius: 999px;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,0.45);
            background: rgba(255,255,255,0.96);
            box-shadow: inset 0 0 0 1px rgba(255,255,255,0.35);
        }

        .search-bar input {
            width: 100%;
            border: 0;
            padding: 14px 18px;
            font-size: 0.98rem;
            outline: none;
            color: #2b2b2b;
            background: transparent;
        }

        .search-bar button {
            border: none;
            background: linear-gradient(135deg, #fcb045, #fd1d1d);
            color: white;
            font-weight: 700;
            padding: 0 24px;
            cursor: pointer;
            transition: transform 0.18s ease, box-shadow 0.18s ease;
        }

        .search-bar button:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 23px rgba(253, 29, 29, 0.25);
        }

        .top-actions a {
            background: rgba(255,255,255,0.95);
            color: #2d1f5f;
            text-decoration: none;
            padding: 12px 22px;
            border-radius: 999px;
            font-weight: 800;
            display: inline-flex;
            align-items: center;
            border: 1px solid rgba(255,255,255,0.8);
            transition: transform 0.18s ease, box-shadow 0.18s ease;
        }

        .top-actions a:hover {
            transform: translateY(-2px);
            box-shadow: 0 18px 35px rgba(255, 255, 255, 0.18);
        }

        .search-bar input {
            font-size: 1rem;
        }

        .search-bar button {
            min-width: 100px;
        }

        .main-content {
            max-width: 1180px;
            margin: 16px auto 32px;
            padding: 0 16px;
        }

        .page-card {
            background: linear-gradient(180deg, rgba(15, 23, 42, 0.95), rgba(15, 23, 42, 0.88));
            border-radius: 24px;
            box-shadow: 0 18px 50px rgba(0, 0, 0, 0.45);
            padding: 28px;
            margin-bottom: 20px;
            border: 1px solid rgba(255,255,255,0.08);
            backdrop-filter: blur(14px);
            color: var(--text-light);
        }

        .detail-bubble {
            background: radial-gradient(circle at top left, rgba(99, 102, 241, 0.22), transparent 45%),
                        radial-gradient(circle at bottom right, rgba(249, 115, 22, 0.18), transparent 42%),
                        linear-gradient(180deg, rgba(15, 23, 42, 0.96), rgba(15, 23, 42, 0.88));
            border: 1px solid rgba(255,255,255,0.12);
            box-shadow: 0 24px 80px rgba(12, 15, 32, 0.65), inset 0 0 0 1px rgba(255,255,255,0.04);
            border-radius: 34px;
            padding: 34px;
            max-width: 850px;
            margin: 30px auto 0;
            position: relative;
            overflow: hidden;
            animation: floatBubble 10s ease-in-out infinite;
        }

        .detail-bubble::before {
            content: '';
            position: absolute;
            top: -24px;
            left: 50%;
            transform: translateX(-50%);
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: rgba(59, 130, 246, 0.12);
            filter: blur(30px);
            opacity: 0.65;
        }

        @keyframes floatBubble {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .detail-header {
            margin-bottom: 24px;
        }

        .detail-header h1 {
            margin: 0;
            font-size: 2.05rem;
            color: var(--text-light);
            letter-spacing: -0.03em;
            text-shadow: 0 0 18px rgba(255,255,255,0.18);
        }

        .detail-grid {
            display: grid;
            gap: 18px;
            grid-template-columns: 1fr;
            justify-items: center;
            animation: slideUp 0.8s ease-out;
        }

        .detail-item {
            background: rgba(15, 23, 42, 0.95);
            border-radius: 28px;
            padding: 20px 24px;
            border: 1px solid rgba(255,255,255,0.08);
            box-shadow: 0 18px 40px rgba(0, 0, 0, 0.28);
            transform: translateY(12px);
            opacity: 0;
            animation: fadeInUp 0.6s ease forwards;
            width: fit-content;
            max-width: 92vw;
            min-width: 280px;
        }

        .detail-item:nth-child(1) { animation-delay: 0.08s; }
        .detail-item:nth-child(2) { animation-delay: 0.16s; }
        .detail-item:nth-child(3) { animation-delay: 0.24s; }
        .detail-item:nth-child(4) { animation-delay: 0.32s; }
        .detail-item:nth-child(5) { animation-delay: 0.40s; }
        .detail-item:nth-child(6) { animation-delay: 0.48s; }
        .detail-item:nth-child(7) { animation-delay: 0.56s; }

        @keyframes fadeInUp {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                transform: translateY(18px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .detail-item strong {
            display: block;
            font-size: 0.9rem;
            margin-bottom: 10px;
            color: #c7d2fe;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        .detail-value {
            color: var(--text-light);
            font-size: 1rem;
            line-height: 1.7;
            text-shadow: 0 0 12px rgba(0,0,0,0.25);
        }

        .detail-footer {
            margin-top: 28px;
            display: flex;
            justify-content: flex-start;
        }

        .alert-success {
            padding: 14px 18px;
            background-color: #e3f9e5;
            color: #116530;
            border-radius: 14px;
            margin-bottom: 18px;
            border: 1px solid rgba(49, 156, 84, 0.18);
        }

        .alert-danger {
            padding: 14px 18px;
            background-color: #fdecef;
            color: #9b1c22;
            border-radius: 14px;
            margin-bottom: 18px;
            border: 1px solid rgba(217, 43, 43, 0.18);
        }

        .section-title {
            margin: 0 0 12px;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--text-light);
            text-shadow: 0 0 22px rgba(255,255,255,0.15);
        }

        .section-subtitle {
            margin: 0 0 22px;
            color: #555;
            font-size: 0.96rem;
        }

        .category-menu {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 16px;
        }

        .category-chip {
            border: 1px solid rgba(255,255,255,0.12);
            background: rgba(15, 23, 42, 0.85);
            padding: 10px 18px;
            border-radius: 999px;
            cursor: pointer;
            color: var(--text-light);
            font-weight: 700;
            transition: transform 0.18s ease, background 0.18s ease, border-color 0.18s ease, box-shadow 0.18s ease;
            box-shadow: 0 0 0 0 rgba(255,255,255,0);
        }

        .category-chip:hover {
            transform: translateY(-1px);
            background: rgba(255,255,255,0.08);
            box-shadow: 0 0 16px rgba(255,255,255,0.08);
        }

        .category-chip.active {
            background: linear-gradient(135deg, #f97316, #e11d48);
            color: white;
            border-color: rgba(255,255,255,0.95);
        }

        .product-grid {
            display: grid;
            gap: 18px;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        }

        .product-card {
            background: linear-gradient(180deg, #111827, #0f172a 100%);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 22px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            min-height: 340px;
            transition: transform 0.22s ease, box-shadow 0.22s ease, border-color 0.22s ease;
            color: var(--text-light);
        }

        .product-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 18px 40px rgba(101, 33, 158, 0.16);
            border-color: rgba(111, 28, 121, 0.38);
        }

        .product-card-header {
            background: linear-gradient(135deg, rgba(239, 114, 214, 0.12), rgba(116, 65, 255, 0.08));
            padding: 16px 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid rgba(111, 28, 121, 0.08);
        }

        .product-card-header .badge {
            background: var(--amazon-blue);
            color: white;
            font-size: 0.78rem;
            padding: 6px 10px;
            border-radius: 999px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            text-shadow: 0 0 12px rgba(255,255,255,0.18);
        }

        .product-card-body {
            padding: 20px 18px 18px;
            flex: 1;
        }

        .product-card-body h2 {
            margin: 0 0 10px;
            font-size: 1.1rem;
            line-height: 1.3;
            color: var(--text-light);
            text-shadow: 0 0 18px rgba(255,255,255,0.12);
        }

        .product-card-body p {
            margin: 8px 0;
            color: var(--text-muted);
            font-size: 0.95rem;
            text-shadow: 0 0 12px rgba(0,0,0,0.2);
        }

        .product-price {
            color: #8b2eff;
            font-size: 1.35rem;
            font-weight: 900;
            margin-top: 12px;
            text-shadow: 0 0 16px rgba(139, 46, 255, 0.35);
        }

        .product-stock {
            margin-top: 10px;
            color: #5f3dc4;
            font-weight: 700;
        }

        .product-card-actions {
            padding: 18px;
            border-top: 1px solid rgba(111, 28, 121, 0.08);
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: flex-start;
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

        .btn:hover { opacity: 0.96; transform: translateY(-1px); }
        .btn-primary { background: var(--amazon-blue); color: white; }
        .btn-secondary { background: #111827; color: var(--text-light); border: 1px solid rgba(255,255,255,0.08); box-shadow: inset 0 0 10px rgba(255,255,255,0.04); }
        .btn-warning { background: var(--amazon-yellow); color: var(--amazon-blue); }
        .btn-danger { background: #d93025; color: white; }
        .btn-small { padding: 8px 12px; font-size: 0.9rem; }

        .form-group { margin-bottom: 18px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: 700; }
        .form-control { width: 100%; padding: 12px 14px; border: 1px solid rgba(255,255,255,0.12); border-radius: 6px; background: #0f172a; color: var(--text-light); font-size: 0.95rem; }
        .form-control:focus { outline: none; border-color: var(--amazon-blue); box-shadow: 0 0 0 3px rgba(19, 25, 33, 0.08); }

        .form-card {
            background: #0f172a;
            border-radius: 10px;
            border: 1px solid rgba(255,255,255,0.08);
            box-shadow: 0 8px 26px rgba(0, 0, 0, 0.3);
            padding: 26px;
            color: var(--text-light);
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
            <input id="product-search" type="text" placeholder="Buscar productos, categorías o SKU...">
            <button id="search-button" type="button">Buscar</button>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('product-search');
            const searchButton = document.getElementById('search-button');
            const categoryButtons = document.querySelectorAll('.category-chip');
            let activeCategory = '';

            function normalize(text) {
                return text.toString().trim().toLowerCase();
            }

            function filterProducts() {
                const term = searchInput ? normalize(searchInput.value) : '';
                const cards = document.querySelectorAll('.product-card');

                cards.forEach(card => {
                    const name = normalize(card.dataset.name || '');
                    const sku = normalize(card.dataset.sku || '');
                    const category = normalize(card.dataset.category || '');
                    const matchesSearch = term === '' || name.includes(term) || sku.includes(term) || category.includes(term);
                    const matchesCategory = activeCategory === '' || category === normalize(activeCategory);
                    card.style.display = matchesSearch && matchesCategory ? 'flex' : 'none';
                });
            }

            if (searchInput) {
                searchInput.addEventListener('input', filterProducts);
            }

            if (searchButton) {
                searchButton.addEventListener('click', filterProducts);
            }

            categoryButtons.forEach(button => {
                button.addEventListener('click', () => {
                    categoryButtons.forEach(btn => btn.classList.remove('active'));
                    button.classList.add('active');
                    activeCategory = button.dataset.category || '';
                    filterProducts();
                });
            });
        });
    </script>
</body>
</html>