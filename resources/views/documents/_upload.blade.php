<div id="form">
<div class="form-group {{ $errors->has('budget_category_id') ? 'has-error' : ''}}">
  {!! Form::label('budget_category_id', 'Budget Category', array('class' => 'col-md-2 control-label')) !!}
  <div class="col-md-5">
    {!! Form::select('budget_category_id', $budget_categories, null, ['class' => 'form-control required', 'id' => 'name', 'placeholder' => 'Select Budget Category','required' => 'true']) !!}
  </div>
  {!! $errors->first('budget_category_id', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('budget_category_id') ? 'has-error' : ''}}">
  {!! Form::label('upload_date', 'Upload Date', array('class' => 'col-md-2 control-label')) !!}
  <div class="col-md-5">
    {!! Form::text('upload_date', null, ['class' => 'datepicker form-control required', 'id' => 'upload_date', 'placeholder' => 'Select Upload Date','required' => 'true']) !!}
  </div>
  {!! $errors->first('upload_date', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('document_path') ? 'has-error' : ''}}">
  {!! Form::label('document_path', 'Select Document', array('class' => 'col-md-2 control-label')) !!}
  <div class="col-md-3">
    {!! Form::file('document_paths[]', null, ['class' => 'form-control required', 'id' => 'document_path','required' => 'true']) !!}
  </div>
  {!! $errors->first('document_path', '<span class="help-inline">:message</span>') !!}
</div>
</div>

<div class="form-group {{ $errors->has('document_path') ? 'has-error' : ''}}">
  {!! Form::label('', '', array('class' => 'col-md-3 control-label')) !!}
	<div class="col-md-5">
		<a href="javascript:void()" class="add_more"><i class="fa fa-plus" aria-hidden="true"></i>ADD MORE</a>
	</div>
</div>