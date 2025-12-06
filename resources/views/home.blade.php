<x-app-layout>

    @vite(['resources/css/home.css', 'resources/js/home.js'])

    <section class="hero">

        <!-- FRAME OVAL KIRI -->
        <div class="hero-frame hero-left">
            <img src="{{ asset('images/ayus.png') }}" alt="Ayus">
        </div>

        <!-- TEKS TENGAH -->
        <div class="hero-text">
            <h1>Cheap & Use.</h1>
            <p>Fashion terbaik dengan kualitas premium & harga terjangkau. Temukan gaya yang cocok untukmu.</p>
            <button class="btn-shop">Shop Now</button>
        </div>

        <!-- FRAME OVAL KANAN -->
        <div class="hero-frame hero-right">
            <img src="{{ asset('images/nashifa.png') }}" alt="Nashifa">
        </div>

    </section>

</x-app-layout>
