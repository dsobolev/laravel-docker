<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'label',
    ];

    public function users() {
    
        return $this->hasMany(User::class);
    }

    public function permissions() {

        return $this->belongsToMany(Permission::class)->withTimestamps();
    }

    public function allowTo(int $permission_id) {
    
        $this->permissions()->attach($permission_id);
    }
}
