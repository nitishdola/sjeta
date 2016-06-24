<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = array('budget_category_id','upload_date', 'document_path', 'status');
	protected $table    = 'documents';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'budget_category_id'=>  'required|exists:budget_categories,id',
    	'upload_date'  		=>  'required|date',
    	'document_path' 	=>  'required',
      ];

    public function budget_category()
    {
      return $this->belongsTo('App\BudgetCategory', 'budget_category_id');
    }
}
