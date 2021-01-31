@extends('admin.default')

@section('page-header')
    Authors <small>{{ trans('app.manage') }}</small>
@endsection

@section('content')

    <div class="mB-20">
        <a href="{{ route(ADMIN . '.authors.create') }}" class="btn btn-info">
            {{ trans('app.add_button') }}
        </a>
    </div>


    <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <div class="table-responsive">
            <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Publisher</th>
                        <th>Address</th>
                        <th>Books</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Publisher</th>
                        <th>Address</th>
                        <th>Books</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>

                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td><a href="{{ route(ADMIN . '.authors.edit', $item->id) }}">{{ $item->name }}</a></td>
                            <td>{{ $item->publisher }}</td>
                            <td>{{ $item->address }}</td>
                            <td>
                                @php
                                $books = $item->books;
                                $bookCount = count($books);
                                @endphp

                                @for ($i = 0; $i < $bookCount; $i++)
                                @if ($i !== $bookCount - 1 && $bookCount !== 1)
                                {{ $books[$i]->name }},
                                @else
                                {{ $books[$i]->name }}
                                @endif
                                @endfor
                            </td>
                            <td>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="{{ route(ADMIN . '.authors.edit', $item->id) }}" title="{{ trans('app.edit_title') }}" class="btn btn-primary btn-sm"><span class="ti-pencil"></span></a></li>
                                    <li class="list-inline-item">
                                        {!! Form::open([
                                            'class'=>'delete',
                                            'url'  => route(ADMIN . '.authors.destroy', $item->id),
                                            'method' => 'DELETE',
                                            ])
                                        !!}

                                            <button class="btn btn-danger btn-sm" title="{{ trans('app.delete_title') }}"><i class="ti-trash"></i></button>

                                        {!! Form::close() !!}
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

@endsection
