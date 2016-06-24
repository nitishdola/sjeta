@extends('layouts.admin')
@section('title') Dashboard @stop
@section('page_title') Dashboard @stop
@section('content')
<div class="col-sm-12 infobox-container">
	<!-- #section:pages/dashboard.infobox -->
	<div class="infobox infobox-green">
		<div class="infobox-icon">
			<i class="ace-icon fa fa-suitcase"></i>
		</div>

		<div class="infobox-data">
			<span class="infobox-data-number">{{ $category }}</span>
			<div class="infobox-content">Category Added </div>
		</div>

		<!-- /section:pages/dashboard.infobox.stat -->
	</div>

	<div class="infobox infobox-blue">
		<div class="infobox-icon">
			<i class="ace-icon fa fa-file-excel-o"></i>
		</div>

		<div class="infobox-data">
			<span class="infobox-data-number">{{ $document }}</span>
			<div class="infobox-content">Documents Added</div>
		</div>
	</div>

	<!-- /section:pages/dashboard.infobox.dark -->
</div>
@endsection
