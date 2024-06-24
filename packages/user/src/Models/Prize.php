<?php


namespace datnguyen\user\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class Prize extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'prize_value',
        'winning_rate',
        'status',
    ];
}
