@if (session('message'))
    <div class="alert alert-danger">
        {{ session('message') }}
    </div>
@endif
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="title">Nazwa ligi</label>
    <input type="text" name="name" class="form-control" id="name" autofocus
           placeholder="Nazwa kategorii" value="{{ isset($league->name) ? $league->name : ''}} ">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <label for="seasons" class="control-label">Sezon</label>
    <select name="seasons[]" id="seasons" class="form-control select2" multiple>
        @foreach($seasons as $season)
            <option value="{{$season->id}}"
                    @if(!empty($league) && in_array($season->id, $league->seasons()->pluck('id')->toArray() )) selected @endif>
                {{$season->season}}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="stadiums" class="control-label">Hale</label>
    <select name="stadiums[]" id="stadiums" class="form-control select2" multiple>
        @foreach($stadiums as $stadium)
            <option value="{{$stadium->id}}"
                    @if(!empty($league) && in_array( $stadium->id, $league->stadiums()->pluck('id')->toArray(),'id')) selected @endif>
                {{$stadium->adress}}
            </option>
        @endforeach
    </select>
</div>

<button type="submit" class="btn btn-primary mt-3">Zatwierdź</button>


