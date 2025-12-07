<x-app-layout>

    <style>
        /* Background */
        .min-h-screen {
            background: linear-gradient(180deg, #ffd7e8, #ffb3d9, #ff9ecf) !important;
        }

        /* Fade Animation */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* HERO SECTION */
        .hero {
            margin-top: 40px;
            min-height: 75vh;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 40px 100px;
            gap: 40px;
        }

        /* OVAL FRAME */
        .hero-frame {
            padding: 12px;
            border: 5px solid #ffcee1;
            background: white;
            border-radius: 50% / 60%;
            width: 330px;
            height: 460px;

            display: flex;
            justify-content: center;
            align-items: center;

            box-shadow:
                0 4px 12px rgba(0,0,0,0.1),
                0 0 28px rgba(255,150,200,0.4);

            animation: fadeUp 1s ease forwards;
        }

        .hero-frame img {
            height: 420px;
            object-fit: cover;
            border-radius: 50% / 60%;
        }

        /* TEXT */
        .hero-text {
            max-width: 480px;
            text-align: center;
            color: #7b4a62;
            animation: fadeUp 1s ease 0.3s forwards;
            opacity: 0;
        }

        .hero-text h1 {
            font-size: 3rem;
            font-weight: 700;
            color: #b24776;
        }

        .hero-text p {
            margin: 15px 0 35px;
            font-size: 1.15rem;
        }

        /* BUTTON */
        .btn-shop {
            padding: 16px 42px;
            font-size: 1.15rem;
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

        /* ============================================
           RESPONSIVE TABLET
        ============================================ */
        @media (max-width: 992px) {
            .hero {
                padding: 40px 40px;
                gap: 20px;
            }

            .hero-frame {
                width: 260px;
                height: 360px;
            }

            .hero-frame img {
                height: 330px;
            }

            .hero-text h1 {
                font-size: 2.4rem;
            }
        }

        /* ============================================
           RESPONSIVE MOBILE
        ============================================ */
        @media (max-width: 768px) {
            .hero {
                flex-direction: column;
                padding: 30px 20px;
                margin-top: 10px;
            }

            .hero-frame {
                width: 240px;
                height: 330px;
            }

            .hero-frame img {
                height: 300px;
            }

            .hero-text {
                order: -1;
                margin-bottom: 20px;
                opacity: 1;
            }

            .hero-text h1 {
                font-size: 2.2rem;
            }
        }
    </style>

    <section class="hero">

        <!-- GAMBAR KIRI -->
        <div class="hero-frame">
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
        </div>

        <!-- GAMBAR KANAN -->
        <div class="hero-frame">
            <img src="{{ asset('images/nashifa.png') }}" alt="Nashifa">
        </div>

    </section>

</x-app-layout><x-app-layout>

    <style>
        /* Background */
        .min-h-screen {
            background: linear-gradient(180deg, #ffd7e8, #ffb3d9, #ff9ecf) !important;
        }

        /* Fade Animation */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* HERO SECTION */
        .hero {
            margin-top: 40px;
            min-height: 75vh;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 40px 100px;
            gap: 40px;
        }

        /* OVAL FRAME */
        .hero-frame {
            padding: 12px;
            border: 5px solid #ffcee1;
            background: white;
            border-radius: 50% / 60%;
            width: 330px;
            height: 460px;

            display: flex;
            justify-content: center;
            align-items: center;

            box-shadow:
                0 4px 12px rgba(0,0,0,0.1),
                0 0 28px rgba(255,150,200,0.4);

            animation: fadeUp 1s ease forwards;
        }

        .hero-frame img {
            height: 420px;
            object-fit: cover;
            border-radius: 50% / 60%;
        }

        /* TEXT */
        .hero-text {
            max-width: 480px;
            text-align: center;
            color: #7b4a62;
            animation: fadeUp 1s ease 0.3s forwards;
            opacity: 0;
        }

        .hero-text h1 {
            font-size: 3rem;
            font-weight: 700;
            color: #b24776;
        }

        .hero-text p {
            margin: 15px 0 35px;
            font-size: 1.15rem;
        }

        /* BUTTON */
        .btn-shop {
            padding: 16px 42px;
            font-size: 1.15rem;
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

        /* ============================================
           RESPONSIVE TABLET
        ============================================ */
        @media (max-width: 992px) {
            .hero {
                padding: 40px 40px;
                gap: 20px;
            }

            .hero-frame {
                width: 260px;
                height: 360px;
            }

            .hero-frame img {
                height: 330px;
            }

            .hero-text h1 {
                font-size: 2.4rem;
            }
        }

        /* ============================================
           RESPONSIVE MOBILE
        ============================================ */
        @media (max-width: 768px) {
            .hero {
                flex-direction: column;
                padding: 30px 20px;
                margin-top: 10px;
            }

            .hero-frame {
                width: 240px;
                height: 330px;
            }

            .hero-frame img {
                height: 300px;
            }

            .hero-text {
                order: -1;
                margin-bottom: 20px;
                opacity: 1;
            }

            .hero-text h1 {
                font-size: 2.2rem;
            }
        }
    </style>

    <section class="hero">

        <!-- GAMBAR KIRI -->
        <div class="hero-frame">
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
        </div>

        <!-- GAMBAR KANAN -->
        <div class="hero-frame">
            <img src="{{ asset('images/nashifa.png') }}" alt="Nashifa">
        </div>

    </section>

</x-app-layout>