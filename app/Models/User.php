<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'title',
        'bio',
        'github_url',
        'portfolio_url',
        'avatar',
        'projects'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function skills(){
        return $this->belongsToMany(Skill::class,'user_skill');
    }
    
    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function connections(){
        return $this->hasMany(Connection::class,'receiver_id')->where('status', 'accepted') ->orWhere(function($query) {
            $query->where('sender_id', $this->id)
                ->where('status', 'accepted');
        });
    }

    public function pendingconnections(){
        return $this->hasMany(Connection::class, 'receiver_id')
            ->where('status', 'pending')
            ->orWhere(function($query) {
                $query->where('sender_id', $this->id)
                    ->where('status', 'pending');
            });
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function sentConnections(){
        return $this->hasMany(Connection::class, 'sender_id');
    }
}
