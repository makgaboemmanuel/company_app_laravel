<?php

namespace App;

use App\Scopes\FilterScope;
use App\Scopes\SearchScope;
use App\Scopes\ContactSearchScope;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
   /*  user added code   */
   /* user added code */

   protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'address', 'company_id', 'user_id']; /* this columns are mass assignable */

   public $filterColumns = ['company_id'] ;

    public function company(){
        return $this->belongsTo(Company::class, 'company_id');
        /*      the second argument is optional, default, it takes the method name plus underscore plus
                primary key of name of the primary key of this class */
    }

    public function scopeLatestFirst( $query ){
        return $query->orderBy('id', 'desc');
    }

    /* this defines relationships between modesl  */
    public function user(){
        return $this->belongsTo(User::class);
    }

    protected static function boot(){
        parent::boot();

        static::addGlobalScope(new FilterScope);
        static::addGlobalScope(new ContactSearchScope);
    }

    /* new added code: Section 10: 45  - never uncomment this line, it will change a lot of your code */
    /* public function getRouteKeyName()
    {
        return 'first_name' ;
    } */

}
