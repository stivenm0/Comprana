<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'Invoice',
        'total',
        'phone',
        'address',
    ];

    const STATUS =  ['Procesando', 'En Camino', 'Entregado', 'No Entregado'];


    /**
     * Get the user that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the dispatcher that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dispatcher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'dispatcher_id', 'id');
    }
    

    public function delivery(): BelongsTo
    {
        return $this->belongsTo(User::class, 'delivery_id', 'id');
    }

}
