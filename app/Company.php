<?php

namespace App;

use App\Scopes\SearchScope;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /* user added code */
    protected $fillable = ['name', 'address', 'email', 'website']; /* this columns are mass assignable */

    public $searchColumns = ['name', 'address', 'email', 'website'];

    /*  this is to add relationships to the table  */
    public function contacts(){

        return $this->hasMany(Contact::class)->withoutGlobalScope(SearchScope::class);

        /* original line   */
        /* return $this->hasMany(Contact::class, 'company_id');  */
        /*  the second argument is optional but is defaulted as: 'the class name  + underscore + id' */
    }

    /* this defines relationships between models */
    public function user(){
       return $this->belongsTo(User::class);
    }

    public static function boot(){
            parent::boot();

            static::addGlobalScope(new SearchScope) ;
    }

    public static function  userCompanies(){
        return  self::where('user_id', auth()->id() ) ->orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');

        /* old code  */
    }

}
