<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contract extends Model
{
    use HasFactory;
    protected $guarded = [];

   public function car()
   {
       return $this->belongsTo(car::class, 'car_id');
   }
   public function user()
   {
       return $this->belongsTo(user::class, 'user_id');
   }
   public function customer()
   {
       return $this->belongsTo(customer::class, 'cus_id');
   }
   public function bank()
   {
       return $this->belongsTo(bank::class, 'bank_id');
   }
   public function driver()
   {
       return $this->belongsTo(driver::class, 'driver_id');
   }
}
