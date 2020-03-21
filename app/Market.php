<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    protected $table = 'market';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'address'];

    public function prices()
    {
        return $this->hasMany('App\MarketPrice');
    }
}
