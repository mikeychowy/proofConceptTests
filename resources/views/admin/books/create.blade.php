@extends('admin.default')

@section('page-header')
	Book <small>{{ trans('app.add_new_item') }}</small>
@stop

@section('content')
	{!! Form::open([
			'route' => [ ADMIN . '.books.store' ],
			'files' => true
		])
	!!}

		@include('admin.books.form')

		<button type="submit" class="btn btn-primary">{{ trans('app.add_button') }}</button>

	{!! Form::close() !!}

@stop
