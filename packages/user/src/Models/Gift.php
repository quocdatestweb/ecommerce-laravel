<?php



namespace datnguyen\user\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Gift extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'gift_text',
        'image_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}