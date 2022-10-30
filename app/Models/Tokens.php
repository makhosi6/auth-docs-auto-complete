<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Tokens extends Model
{
    use HasFactory;
    use HasUuids;
    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    
    protected $keyType = 'string';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    protected $fillable = [
        'key',
        'uuky', // user unique key
        'token', // auth token used
    ];
}
