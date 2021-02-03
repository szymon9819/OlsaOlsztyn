@if (session('message'))
    <div class="alert alert-danger">
        {{ session('message') }}
    </div>
@endif

<div class="form-group {{ $errors->has('season') ? 'has-error' : ''}}">
    <label for="title">Nazwa Sezonu</label>
    <input type="text" name="season" class="form-control" id="season" autofocus
           placeholder="Nazwa sezonu" value="{{ isset($season->season) ? $season->season : ''}} " >
    {!! $errors->first('season', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <label for="leagues" class="control-label">Ligi</label>
    <select name="leagues[]" id="leagues" class="form-control select2" multiple>
        @foreach($leagues as $league)
            <option value="{{$league->id}}"
                    @if(!empty($season) && in_array( $league->id,array_intersect(array_column($season->leagues->toArray(),'id'), array_column($leagues->toArray(),'id')))) selected @endif>
                {{$league->name}}
            </option>
        @endforeach
    </select>
</div>

<button type="submit" class="btn btn-primary mt-3">Zatwierdź</button>


