<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'vat_number',
        'name',
        'image',
        'public',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
