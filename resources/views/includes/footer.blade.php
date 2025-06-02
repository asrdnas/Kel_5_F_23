<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Contact</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .main-content {
            flex: 1;
            padding: 2rem;
            text-align: center;
        }
        
        /* Footer Styles */
        .footer {
            background: linear-gradient(135deg, #100296 0%, #3B82F6 100%);
            color: white;
            padding: 3rem 0 2rem 0;
            margin-top: auto;
        }
        
        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 2rem;
            margin-bottom: 2rem;
        }
        
        .footer-section h3 {
            font-size: 1.2rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }
        
        .footer-section p {
            line-height: 1.6;
            margin-bottom: 1rem;
            opacity: 0.9;
        }
        
        /* Contact Section */
        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        
        .contact-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            transition: all 0.3s ease;
            text-decoration: none;
            color: white;
        }
        
        .contact-item:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        
        .contact-icon {
            width: 24px;
            height: 24px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            color: #1D4ED8;
            flex-shrink: 0;
        }
        
        .contact-text {
            font-size: 0.95rem;
            font-weight: 500;
        }
        
        /* WhatsApp Button */
        .whatsapp-btn {
            background: #25D366;
            color: white;
            padding: 1rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            margin-top: 1rem;
            box-shadow: 0 4px 12px rgba(37, 211, 102, 0.3);
        }
        
        .whatsapp-btn:hover {
            background: #128C7E;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(37, 211, 102, 0.4);
        }
        
        .wa-icon {
            width: 24px;
            height: 24px;
            fill: currentColor;
        }
        
        /* Social Media */
        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }
        
        .social-link {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: white;
            transition: all 0.3s ease;
        }
        
        .social-link:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }
        
        /* Footer Bottom */
        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            padding-top: 2rem;
            text-align: center;
            opacity: 0.8;
        }
        
        .footer-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }
        
        .footer-logo img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
        }
        
        .footer-logo h2 {
            font-size: 1.3rem;
            font-weight: 700;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .footer-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
            
            .contact-item {
                padding: 1rem;
            }
            
            .whatsapp-btn {
                width: 100%;
                justify-content: center;
                padding: 1.25rem 2rem;
            }
            
            .social-links {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    
    <div class="flex flex-col px-14 mt-10 "></div>
    
    <div class="flex flex-col px-14 mt-10 "></div>
    
    <div class="flex flex-col px-14 mt-10 "></div>
    
    <div class="flex flex-col px-14 mt-10 "></div>
    
    <div class="flex flex-col px-14 mt-10 "></div>
    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-content">
                <!-- About Section -->
                <div class="footer-section">
                    <h3>Tentang Flash News</h3>
                    <p>Platform berita terdepan yang menghadirkan informasi terkini, akurat, dan terpercaya untuk masyarakat Indonesia.</p>
                </div>

                <!-- Quick Links -->
                <div class="footer-section">
                    <h3>Tautan Cepat</h3>
                    <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                        <a href="{{ route('landing') }}" style="color: white; text-decoration: none; opacity: 0.9; transition: opacity 0.3s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.9'">Beranda</a>
                    @foreach (\App\Models\NewsCategory::all() as $category)
                        <a href="{{ route('news.category', $category->slug) }}" style="color: white; text-decoration: none; opacity: 0.9; transition: opacity 0.3s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.9'"> {{ $category->title }}</a>
                    @endforeach
                    </div>
                </div>

                <!-- Contact Section -->
                <div class="footer-section">
                    <h3>Hubungi Kami</h3>
                    <div class="contact-info">
                        <div class="contact-item">
                            <div class="contact-icon">📧</div>
                            <div class="contact-text">info@flashnews.com</div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon">📞</div>
                            <div class="contact-text">+62 859-3672-0893</div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon">📍</div>
                            <div class="contact-text">Sumenep, Indonesia</div>
                        </div>
                    </div>
                    
                    <!-- WhatsApp Button -->
                    <a href="https://wa.me/6285936720893?text=Halo%20Flash%20News,%20saya%20ingin%20bertanya%20tentang..." 
                       class="whatsapp-btn" 
                       target="_blank">
                        <svg class="wa-icon" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                        </svg>
                        Chat WhatsApp
                    </a>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="footer-logo">
                    <img src="{{ asset('assets/img/flashnews.png') }}" alt="Flash News Logo">
                    <h2>Flash News</h2>
                </div>
                <p>&copy; 2025 Flash News. Semua hak dilindungi undang-undang.</p>
            </div>
        </div>
    </footer>

    <script>
        // Fungsi untuk membuka WhatsApp
        function openWhatsApp() {
            const phoneNumber = '6285936720893'; // Ganti dengan nomor WhatsApp Anda
            const message = 'Halo Flash News, saya ingin bertanya tentang...';
            const url = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;
            window.open(url, '_blank');
        }
        
        // Efek smooth scroll untuk link internal
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>