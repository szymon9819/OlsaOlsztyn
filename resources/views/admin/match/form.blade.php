<div class="form-group">


    <div class="form-inline col-4 mb-3">
        <label for="home" class="mr-2"><strong>{{$match->homeTeam->name}}</strong></label>
        <input type="text" name="home" class="form-control col-2" id="home" autofocus
               value="{{ isset($match->matchResult) ? $match->matchResult->home : ''}} ">
        &nbsp;&nbsp;:&nbsp;&nbsp;
        <input type="text" name="guest" class="form-control col-2" id="guest"
               value="{{ isset($match->matchResult) ? $match->matchResult->guest : ''}} ">
        <label class="ml-2" for="home"><strong>{{$match->awayTeam->name}}</strong></label>
    </div>

    <div class="form-group">
        <label for="firstMatchDate" class="control-label">Data rozpoczęcia</label>
        <input type="text" id="firstMatchDate" class="form-control col-3 datepicker" name="match_day"
               value="{{ isset($match->match_day) ? $match->match_day : ''}} ">
    </div>

    <div class="form-group">
        <label for="firstMatchTime" class="control-label">Godzina pierwszego meczu</label>
        <input id="firstMatchTime" type="text" class="form-control col-3 timepicker" name="time"
               value="{{ isset($match->time) ? $match->time : ''}} ">
    </div>
</div>

<button type="submit" class="btn btn-primary mt-3">Zatwierdź</button>


