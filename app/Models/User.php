<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser; // <-- Thêm dòng này
use Filament\Panel; // <-- Thêm dòng này
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser // <-- Thêm implements FilamentUser ở đây
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Xác thực quyền truy cập vào trang quản trị Filament trên Production
     */
    public function canAccessPanel(Panel $panel): bool
    {
        // Nếu chạy ở môi trường phát triển (Local), cho phép mọi tài khoản đăng nhập
        if (app()->environment('local')) {
            return true;
        }

        // Trên Production (Railway), chỉ cho phép các email được chỉ định truy cập.
        // Bạn hãy thay thế các email dưới đây bằng email admin thật của bạn nhé:
        $allowedEmails = [
            'admin@gmail.com',
            'your-email@domain.com', // Thay bằng email thật của bạn
        ];

        return in_array($this->email, $allowedEmails);
    }
}
