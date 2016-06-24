@extends('layouts.admin')
@section('title') Edit a budget category @stop
@section('page_title')  Edit Budget Category @stop
@section('content')

        {!! Form::model($budget_category, array('route' => array('budget_category.update', Crypt::encrypt($budget_category->id)), 'id' => 'budget_category', 'class' => 'form-horizontal row-border')) !!}
            @include('budget_categories._create')
            {!! Form::label('', '', array('class' => 'col-md-2 control-label')) !!}
            {!! Form:: submit('Update', ['class' => 'btn btn-success']) !!}
        {!!form::close()!!}

@endsection