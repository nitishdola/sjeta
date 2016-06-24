@extends('layouts.admin')
@section('title') Upload documents @stop
@section('page_title')  Upload Documents @stop
@section('content')

        {!! Form::open(array('route' => 'documents.post.upload', 'files' => true, 'id' => 'documents.post.upload', 'class' => 'form-horizontal row-border')) !!}
            @include('documents._upload')
            {!! Form::label('', '', array('class' => 'col-md-2 control-label')) !!}
            {!! Form:: submit('Submit', ['class' => 'btn btn-success']) !!}
        {!!form::close()!!}

@endsection

@section('pageJs')
<script>
var counter = 1;

$('.add_more').click(function(e) {
	e.preventDefault();
	if(counter < 5) {
		var html = '';
		html += '<div class="form-group" id="more_upload_'+counter+'">';
		html += '<label for="document_path" class="col-md-2 control-label">Select Document</label>';
		html += '<div class="col-md-3">';
		html += '<input name="document_paths[]" type="file" id="document_path">';
		html += '</div>';
		html += '<div class="col-md-5">';
		html += '<a href="javascript:remove('+counter+')" class="remove">Remove</a>';
		html += '</div>';

		$('#form').append(html);

		counter++;
	}else{
		alert('Maximum of 5 files are allowed !');
	}
	
});	

function remove(cnt) {
	$('#more_upload_'+cnt).css({"background":"#da2525", "color":"white"}).delay(200).fadeOut();
	//counter--;
}
</script>

@endsection