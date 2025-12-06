<x-app-layout>

    <style>
        /* =============================================
           🌸 GENERAL CONTAINER
        ============================================= */
        .product-container {
            max-width: 1200px;
            margin: auto;
            padding: 40px 20px;
            font-family: 'Poppins', sans-serif;
            color: #5a4a57;
        }

        /* =============================================
           🌸 BREADCRUMB
        ============================================= */
        .breadcrumb {
            margin-bottom: 20px;
            font-size: 0.95rem;
        }
        .breadcrumb a {
            color: #d26fa3;
            text-decoration: none;
        }

        /* =============================================
           🌸 PRODUCT WRAPPER
        ============================================= */
        .product-wrapper {
            display: flex;
            gap: 50px;
            margin-bottom: 40px;
        }

        /* LEFT IMAGE PANEL */
        .product-images {
            flex: 1;
        }
        .main-image {
            width: 100%;
            border-radius: 18px;
            box-shadow: 0 6px 25px rgba(0,0,0,0.1);
            margin-bottom: 15px;
        }
        .thumbnail-carousel {
            display: flex;
            gap: 12px;
        }
        .thumb {
            width: 90px;
            border-radius: 10px;
            cursor: pointer;
            border: 2px solid transparent;
            transition: 0.2s;
        }
        .thumb:hover {
            border-color: #ff8fc5;
        }

        /* RIGHT INFO PANEL */
        .product-info {
            flex: 1;
        }
        .p-name {
            font-size: 2.1rem;
            font-weight: 700;
            color: #b4477e;
        }
        .p-category span {
            font-weight: bold;
            color: #d26fa3;
        }
        .price {
            font-size: 2rem;
            font-weight: 700;
            margin: 20px 0;
            color: #d13b85;
        }

        .p-specs td {
            padding: 6px 10px;
            font-size: 1rem;
        }

        .product-actions {
            display: flex;
            gap: 15px;
            margin-top: 25px;
        }

        .btn-cart, .btn-buy {
            padding: 12px 25px;
            border-radius: 30px;
            font-size: 1rem;
            border: none;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-cart {
            background: #ffd0e4;
            color: #b4477e;
        }
        .btn-buy {
            background: #ff8fc5;
            color: white;
        }

        .btn-cart:hover {
            background: #ffb7d6;
        }
        .btn-buy:hover {
            background: #ff6aad;
        }

        /* =============================================
           🌸 DESCRIPTION
        ============================================= */
        .description-section {
            margin-top: 40px;
        }

        /* =============================================
           🌸 STORE INFO
        ============================================= */
        .store-info {
            display: flex;
            align-items: center;
            gap: 15px;
            background: #ffe3ef;
            padding: 18px;
            border-radius: 15px;
            margin-top: 40px;
        }
        .store-logo {
            width: 60px;
            border-radius: 50%;
        }
        .verified {
            color: #40c463;
            font-size: 1.2rem;
        }

        /* =============================================
           🌸 REVIEWS
        ============================================= */
        .review-section {
            margin-top: 40px;
        }
        .rating-summary {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #b4477e;
        }
        .review-item {
            background: #fff;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }

        /* =============================================
           🌸 RELATED PRODUCTS
        ============================================= */
        .related-section {
            margin-top: 50px;
        }

        .related-grid {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .related-card {
            width: 30%;
            background: #fff;
            padding: 15px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.07);
        }

        .related-card img {
            width: 100%;
            border-radius: 12px;
        }

        .r-price {
            margin-top: 10px;
            display: block;
            font-weight: 600;
            color: #d13b85;
        }

        /* =============================================
           🌸 RESPONSIVE
        ============================================= */
        @media (max-width: 768px) {
            .product-wrapper {
                flex-direction: column;
            }
            .related-card {
                width: 100%;
            }
        }
    </style>

    <div class="product-container">

        <!-- Breadcrumb -->
        <nav class="breadcrumb">
            <a href="/">Home</a> >
            <a href="#">{{ $product->productCategory->name }}</a> >
            <span>{{ $product->name }}</span>
        </nav>

        <div class="product-wrapper">

            <!-- Left: Images -->
            <div class="product-images">

                <!-- Main image -->
                <img
                    id="mainImage"
                    class="main-image"
                    src="{{ $product->productImages->first()
                        ? asset('storage/' . $product->productImages->first()->image)
                        : asset('images/noimage.png') }}"
                >

                <div class="thumbnail-carousel">
                    @foreach ($product->productImages as $img)
                        <img src="{{ asset('storage/' . $img->image) }}"
                             class="thumb"
                             onclick="changeImage(this)">
                    @endforeach
                </div>
            </div>

            <!-- Right: Product Info -->
            <div class="product-info">
                <h1 class="p-name">{{ $product->name }}</h1>
                <p class="p-category">Kategori:
                    <span>{{ $product->productCategory->name }}</span>
                </p>

                <div class="price">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </div>

                <table class="p-specs">
                    <tr><td>Kondisi:</td>
                        <td>{{ $product->condition == 'new' ? 'Baru' : 'Bekas' }}</td>
                    </tr>
                    <tr><td>Berat:</td><td>{{ $product->weight }} gr</td></tr>
                    <tr><td>Stok:</td><td>{{ $product->stock }}</td></tr>
                </table>

                <div class="product-actions">
                    <button class="btn-cart">Tambah ke Keranjang</button>
                    <button class="btn-buy">Beli</button>
                </div>
            </div>
        </div>

        <!-- Deskripsi -->
        <section class="description-section">
            <h2>Deskripsi Produk</h2>
            <p>{{ $product->description }}</p>
        </section>

        <!-- Toko -->
        <section class="store-info">
            <img src="{{ asset('images/store.png') }}" class="store-logo">
            <div>
                <h3>{{ $product->store->name }} <span class="verified">✔</span></h3>
                <p>{{ $product->store->city ?? 'Lokasi tidak tersedia' }}</p>
            </div>
        </section>

        <!-- Reviews -->
        <section class="review-section">
            <h2>Rating & Ulasan</h2>

            <div class="reviews">
                @forelse ($product->productReviews as $review)
                    <div class="review-item">
                        <strong>{{ $review->user->name ?? 'User' }}</strong> ★★★★★
                        <p>{{ $review->review }}</p>
                    </div>
                @empty
                    <p>Belum ada ulasan.</p>
                @endforelse
            </div>
        </section>

        <!-- Related Products -->
        <section class="related-section">
            <h2>Produk Terkait</h2>

            <div class="related-grid">
                @foreach ($relatedProducts as $related)
                    <div class="related-card">
                        <img src="{{ $related->productImages->first()
                                    ? asset('storage/' . $related->productImages->first()->image)
                                    : asset('images/noimage.png') }}">
                        <p>{{ $related->name }}</p>
                        <span class="r-price">
                            Rp {{ number_format($related->price, 0, ',', '.') }}
                        </span>
                    </div>
                @endforeach
            </div>
        </section>

    </div>

    <script>
        function changeImage(el) {
            document.getElementById('mainImage').src = el.src;
        }
    </script>

</x-app-layout>
