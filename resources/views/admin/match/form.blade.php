<div class="form-group {{ $errors->has('adress') ? 'has-error' : ''}}">
    <label for="adress">Adres hali</label>
    <input type="text" name="adress" class="form-control" id="adress" autofocus
           placeholder="Adres hali" value="{{ isset($stadium->adress) ? $stadium->adress : ''}} " >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<button type="submit" class="btn btn-primary mt-3">Zatwierdź</button>


