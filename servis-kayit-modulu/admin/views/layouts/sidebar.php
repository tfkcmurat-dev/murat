<aside class="admin-sidebar" id="adminSidebar">
    <!-- Logo -->
    <div class="sidebar-header">
        <a href="<?= adminUrl('dashboard.php') ?>" class="sidebar-logo">
            <div class="logo-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <div class="logo-text">
                <span class="brand">Bilişim Servis</span>
                <span class="subtitle">Admin Panel</span>
            </div>
        </a>
    </div>
    
    <!-- Navigation -->
    <nav class="sidebar-nav">
        <div class="nav-section"><div class="nav-section-title">Teknik Servis</div><ul class="nav-menu"><li class="nav-item"><a href="<?= adminUrl('repairs.php') ?>" class="nav-link <?= basename($_SERVER['PHP_SELF']) === 'repairs.php' ? 'active' : '' ?>"><i class="bi bi-tools" aria-hidden="true"></i> Müşteri / Servis Kayıtları</a></li></ul></div>
        <!-- Dashboard -->
        <div class="nav-section">
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="<?= adminUrl('dashboard.php') ?>" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : '' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Dashboard
                    </a>
                </li>
            </ul>
        </div>
        
        <!-- Site Yönetimi -->
        <div class="nav-section">
            <div class="nav-section-title">Site Yönetimi</div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="<?= adminUrl('theme-settings.php') ?>" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'theme-settings.php' ? 'active' : '' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Genel Ayarlar
                    </a>
                </li>
            </ul>
        </div>
        
        <!-- Sayfa Yönetimi -->
        <div class="nav-section">
            <div class="nav-section-title">Sayfa Yönetimi</div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="<?= adminUrl('homepage.php') ?>" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'homepage.php' ? 'active' : '' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Anasayfa
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= adminUrl('about-page.php') ?>" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'about-page.php' ? 'active' : '' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Hakkımızda
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= adminUrl('services-page.php') ?>" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'services-page.php' ? 'active' : '' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        Hizmetler Sayfası
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= adminUrl('contact-page.php') ?>" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'contact-page.php' ? 'active' : '' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        İletişim Sayfası
                    </a>
                </li>
            </ul>
        </div>
        
        <!-- İçerik Yönetimi -->
        <div class="nav-section">
            <div class="nav-section-title">İçerik Yönetimi</div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="<?= adminUrl('site-services.php') ?>" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'site-services.php' ? 'active' : '' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Hizmetler
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= adminUrl('references.php') ?>" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'references.php' ? 'active' : '' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Referanslar
                    </a>
                </li>
            </ul>
        </div>
        
        <!-- Teklif Sistemi -->
        <div class="nav-section">
            <div class="nav-section-title">Teklif Sistemi</div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="<?= adminUrl('customers.php') ?>" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'customers.php' ? 'active' : '' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        Müşteriler
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= adminUrl('services.php') ?>" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'services.php' ? 'active' : '' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                        Teklif Hizmetleri
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= adminUrl('quotes.php') ?>" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'quotes.php' ? 'active' : '' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Teklifler
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= adminUrl('quote-note-templates.php') ?>" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'quote-note-templates.php' ? 'active' : '' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                        </svg>
                        Not Şablonları
                    </a>
                </li>
            </ul>
        </div>
        
        <!-- SEO -->
        <div class="nav-section">
            <div class="nav-section-title">SEO</div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="<?= adminUrl('seo.php') ?>" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'seo.php' ? 'active' : '' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        SEO Ayarları
                    </a>
                </li>
            </ul>
        </div>
        
        <!-- Mail Ayarları -->
        <div class="nav-section">
            <div class="nav-section-title">Mail Ayarları</div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="<?= adminUrl('mail-settings.php') ?>" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'mail-settings.php' ? 'active' : '' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        SMTP Ayarları
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= adminUrl('email-templates.php') ?>" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'email-templates.php' ? 'active' : '' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                        </svg>
                        E-Mail Şablonları
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= adminUrl('email-logs.php') ?>" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'email-logs.php' ? 'active' : '' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                        Log Kayıtları
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= adminUrl('contact-submissions.php') ?>" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'contact-submissions.php' ? 'active' : '' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Form Kayıtları
                    </a>
                </li>
            </ul>
        </div>
        
        <!-- Hesap & Site Bağlantısı -->
        <div class="nav-section" style="margin-top: auto; padding-top: 16px; border-top: 1px solid rgba(255,255,255,0.08);">
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="<?= adminUrl('change-password.php') ?>" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'change-password.php' ? 'active' : '' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                        </svg>
                        Şifre Değiştir
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= url('/') ?>" target="_blank" class="nav-link" style="color: var(--accent-secondary);">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                        Siteyi Görüntüle
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</aside>

<script>
function toggleSidebar() {
    document.getElementById('adminSidebar').classList.toggle('open');
}
</script>
