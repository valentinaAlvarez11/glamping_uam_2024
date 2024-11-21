<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CabinService extends Model
{
    use HasFactory;
    protected $table = 'cabin_services';
    protected $fillable = [
        'cabin_id',
        'service_id',
    ];

    public function cabin()
    {
        return $this->belongsTo(Cabin::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
