<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    // protected $table = 'transaction';
    
    // protected $fillable = ['users_id'];
    protected $guarded = [];
    public function detail() {
        return $this->hasMany(Detail::class);
    }
    


}
