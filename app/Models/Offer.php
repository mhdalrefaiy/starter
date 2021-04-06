<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\OfferScope;
class Offer extends Model
{
    protected $table = "offers";
    protected $fillable=['id','photo','name_ar','name_en','age','price','details_ar','details_en','created_at','updated_at','status'];
    protected $hidden = ['created_at','updated_at'];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new OfferScope);
    }

    ######################### local scopes ####################
    public function scopeInactive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeInvalid($query)
    {
        return $query->where('status', 0)->whereNull('details_en');
    }
    //
     //mutators

     public function setNameEnAttribute($value)
     {
         $this->attributes['name_en'] = strtoupper($value);
     }

    #########################################################
}
