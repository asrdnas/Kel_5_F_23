<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AuthorPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('author')  // Menetapkan ID panel
            ->path('author')  // Menetapkan path URL untuk panel author
            ->login()  // Menyediakan login untuk panel ini
            ->authGuard('author')  // Menggunakan auth guard 'author'
            ->brandName('Author Panel')  // Nama merek untuk panel
            ->colors([  // Pengaturan warna panel
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Author/Resources'), for: 'App\\Filament\\Author\\Resources')  // Menemukan resources
            ->discoverPages(in: app_path('Filament/Author/Pages'), for: 'App\\Filament\\Author\\Pages')  // Menemukan pages
            ->pages([  // Menambahkan halaman dashboard untuk panel Author
                Pages\Dashboard::class,  // Pastikan Anda memiliki halaman ini
            ])
            ->discoverWidgets(in: app_path('Filament/Author/Widgets'), for: 'App\\Filament\\Author\\Widgets')  // Menemukan widgets
            ->widgets([  // Menambahkan widget ke dashboard panel Author
                \App\Filament\Author\Resources\NoneResource\Widgets\StatsOverviewAuthor::class,  // Widget untuk jumlah berita penulis
                Widgets\AccountWidget::class,  // Widget untuk akun pengguna
                Widgets\FilamentInfoWidget::class,  // Widget untuk informasi umum Filament
            ])
            ->middleware([  // Middleware untuk pengelolaan sesi dan autentikasi
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([  // Middleware untuk autentikasi
                Authenticate::class,
            ]);
    }
}
