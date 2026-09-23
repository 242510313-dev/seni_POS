<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';

    protected $fillable = [
        'user_id',
        'total_pembayaran',
        'discount_percentage',
        'discount_amount',
        'metode_pembayaran',
        'cash_amount',
        'change_amount',
        'status'
    ];

    protected function casts(): array
    {
        return [
            'cash_amount' => 'integer',
            'change_amount' => 'integer',
            'discount_percentage' => 'integer',
            'discount_amount' => 'integer',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function itemPenjualan()
    {
        return $this->hasMany(ItemPenjualan::class, 'penjualan_id');
    }
}