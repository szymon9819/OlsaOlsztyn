@if (session('message'))
    <div class="alert alert-danger">
        {{ session('message') }}
    </div>
@endif

<div class="form-group">
    <label for="league" class="control-label d-block">Liga</label>
    <select name="league" id="league" class="form-control select2" >
        @foreach($leagues as $league)
            <option value="{{$league->id}}"
                    @if(!empty($season) && in_array( $league->id,array_intersect(array_column($season->leagues->toArray(),'id'), array_column($leagues->toArray(),'id')))) selected @endif>
                {{$league->name}}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="firstMatchDate" class="control-label">Data rozpoczęcia</label>
    <input type="text" id="firstMatchDate" class="form-control datepicker" name="date">
</div>

<div class="form-group">
    <label for="firstMatchTime" class="control-label">Godzina pierwszego meczu</label>
    <input id="firstMatchTime" type="text" class="form-control" name="time">
</div>

<button type="submit" class="btn btn-primary mt-3">Zatwierdź</button>


