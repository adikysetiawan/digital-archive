<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Document;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends BaseWidget
{
    protected function getCards(): array
    {
        $totalDocuments = Document::query()->count();
        $todayDocuments = Document::query()->whereDate('created_at', now()->toDateString())->count();
        $totalUsers = User::query()->count();

        return [
            Stat::make('Total Dokumen', number_format($totalDocuments))
                ->icon('heroicon-o-rectangle-stack')
                ->description('Semua dokumen terarsip')
                ->color('primary'),

            Stat::make('Dokumen Hari Ini', number_format($todayDocuments))
                ->icon('heroicon-o-calendar')
                ->description('Ditambahkan hari ini')
                ->color('success'),

            Stat::make('Total User', number_format($totalUsers))
                ->icon('heroicon-o-users')
                ->description('Pengguna terdaftar')
                ->color('info'),
        ];
    }
}
