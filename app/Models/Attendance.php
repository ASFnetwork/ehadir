<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    // declare custome table, default will be the class
    protected $table = 'attendance';
    // declare primary keys, default id
    protected $primaryKey = 'idattendance_sheet';
    // declare date fields
    protected $dates = ['lastupdate'];

    public $timestamps = false;


    //mutator example - format berfore insert & after retrive
    // function format 
    // setXXXXXXXXAttribibute($date)

     public function setLastUpdateAttribibute($date) {
     	//$this->attributes['lastupdate'] = Carbon::createfromformat('d/m/Y H:i:s',$date); 
     	$this->attributes['lastupdate'] = Carbon::parse($date); 
     }

     //scope sample
     public function scopeCurrentMonth($query) {
		return $query->whereBetween('lastupdate', [
        	Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()
    	]);
     }

}
