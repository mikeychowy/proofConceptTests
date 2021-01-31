<div class="row mB-40">
	<div class="col-sm-8">
		<div class="bgc-white p-20 bd">
            @if (isset($item))

            {!! Form::hidden('id', $item->id); !!}

            {!! Form::myInput('text', 'name', 'Book Name') !!}

            {!! Form::mySelect('genre', 'Genre', ['Fantasy', 'Action', 'Historical', 'Misc'], $selectedGenre, ['class' => 'form-control select2']) !!}

            <div class="form-group">
                <label for="price">Price in US Dollars</label>
                <input step=".01" class="form-control" name="price" type="number" value="{{ $item->price ? $item->price : 7000 }}" id="price">
            </div>

            {!! Form::myFile('bookvatar', 'Book Image') !!}

            <div class="form-group">
                <label for="authors">Authors</label>
                <select id="authors" tabindex="0" aria-hidden="false" class="form-control select2" name="authors[]" multiple="multiple">
                    @foreach ($authors as $key => $author)
                    <option {{ in_array($author->id, $selectedAuthors) ? 'selected' : '' }} value="{{$author->id}}">{{$author->name}}</option>
                    @endforeach
                </select>
            </div>

            @else

            {!! Form::myInput('text', 'name', 'Book Name') !!}

            {!! Form::mySelect('genre', 'Genre', ['Fantasy', 'Action', 'Historical', 'Misc'], null, ['class' => 'form-control select2']) !!}

            <div class="form-group">
                <label for="price">Price in US Dollars</label>
                <input step=".01" class="form-control" name="price" type="number" value="7000" id="price">
            </div>

            {!! Form::myFile('bookvatar', 'Book Image') !!}

            <div class="form-group">
                <label for="authors">Authors</label>
                <select id="authors" tabindex="0" aria-hidden="false" class="form-control select2" name="authors[]" multiple="multiple">
                    @foreach ($authors as $key => $author)
                    <option value="{{$author->id}}">{{$author->name}}</option>
                    @endforeach
                </select>
            </div>

            @endif
		</div>
	</div>
	@if (isset($item) && $item->bookvatar)
		<div class="col-sm-4">
			<div class="bgc-white p-20 bd">
				<img src="{{ $item->bookvatar }}" alt="">
			</div>
		</div>
	@endif
</div>
