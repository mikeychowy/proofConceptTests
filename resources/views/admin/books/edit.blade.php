@extends('admin.default')

@section('page-header')
	Book <small>{{ trans('app.update_item') }}</small>
@stop

@section('content')
	{!! Form::model($item, [
			'route'  => [ ADMIN . '.books.update', $item->id ],
			'method' => 'put',
			'files'  => true
		])
	!!}

		@include('admin.books.form')

		<button type="submit" class="btn btn-primary">{{ trans('app.edit_button') }}</button>

	{!! Form::close() !!}

@stop
