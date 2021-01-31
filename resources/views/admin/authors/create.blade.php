@extends('admin.default')

@section('page-header')
	Author <small>{{ trans('app.add_new_item') }}</small>
@stop

@section('content')
	{!! Form::open([
			'route' => [ ADMIN . '.authors.store' ],
			'files' => true
		])
	!!}

		@include('admin.authors.form')

		<button type="submit" class="btn btn-primary">{{ trans('app.add_button') }}</button>

	{!! Form::close() !!}

@stop
