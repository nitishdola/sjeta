<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BudgetCategory extends Model
{
    protected $fillable = array('name', 'status');
	protected $table    = 'budget_categories';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'name' 		=>  'required|min:3|max:255',
    ];
}
