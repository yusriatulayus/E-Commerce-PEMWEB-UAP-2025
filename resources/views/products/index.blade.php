<x-app-layout>

    <style>
        /* Background soft pink seperti home */
        .min-h-screen {
            background: linear-gradient(180deg, #ffd7e8, #ffb3d9, #ff9ecf) !important;
        }

        .page-title {
            text-align: center;
            margin-top: 40px;
            color: #b24776;
            font-size: 2.4rem;
            font-weight: 700;
        }

        /* FILTER DROPDOWN */
        .filter-box {
            margin: 25px auto 10px;
            text-align: center;
        }

        .filter-select {
            padding: 10px 18px;
            border-radius: 25px;
            background: #ffffff;
            border: 2px solid #ffcee1;
            color: #7b4a62;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(255,150,200,0.25);
            transition: 0.2s ease;
        }

        .filter-select:hover {
            background: #ffe8f1;
        }

        /* GRID PRODUK */
        .product-grid {
            width: 85%;
            margin: 30px auto 60px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(230px, 1fr));
            gap: 28px;
        }

        /* CARD PRODUK */
        .product-card {
            background: white;
            border-radius: 16px;
            padding: 18px;
            text-align: center;
            transition: 0.25s ease;
            border: 3px solid #ffcee1;
            box-shadow:
                0 4px 12px rgba(0,0,0,0.1),
                0 0 22px rgba(255,150,200,0.35);
        }

        .product-card:hover {
            transform: translateY(-6px);
            box-shadow:
                0 6px 18px rgba(0,0,0,0.18),
                0 0 30px rgba(255,150,200,0.55);
        }

        .product-card img {
            width: 100%;
            height: 190px;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 12px;
            border: 3px solid #ffcee1;
            background: #fff;
        }

        .product-card h3 {
            color: #b24776;
            font-weight: 700;
            font-size: 1.15rem;
        }

        .product-card p {
            margin-top: 6px;
            color: #7b4a62;
            font-size: 1rem;
            font-weight: 600;
        }

        .product-card .btn-detail {
            margin-top: 14px;
            display: inline-block;
            padding: 10px 26px;
            background: #ff9cbc;
            color: white;
            border-radius: 25px;
            font-weight: 600;
            font-size: 0.95rem;
            box-shadow: 0 6px 16px rgba(255,150,200,0.45);
            transition: 0.25s ease;
        }

        .btn-detail:hover {
            background: #ff82ac;
            transform: translateY(-3px);
        }

    </style>

    <h1 class="page-title">Semua Produk</h1>

    <!-- FILTER -->
    <div class="filter-box">
        <form action="{{ route('product.index') }}" method="GET">
            <select name="category" onchange="this.form.submit()" class="filter-select">
                <option value="">🌸 Semua Kategori</option>

                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}"
                        {{ $selectedCategory == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </form>
    </div>

    <!-- LIST PRODUK -->
    <div class="product-grid">
        @foreach ($products as $p)
            <div class="product-card">
                <img src="{{ asset('storage/' . $p->image) }}" alt="{{ $p->name }}">

                <h3>{{ $p->name }}</h3>
                <p>{{ number_format($p->price) }} IDR</p>

                <a href="{{ route('product.show', $p->slug) }}" class="btn-detail">Detail</a>
            </div>
        @endforeach
    </div>

</x-app-layout>
