<footer>
    <div class="container">
        <div class="footer-grid">
            <!-- Kolom 1 -->
            <div class="footer-column">
                <h5 class="footer-title">Julie-Toys</h5>
                <p class="footer-description">Menyediakan mainan berkualitas untuk keluarga Anda sejak 2024.</p>
            </div>

            <!-- Kolom 2 -->
            <div class="footer-column">
                <h5 class="footer-title">Navigasi</h5>
                <ul class="footer-list">
                    <li><a href="{{ route('purchase-history.create') }}" class="footer-link">Belanja</a></li>
                    <li><a href="{{ url('/report/profit') }}" class="footer-link">Laporan Keuntungan</a></li>
                    <li><a href="{{ route('faqs.index') }}" class="footer-link">FAQ</a></li>
                </ul>
            </div>

            <!-- Kolom 3 -->
            <div class="footer-column">
                <h5 class="footer-title">Hubungi Kami</h5>
                <div class="contact-flex">
                    <!-- Bagian Info -->
                    <div class="contact-info">
                        @if(Auth::check() && Auth::user()->role == 'admin')
                            <!-- Form edit untuk admin -->
                            <form action="{{ route('footer.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <label>Email: </label>
                                <input type="email" name="email" value="{{ session('footer.email', 'support@julietoys.com') }}" required><br>
                                <label>Telepon: </label>
                                <input type="text" name="phone" value="{{ session('footer.phone', '+62 812-9144-7540') }}" required><br>
                                <label>Facebook: </label>
                                <input type="url" name="facebook" value="{{ session('footer.facebook', 'https://www.facebook.com/') }}" required><br>
                                <label>Instagram: </label>
                                <input type="url" name="instagram" value="{{ session('footer.instagram', 'https://www.instagram.com/') }}" required><br>
                                <label>Whatsapp: </label>
                                <input type="url" name="whatsapp" value="{{ session('footer.whatsapp', 'https://wa.me/6281291447540') }}" required><br>
                                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                            </form>

                        @else
                            <!-- Jika bukan admin, tampilkan informasi footer -->
                            <p class="footer-contact">Email: {{ session('footer.email', 'support@julietoys.com') }}</p>
                            <p class="footer-contact">Telepon: {{ session('footer.phone', '+62 812-9144-7540') }}</p>
                            <div class="social-icons">
                                <a href="{{ session('footer.facebook', 'https://www.facebook.com/') }}" target="_blank" class="footer-icon"><i class="fab fa-facebook"></i></a>
                                <a href="{{ session('footer.whatsapp', 'https://wa.me/6281291447540') }}" target="_blank" class="footer-icon"><i class="fab fa-whatsapp"></i></a>
                                <a href="{{ session('footer.instagram', 'https://www.instagram.com/') }}" target="_blank" class="footer-icon"><i class="fab fa-instagram"></i></a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
         <!-- Map Section -->
         <div class="map-container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15958.579021287362!2d101.41366864856742!3d0.5344335913653175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5ab004d76cb8d%3A0xc281691359c67a47!2sJulie%20Toys!5e0!3m2!1sid!2sid!4v1737320152877!5m2!1sid!2sid"
                width="100%"
                height="400"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

        <div class="footer-bottom text-center">
            <small>&copy; 2024 Julie-Toys. All rights reserved.</small>
        </div>
    </div>
</footer>


<style>
    footer {
        background-color: #f3c623; /* Warna latar belakang */
        color: #fff;
        padding: 40px 20px;
        font-family: 'Arial', sans-serif;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .footer-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr); /* 3 Kolom */
        gap: 20px;
    }

    .footer-column {
        display: flex;
        flex-direction: column;
    }

    .footer-title {
        font-weight: bold;
        font-size: 20px;
        margin-bottom: 15px;
    }

    .footer-description, .footer-contact {
        font-size: 16px;
        line-height: 1.6;
    }

    .footer-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-list li {
        margin-bottom: 10px;
    }

    .footer-link {
        text-decoration: none;
        color: #fff;
        font-size: 16px;
        transition: color 0.3s ease;
    }

    .footer-link:hover {
        color: #007bff;
    }

    .contact-flex {
        display: flex; /* Membuat elemen berjejer horizontal */
        align-items: flex-start;
        gap: 20px; /* Jarak antar elemen */
    }

    .contact-info {
        display: flex;
        flex-direction: column;
    }

    .social-icons {
        display: flex;
        gap: 10px;
        margin: 15px 0;
    }

    .footer-icon {
        font-size: 20px;
        color: white;
        transition: color 0.3s ease;
    }

    .footer-icon:hover {
        color: #007bff;
    }

    .map-container {
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .map-container iframe {
        border: 0;
        border-radius: 8px;
    }

    .footer-bottom {
        margin-top: 30px;
        border-top: 1px solid rgba(255, 255, 255, 0.2);
        padding-top: 10px;
    }
    .map-container {
    margin-top: 30px; /* Jarak dari elemen di atas */
    border-radius: 8px; /* Membulatkan sudut peta */
    overflow: hidden; /* Memastikan peta tidak keluar dari kontainer */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Menambahkan bayangan */
}


    @media (max-width: 768px) {
        .footer-grid {
            grid-template-columns: 1fr; /* Jadi 1 kolom di layar kecil */
        }

        .contact-flex {
            flex-direction: column; /* Elemen vertikal di layar kecil */
        }

        .social-icons {
            justify-content: center;
        }
    }
</style>
