<x-app-layout>

<style>
    .min-h-screen {
        background: linear-gradient(180deg, #ffd7e8, #ffb3d9, #ff9ecf) !important;
    }

    .form-container {
        width: 60%;
        margin: 60px auto;
        background: white;
        padding: 35px 45px;
        border-radius: 16px;
        border: 4px solid #ffcee1;

        box-shadow:
            0 6px 18px rgba(0,0,0,0.12),
            0 0 34px rgba(255,150,200,0.45);
    }

    .form-title {
        text-align: center;
        font-size: 2rem;
        color: #b24776;
        font-weight: 700;
        margin-bottom: 25px;
    }

    label {
        color: #7b4a62;
        font-weight: 600;
        margin-top: 18px;
        display: block;
    }

    input, textarea {
        width: 100%;
        padding: 12px 15px;
        border-radius: 10px;
        border: 2px solid #ffcee1;
        margin-top: 8px;

        box-shadow: 0 4px 12px rgba(255,150,200,0.25);
        transition: 0.25s ease;
        font-size: 1rem;
        color: #7b4a62;
    }

    input:focus, textarea:focus {
        border-color: #ff9cbc;
        box-shadow: 0 0 12px rgba(255,150,200,0.55);
    }

    textarea {
        min-height: 120px;
        resize: vertical;
    }

    .btn-submit {
        margin-top: 25px;
        padding: 14px 32px;
        display: block;
        width: 100%;
        background: #ff9cbc;
        border: none;
        color: white;
        font-weight: 700;
        font-size: 1.1rem;
        border-radius: 30px;

        box-shadow: 0 8px 24px rgba(255,150,200,0.45);
        transition: 0.3s ease;
    }

    .btn-submit:hover {
        background: #ff82ac;
        transform: translateY(-3px);
    }
</style>

<div class="form-container">

    <h1 class="form-title">Pendaftaran Toko</h1>

    <form action="{{ route('store.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Nama Toko</label>
        <input type="text" name="name" required placeholder="Masukkan nama toko...">

        <label>Logo Toko</label>
        <input type="file" name="logo" accept="image/*">

        <label>Tentang Toko</label>
        <textarea name="about" placeholder="Deskripsi singkat toko..."></textarea>

        <label>Alamat</label>
        <textarea name="address" placeholder="Alamat lengkap toko"></textarea>

        <label>Kontak (WhatsApp / Email)</label>
        <input type="text" name="contact" placeholder="0821-xxxx / email">

        <button class="btn-submit">Daftarkan Toko</button>
    </form>

</div>

</x-app-layout>
