<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser; // <--- THÊM DÒNG NÀY
use Filament\Panel; // <--- THÊM DÒNG NÀY

class User extends Authenticatable implements FilamentUser // <--- THÊM "implements FilamentUser"
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
     * CẤP QUYỀN TRUY CẬP VÀO FILAMENT ADMIN PANEL
     */
    public function canAccessPanel(Panel $panel): bool
    {
        // Cho phép email của bác truy cập
        return $this->email === 'lehoangthinh2233@gmail.com';
        
        // Hoặc nếu muốn cho phép tất cả user trong bảng users đều được vào:
        // return true;
    }
}
