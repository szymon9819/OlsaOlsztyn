<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="title">Nazwa kategorii</label>
    <input type="text" name="name" class="form-control" id="name" autofocus
           placeholder="Nazwa kategorii" value="{{ isset($category->name) ? $category->name : ''}} " >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<button type="submit" class="btn btn-primary mt-3">Zatwierdź</button>


