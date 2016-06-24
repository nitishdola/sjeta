@extends('layouts.admin')
@section('title') Add a budget category @stop
@section('page_title')  Add Budget Category @stop
@section('content')

        {!! Form::open(array('route' => 'budget_category.store', 'id' => 'budget_category', 'class' => 'form-horizontal row-border')) !!}
            @include('budget_categories._create')
            {!! Form::label('', '', array('class' => 'col-md-2 control-label')) !!}
            {!! Form:: submit('Submit', ['class' => 'btn btn-success']) !!}
        {!!form::close()!!}

@endsection