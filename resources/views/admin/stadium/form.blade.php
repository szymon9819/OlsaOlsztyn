<div class="form-group {{ $errors->has('adress') ? 'has-error' : ''}}">
    <label for="title">Adres hali</label>
    <input type="text" name="adress" class="form-control" id="adress" autofocus
           placeholder="Adres hali" value="{{ isset($stadium->adress) ? $stadium->adress : ''}} " >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <label for="league" class="control-label">Ligi</label>
    <select name="league_id" id="league" class="form-control">
        <option value="">
            Brak ligi
        </option>
        @foreach($leagues as $league)
            <option value="{{$league->id}}"
                    @if(!empty($stadium) && $league['id'] == $stadium->league_id) selected @endif>
                {{$league->name}}
            </option>
        @endforeach
    </select>
</div>

<button type="submit" class="btn btn-primary mt-3">Zatwierdź</button>


