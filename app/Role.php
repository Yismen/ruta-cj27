<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['role', 'description'];

    /**
     * ============================================
     * Relationship
     */
    
    public function users()
    {
    	return $this->hasMany(User::class);
    }

    /**
     * Accessor
     */
    // public function getRoleAttribute($role)
    // {
    // 	return ucwords($role);
    // }
}
