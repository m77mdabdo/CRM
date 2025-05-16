<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function createdCustomers()
    {
        return $this->hasMany(Customer::class, 'user_id');
    }


    public function customers()
    {
        return $this->belongsToMany(Customer::class, 'customer_employees', 'user_id', 'customer_id');
    }


    public function actions()
    {
        return $this->hasMany(Action::class, 'user_id');
    }


    public function customerEmployees()
    {
        return $this->hasMany(CustomerEmployee::class);
    }
}
