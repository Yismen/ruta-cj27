<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;
use DB;

class Driver extends Model
{
    protected $fillable = [
    	'file_number',
    	'full_name',
    	'main_image',
    	'personal_id',
    	'dob',
    	'cellphone',
    	'phone',
    	'address',
    	'city',
    	'card_number',
    	'car_id',
    	'plate_number',
    	'reference',
    	'reference_phone'
    ];

    protected $dates = ['dob'];

 /**
     * ====================================================================
     * Relationships
     */

    /**
     * ====================================================================
     * Scopes
     */

    public function scopeToday($query)
    {
        return $query->where( DB::raw('DAY(dob)')  , date('d', strtotime('today')));
    }

    public function scopeThisMonth($query)
    {
        return $query->where( DB::raw('MONTH(dob)')  , date('n', strtotime('+0 months')));
    }
    
    public function scopeNextMonth($query)
    {
        return $query->where( DB::raw('MONTH(dob)')  , date('n', strtotime('+1 months')));
    }

    public function scopeByDob($query)
    {
        return $query->orderBy(DB::raw('DAY(dob)'), 'ASC');
    }

    /**
     * ====================================================================
     * Accessors
     */
    public function getDobAttribute($time)
    {
        return Carbon::parse($time)->format("Y-m-d");
    }

    public function getFullNameAttribute($name)
    {
    	return $name = ucwords($name);
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

    /**
     * ====================================================================
     * Methods
     */
    public function getBirthdaysTodayCount()
    {
        return $this->today()->count();
    }

    public function getBirthdaysThisMonthCount()
    {
        return $this->thisMonth()->count();
    }

    public function getBirthdaysNextMonthCount()
    {
        return $this->nextMonth()->byDob()->count();
    }

    public function getBirthdaysToday()
    {
        return $this->today()->byDob()->get();
    }

    public function getBirthdaysThisMonth()
    {
        return $this->thisMonth()->byDob()->get();
    }

    public function getBirthdaysNextMonth()
    {
        return $this->nextMonth()->byDob()->get();
    }



}
