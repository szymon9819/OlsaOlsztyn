<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title">Tytul</label>
    <input type="text" name="title" class="form-control" id="titile" autofocus
           placeholder="Tytuł postu" value="{{ isset($post->title) ? $post->title : ''}} ">
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <label for="file">Miniaturka</label>
    <input type="file" name="thumbnail" id="file">
</div>

<div class="form-group ">
    <div class="quill-editor">
        <div id="editor" data-img-url="{{route('admin.post.image.store')}}">
            {!! isset($post->content) ? $post->content : '' !!}
        </div>
    </div>
    <textarea class="form-control" name="content" type="textarea" style="display: none;"
              id="content-textarea">{{ isset($post->content) ? $post->content : ''}}</textarea>
</div>
<div class="form-group ">
    <label for="category_id" class="control-label">Kategoria</label>
    <select name="post_category_id" id="category_id" class="form-control select2">
        @foreach($categories as $category)
            <option value="{{$category->id}}"
                    @if(!empty($post) && $category->id == $post->post_category_id) selected @endif>
                {{$category->name}}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="tag" class="control-label">Tagi</label>
    <select name="tags[]" id="tag" class="form-control select2" multiple>
        @foreach($tags as $tag)
            <option value="{{$tag->id}}"
                    @if(!empty($post) && in_array( $tag->id,array_intersect(array_column($post->tags->toArray(),'id'), array_column($tags->toArray(),'id')))) selected @endif>
                {{$tag->name}}
            </option>
        @endforeach
    </select>
</div>

<div class="form-check">
    <input type="checkbox" name="status" class="form-check-input" id="statusCheckbox"
           @if(!empty($post) && $post->status) checked @endif>
    <label class="form-check-label" for="statusCheckbox">Opublikowany</label>
</div>
<button type="submit" class="btn btn-primary mt-3">Zatwierdź</button>


