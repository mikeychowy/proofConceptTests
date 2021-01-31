<div class="row mB-40">
	<div class="col-sm-8">
		<div class="bgc-white p-20 bd">
            @if (isset($item))

            {!! Form::hidden('id', $item->id); !!}

            {!! Form::myInput('text', 'name', 'Author Name') !!}

            {!! Form::myInput('text', 'publisher', "Author's Publisher") !!}

            {!! Form::myTextArea('address', "Author's Address") !!}

            {!! Form::myFile('authvatar', 'Author Image') !!}

            <div class="form-group">
                <label for="books">Books</label>
                <select id="books" tabindex="0" aria-hidden="false" class="form-control select2" name="books[]" multiple="multiple">
                    @foreach ($books as $key => $book)
                    <option {{ in_array($book->id, $selectedBooks) ? 'selected' : '' }} value="{{$book->id}}">{{$book->name}}</option>
                    @endforeach
                </select>
            </div>

            @else

            {!! Form::myInput('text', 'name', 'Author Name') !!}

            {!! Form::myInput('text', 'publisher', "Author's Publisher") !!}

            {!! Form::myTextArea('address', "Author's Address") !!}

            {!! Form::myFile('authvatar', 'Author Image') !!}

            <div class="form-group">
                <label for="books">Books</label>
                <select id="books" tabindex="0" aria-hidden="false" class="form-control select2" name="books[]" multiple="multiple">
                    @foreach ($books as $key => $book)
                    <option value="{{$book->id}}">{{$book->name}}</option>
                    @endforeach
                </select>
            </div>

            @endif
		</div>
	</div>
	@if (isset($item) && $item->authvatar)
		<div class="col-sm-4">
			<div class="bgc-white p-20 bd">
				<img src="{{ $item->authvatar }}" alt="">
			</div>
		</div>
	@endif
</div>
