<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime Products - {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --bg-primary: #ffffff;
            --bg-secondary: #f8fafc;
            --text-primary: #1e293b;
            --text-secondary: #64748b;
            --card-bg: #ffffff;
            --border: #e2e8f0;
        }
        [class="dark"] {
            --bg-primary: #0f172a;
            --bg-secondary: #1e293b;
            --text-primary: #f8fafc;
            --text-secondary: #94a3b8;
            --card-bg: #1e293b;
            --border: #334155;
        }
        body { background: var(--bg-primary); color: var(--text-primary); transition: all 0.3s; }
        .container { max-width: 1200px; margin: 0 auto; padding: 2rem; }
        .products-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; }
        .product-card { background: var(--card-bg); border: 1px solid var(--border); border-radius: 12px; padding: 1.5rem; transition: transform 0.2s; }
        .product-card:hover { transform: translateY(-4px); }
        .theme-toggle { position: fixed; top: 1rem; right: 1rem; background: var(--text-primary); color: var(--bg-primary); border: none; padding: 0.75rem; border-radius: 50%; cursor: pointer; font-size: 1.2rem; }
        [class="dark"] .theme-toggle { background: var(--bg-primary); color: var(--text-primary); }
        header { text-align: center; margin-bottom: 3rem; }
        h1 { font-size: 2.5rem; margin-bottom: 0.5rem; }
        .price { font-size: 1.5rem; font-weight: bold; color: #10b981; }
    </style>
</head>
<body>
    <button class="theme-toggle" onclick="toggleTheme()">🌙</button>
    
    <div class="container">
        <header>
            <h1>🍥 Anime Products Store</h1>
            <p>Browse our premium anime collections</p>
        </header>
        
        <div class="products-grid">
            @foreach($products as $product)
                <div class="product-card">
                    <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}" class="w-full h-48 object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-bold mb-2">{{ $product['name'] }}</h3>
                    <p class="text-sm opacity-75 mb-4">{{ $product['description'] }}</p>
                    <div class="flex justify-between items-center">
                        <span class="price">₱{{ number_format($product['price']) }}</span>
                        <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">Add to Cart</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        function toggleTheme() {
            document.documentElement.classList.toggle('dark');
            document.documentElement.classList.toggle('light');
            localStorage.setItem('theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light');
            document.querySelector('.theme-toggle').textContent = document.documentElement.classList.contains('dark') ? '☀️' : '🌙';
        }
        // Load saved theme
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.remove('light');
            document.documentElement.classList.add('dark');
            document.querySelector('.theme-toggle').textContent = '☀️';
        }
    </script>
</body>
</html>
