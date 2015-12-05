<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Todo extends Model
{
    protected $fillable =['user_id', 'name', 'done', 'due'];

    /**
     * ====================================================================
     * Relationships
     */
    
    public function user()
    {
    	return $this->belongsTo("App\User");
    }

    /**
     * ====================================================================
     * Scopes
     */

    /**
     * ====================================================================
     * Accessors
     */
    public function getDueAttribute($time)
    {
        return Carbon::parse($time)->format("Y-m-d");
    }

    /**
     * ====================================================================
     * Mutators
     */
    public function setUserIdAttribute($userId)
    {
        return $this->attributes['user_id'] = \Auth::user()->id;
    }

    public function setDueAttribute($time)
    {   
        $format = 'Y-m-d';
        $time = Carbon::parse($time)->format($format); 
        return $this->attributes['due'] = Carbon::createFromFormat($format, $time);
    }


}
