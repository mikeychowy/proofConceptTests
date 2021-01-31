@extends('admin.default')

@section('page-header')
    Books <small>{{ trans('app.manage') }}</small>
@endsection

@section('content')

    <div class="mB-20">
        <a href="{{ route(ADMIN . '.books.create') }}" class="btn btn-info">
            {{ trans('app.add_button') }}
        </a>
    </div>


    <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <div class="table-responsive">
            <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Genre</th>
                        <th>Price</th>
                        <th>Authors</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Genre</th>
                        <th>Price</th>
                        <th>Authors</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>

                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td><a href="{{ route(ADMIN . '.books.edit', $item->id) }}">{{ $item->name }}</a></td>
                            <td>{{ $item->genre }}</td>
                            <td>${{ $item->price }}</td>
                            <td>
                                @php
                                $authors = $item->authors;
                                $authorCount = count($authors);
                                @endphp

                                @for ($i = 0; $i < $authorCount; $i++)
                                @if ($i !== $authorCount - 1 && $authorCount !== 1)
                                {{ $authors[$i]->name }},
                                @else
                                {{ $authors[$i]->name }}
                                @endif
                                @endfor
                            </td>
                            <td>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="{{ route(ADMIN . '.books.edit', $item->id) }}" title="{{ trans('app.edit_title') }}" class="btn btn-primary btn-sm"><span class="ti-pencil"></span></a></li>
                                    <li class="list-inline-item">
                                        {!! Form::open([
                                            'class'=>'delete',
                                            'url'  => route(ADMIN . '.books.destroy', $item->id),
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