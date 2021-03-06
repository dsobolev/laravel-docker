<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts() {

        return $this->hasMany(Post::class);
    }

    public function role() {

        return $this->belongsTo(Role::class);
    }

    public function assignRole(Role $role) {

        $this->role()->associate($role);
        $this->save();
    }

    /**
     * @return array List of permission labels - for HTML
     */
    public function getPermissionsLabels()
    {
        return is_null($this->role)
            ? []
            : $this->role->permissions->pluck('label')->all();
    }

    public function permittedTo($permission)
    {
        return $this->getPermissionsNames()->contains($permission);
    }

    /**
     * @return Illuminate\Support\Collection
     *
     * Returns empty array if role hasn't been assigned yet
     */
    public function getPermissionsNames() {

        return is_null($this->role)
            ? collect([])
            : $this->role->permissions->pluck('name');
    }

    public function getRoleLabel()
    {
        return $this->role->label ?? '';
    }

    public function getRoleName()
    {
        return $this->role->name ?? '';
    }
}
