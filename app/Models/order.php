<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\agencies;

class order extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name',
        'street',
        'zip',
        'city',
        'country',
        'telephone',
        'www',
        'mail_address',
        'managing_director',
        'agency_id',
        'ip',
        'pdf_url'
    ];

    public function agency()
    {
        return $this->belongsTo(agencies::class);
    }
}
