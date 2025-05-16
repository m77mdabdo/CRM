<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Action extends Model
{

    use HasFactory;

    use HasFactory;
    protected $fillable = [
        'customer_id',
        'user_id',
        'action_type',
        'action_date',
    ];

    protected $casts = [
        'action_date' => 'datetime',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function employee()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
