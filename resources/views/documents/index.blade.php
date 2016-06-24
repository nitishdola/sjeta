@extends('layouts.admin')
@section('title') : View all documents uploaded @stop
@section('page_title')  View All Documents Uploaded @stop
@section('content')
<!-- div.table-responsive -->

<!-- div.dataTables_borderWrap -->
<div class="col-xs-7">
	<?php $count = 1; ?>
	<table id="dynamic-table" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Category</th>
				<th class="hidden-480">Upload Date</th>
				<th> Download</th>
				<th> Remove </th>
			</tr>
		</thead>

		<tbody>
	        @foreach($results as $k => $v)
	        <tr>
	            <td> {{ (($results->currentPage() - 1 ) * $results->perPage() ) + $count + $k }} </td>
	            <td class="hidden-xs"> {{ $v->budget_category['name'] }} </td>
	            <td class="hidden-xs"> {{ date('d-m-Y', strtotime($v->upload_date)) }} </td>
	            <td><a href="{{ route('documents.download', Crypt::encrypt($v->document_path)) }}">Download File</a></td>
	            <td>
	                <a onclick="return confirm('Are you sure you want to delete this item?');" href=" {{ route('documents.disable', Crypt::encrypt($v->id)) }}">
	                    <i class="fa fa-trash"></i>Remove
	                </a>
	            </td>

	        </tr>
	        @endforeach
	    </tbody>
	</table>
	<div class="pagination">
	{!! $results->render() !!}
	</div>
</div>

@stop