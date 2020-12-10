<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="title">Nazwa tagu</label>
    <input type="text" name="name" class="form-control" id="name"
           placeholder="Nazwa tagu" value="{{ isset($tag->name) ? $tag->name : ''}} " >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<button type="submit" class="btn btn-primary mt-3">Zatwierdź</button>


