<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title">Tytul</label>
    <input type="text" name="title" class="form-control" id="titile"
           placeholder="Tytuł postu" value="{{ isset($post->title) ? $post->title : ''}} " >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content">Treść postu</label>
    <textarea class="form-control" name="content" id="content" rows="6">{{ isset($post->content) ? $post->content : ''  }} </textarea>
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="category_id" class="control-label">Kategoria</label>
    <select name="post_category_id" id="category_id" class="form-control">
        @foreach($categories as $category)
            <option value="{{$category->id}}"
                    @if(!empty($post) && $category->id == $post->category_id) selected @endif>
                {{$category->name}}
            </option>
        @endforeach
    </select>
    {{--            <input class="form-control" name="category_id" type="number" id="category_id" value="{{ isset($post->category_id) ? $post->category_id : ''}}" >--}}
    {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-check">
    <input type="checkbox" name="status" class="form-check-input" id="statusCheckbox"
           @if(!empty($post) && $post->status) checked @endif>
    <label class="form-check-label" for="statusCheckbox">Opublikowany</label>
</div>
<button type="submit" class="btn btn-primary mt-3">Zatwierdź</button>


