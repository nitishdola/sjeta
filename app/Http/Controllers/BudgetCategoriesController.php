<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB, Validator, Redirect, Crypt;

use App\BudgetCategory;

class BudgetCategoriesController extends Controller
{

	public function index() {
        $results = BudgetCategory::where('status',1)->orderBy('name')->paginate(20);
    	return view('budget_categories.index', compact('results'));
    }

    public function create() {
    	return view('budget_categories.create');
    }

    public function store(Request $request ) {
    	$validator = Validator::make($data = $request->all(), BudgetCategory::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

    	$message = '';
    	if(BudgetCategory::create($data)) {
            	$message .= 'Budget Category added successfully !';
        }else{
            $message .= 'Unable to add budget category !';
        }

        return Redirect::route('budget_category.index')->with('message', $message);
    }

    public function edit($id) {
        $id =  Crypt::decrypt($id);
        $budget_category = BudgetCategory::findOrFail($id);
        return view('budget_categories.edit', compact('budget_category'));
    }

    public function update(Request $request, $id ) {
        $validator = Validator::make($data = $request->all(), BudgetCategory::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $id =  Crypt::decrypt($id);
        $budget_category = BudgetCategory::findOrFail($id);

        $message = '';

        $budget_category->fill($data);
        if($budget_category->save()) {
                $message .= 'Budget Category updated successfully !';
        }else{
            $message .= 'Unable to update budget category !';
        }

        return Redirect::route('budget_category.index')->with('message', $message);
    }
}
