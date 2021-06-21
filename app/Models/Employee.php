<?php

namespace App\Models;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'company_id',
        'name',
        'surname',
        'job',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
