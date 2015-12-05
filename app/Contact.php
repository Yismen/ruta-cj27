<?php namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Contact extends Model {	

	protected $table = 'contacts';

	protected $fillable = ['user_id','name', 'mobile', 'secondary', 'address', 'email', 'dob', 'photo','public'];

	protected $dates = ['dob'];

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function scopeCurrentuser( $query )
	{
		$query->whereUsername(\Auth::user()->username);
	}

	 /**
     * ====================================================================
     * Accessors
     */
    public function getDobAttribute($time)
    {
        return Carbon::parse($time)->format("Y-m-d");
    }

    /**
     * ====================================================================
     * Mutators
     */

    public function setDobAttribute($time)
    {   
        $format = 'Y-m-d';
        $time = Carbon::parse($time)->format($format); 
        return $this->attributes['dob'] = Carbon::createFromFormat($format, $time);
    }

}
