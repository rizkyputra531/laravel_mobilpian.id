<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KasKeluar extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'jenis_pengeluaran',
        'keterangan',
        'tanggal',
        'quantity',
        'harga',
        'total',

    ];

    protected $cast = [
        'tanggal' => 'date',
    ];

    // public function setTanggalAttribute($value)
    // {
    //     $this->attributes['tanggal'] = Carbon::createFromFormat(format: 'm/d/Y', $value)->format(format:'Y-m-d');
    // }

    // public function getTanggalAttribute()
    // {
    //     return Carbon::createFromFormat(format:'Y-m-d', $this->attributes['tanggal'])->format(format:'m/d/Y');
    // }
}
