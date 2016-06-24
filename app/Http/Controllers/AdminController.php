<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

use App\BudgetCategory, App\Document;
class AdminController extends Controller
{
    public function __construct(){
    	$this->middleware('admin');
    }

    public function index(){
    	// return Auth::guard('admin')->user();
    	$category = BudgetCategory::where('status', 1)->count();
    	$document = Document::where('status', 1)->count();
    	return view('admin.dashboard', compact('category', 'document'));
    }
}
