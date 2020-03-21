<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarketPrice extends Model
{
    protected $table = 'prices';

    protected $primaryKey = 'id';

    protected $fillable = ['market_id', 'product_id', 'price'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function market()
    {
        return $this->belongsTo(Market::class);
    }
}
