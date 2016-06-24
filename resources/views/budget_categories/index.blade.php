@extends('layouts.admin')
@section('title') : View all budget categories added @stop
@section('page_title')  View All Budget Categories @stop
@section('content')
<!-- div.table-responsive -->

<!-- div.dataTables_borderWrap -->
<div class="col-xs-7">
	<?php $count = 1; ?>
	<table id="dynamic-table" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th class="hidden-480">Action</th>
			</tr>
		</thead>

		<tbody>
	        @foreach($results as $k => $v)
	        <tr>
	            <td> {{ (($results->currentPage() - 1 ) * $results->perPage() ) + $count + $k }} </td>
	            <td class="hidden-xs"> {{ $v->name }} </td>
	            <td>
	                <a href=" {{ route('budget_category.edit', Crypt::encrypt($v->id)) }}">
	                    <i class="fa fa-edit"></i>Edit
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