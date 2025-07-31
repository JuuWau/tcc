<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'address',
        'neighborhood',
        'number',
        'cep',
        'extra_info',
        'city',
        'state',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
