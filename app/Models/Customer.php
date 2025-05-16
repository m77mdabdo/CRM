<?php

namespace App\Models;

use App\Models\Action;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'user_id',
    ];


    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'customer_employees', 'customer_id', 'user_id');
    }


    public function actions()
    {
        return $this->hasMany(Action::class);
    }


    public function customerEmployees()
    {
        return $this->hasMany(CustomerEmployee::class);
    }
}
