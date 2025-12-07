<x-app-layout>

    <style>
        /* ======================================================
           🌸 OVERRIDE JETSTREAM BACKGROUND (INI YANG PENTING!)
        ====================================================== */
        .min-h-screen {
            background: linear-gradient(180deg, #ffd7e8, #ffb3d9, #ff9ecf) !important;
        }

        /* ======================================================
           🌸 HERO LAYOUT
        ====================================================== */
        .hero {
            margin-top: 40px;
            min-height: 70vh;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 80px;
            padding: 40px 0;
        }

        .hero-frame {
            padding: 10px;
            border: 4px solid #ffcee1;
            border-radius: 50%;
            background: white;

            display: flex;
            justify-content: center;
            align-items: center;

            box-shadow:
                0 4px 12px rgba(0,0,0,0.1),
                0 0 24px rgba(255,150,200,0.4);
        }

        .hero-frame img {
            width: 230px;
            border-radius: 50%;
        }

        /* ======================================================
           🌸 TEXT CENTER — tombol turun
        ====================================================== */
        .hero-text {
            max-width: 480px;
            text-align: center;
            color: #7b4a62;

            transform: translateY(45px); /* tombol turun */
        }

        .hero-text h1 {
            font-size: 3rem;
            font-weight: 700;
            color: #b24776;
        }

        .hero-text p {
            margin-top: 10px;
            font-size: 1.15rem;
            margin-bottom: 30px;
        }

        /* ======================================================
           🌸 BUTTON
        ====================================================== */
        .btn-shop {
            padding: 14px 38px;
            font-size: 1.1rem;
            border-radius: 30px;
            background: #ff9cbc;
            color: white;
            border: none;
            font-weight: 600;

            box-shadow: 0 8px 24px rgba(255,150,200,0.45);
            transition: 0.3s ease;
        }

        .btn-shop:hover {
            background: #ff82ac;
            transform: translateY(-4px);
        }
    </style>

    <section class="hero">

        <!-- FRAME OVAL KIRI -->
        <div class="hero-frame hero-left">
            <img src="{{ asset('images/ayus.png') }}" alt="Ayus">
        </div>

        <!-- TEKS TENGAH -->
        <div class="hero-text">
            <h1>Cheap & Use.</h1>
            <p>
                Fashion terbaik dengan kualitas premium & harga terjangkau.
                Temukan gaya yang cocok untukmu.
            </p>

        <a href="{{ route('product.index') }}" class="btn-shop">Shop Now</a>

        <!-- FRAME OVAL KANAN -->
        <div class="hero-frame hero-right">
            <img src="{{ asset('images/nashifa.png') }}" alt="Nashifa">
        </div>

    </section>

</x-app-layout>
