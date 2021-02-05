<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="title">Nazwa drużyny</label>
    <input type="text" name="name" class="form-control col-4" id="name" autofocus
           placeholder="Nazwa tagu" value="{{ isset($team->name) ? $team->name : ''}} " >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="title">Skrót drużyny</label>
    <input type="text" name="shorthand" class="form-control col-4" id="shorthand" autofocus
           placeholder="Skrót Drużyny" value="{{ isset($team->shorthand) ? $team->shorthand : ''}} " >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <label for="league_id" class="control-label">Liga</label>
    <select name="league_id" id="league_id" class="form-control col-4 select2">
        @foreach($leagues as $league)
            <option value="{{$league->id}}"
                    @if(!empty($team) && $league->id == $team->league_id) selected @endif>
                {{$league->name}}
            </option>
        @endforeach
    </select>
</div>

<button type="submit" class="btn btn-primary mt-3">Zatwierdź</button>


