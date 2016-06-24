<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB, Validator, Redirect, Crypt, Response, BinaryFileResponse;

use App\Document, App\BudgetCategory;

class DocumentsController extends Controller
{
	public function index() {
		$results = Document::where('status',1)->orderBy('upload_date', 'DESC')->paginate(20);
    	return view('documents.index', compact('results'));
	}
    public function upload() {
    	$budget_categories = BudgetCategory::orderBy('name')->lists('name', 'id')->toArray();
    	return view('documents.upload', compact('budget_categories'));
    }

    public function doUpload(Request $request ) { 
    	$validator = Validator::make($data = $request->all(), Document::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();
        
        if(count($request->file('document_paths'))) {
        	if ($request->hasFile('document_paths')) { 
        		for($i =0; $i < count($request->file('document_paths')); $i++) {
		            if ($request->file('document_paths')[$i]->isValid()){

		            	$file = array('doc' => $request->file('document_paths')[$i]);
						// setting up rules
						$doc_rules = array('doc' => 'required|mimes:pdf,doc,docx,zip|max:2048');
						$validator = Validator::make($file, $doc_rules);
						if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

		                $doc_path = 'uploads/docs/'.date('Y-m-d');
		                $destination_path = storage_path( $doc_path );
		                $fileName = $request->budget_category_id.'-'.rand().time().'_sjeta.'.$request->file('document_paths')[$i]->getClientOriginalExtension();
		                $request->file('document_paths')[$i]->move($destination_path, $fileName);
		                $data['document_path'] = $doc_path.'/'.$fileName;

		                $data['upload_date'] = date('Y-m-d', strtotime($request->upload_date));

		                Document::create($data);
		            }
		        }
        	}
 			$message = 'File uploaded successfully !';
        }
        return Redirect::route('documents.index')->with('message', $message);
    }


    public function disable($id) {
        $id =  Crypt::decrypt($id);
        $document = Document::findOrFail($id);
        $document->status = 0;
        $document->save();
        $message = 'Document removed successfully !';
        return Redirect::route('documents.index')->with('message', $message);
    }

    public function getDownload( $filename )
	{
		$filename = Crypt::decrypt($filename);;
	    //PDF file is stored under project/public/download/info.pdf
	    $file = storage_path($filename);

	    $headers = array(
          'Content-Type: application/pdf',
        );
	    return Response::download($file, basename($filename), $headers);
	}
}
