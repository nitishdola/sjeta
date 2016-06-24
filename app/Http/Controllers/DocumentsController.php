<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB, Validator, Redirect, Crypt;

use App\Document, App\BudgetCategory;

class DocumentsController extends Controller
{
    public function upload() {
    	$budget_categories = BudgetCategory::orderBy('name')->lists('name', 'id')->toArray();
    	return view('documents.upload', compact('budget_categories'));
    }

    public function doUpload(Request $request ) { 
    	//dd($request->file('document_paths'));
    	//$validator = Validator::make($data = $request->all(), Document::$rules);
        //if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();
        
        if(count($request->file('document_paths'))) {
        	if ($request->hasFile('document_paths')) { 
        		for($i =0; $i < count($request->file('document_paths')); $i++) {
		            if ($request->file('document_paths')[$i]->isValid()){
		                $doc_path = 'uploads/docs/'.date('Y-m-d');
		                $destination_path = storage_path( $doc_path );
		                $fileName = $request->budget_category_id.'-'.rand().time().'_sjeta.'.$request->file('document_paths')[$i]->getClientOriginalExtension();
		                $request->file('document_paths')[$i]->move($destination_path, $fileName);
		                $data['document_path'] = $doc_path.'/'.$fileName;

		                dump($data);
		            }
		        }
        	}
 			
 			exit;
	    	$message = '';
	    	if(BudgetCategory::create($data)) {
	            	$message .= 'Budget Category added successfully !';
	        }else{
	            $message .= 'Unable to add budget category !';
	        }

        }
        

        return Redirect::route('budget_category.index')->with('message', $message);
    }
}
