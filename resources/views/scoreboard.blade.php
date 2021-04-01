<div id="myCarousel" class="carousel" data-interval="false">
    <div class="carousel-inner">
        @foreach($scoreboards as $leaugeName =>$scoreboard)
            <div class="carousel-item {{$loop->index == 0 ? 'active':''}}">
                <div class="scoreboard ">
                    <table class="table table-bordered">
                        <thead class="bg-dark text-white">
                        <th colspan="3">
                            <div class="d-flex justify-content-between">
                                <a href="#myCarousel" data-slide="prev">
                                            <span style="color:#fff">
                                               <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    fill="currentColor" class="bi bi-arrow-bar-left"
                                                    viewBox="0 0 18 18">
                                                    <path fill-rule="evenodd"
                                                          d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5zM10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5z"/>
                                            </svg>
                                            </span>
                                </a>
                                {{$leaugeName}}
                                <a href="#myCarousel" data-slide="next">
                                            <span style="color:#fff;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                     fill="currentColor" class="bi bi-arrow-bar-right"
                                                     viewBox="0 0 18 18"><path fill-rule="evenodd"
                                                                               d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5z"/>
                                            </svg> </span>
                                </a>
                            </div>
                        </th>
                        <th>M</th>
                        <th>W</th>
                        <th>S</th>
                        <th>P</th>
                        </tr>
                        </thead>
                        <tbody class="{{request()->path()=='admin'? 'text-white':''}}">
                        @foreach ($scoreboard as $team => $data)
                            <tr>
                                <th class="scoreboard-small-cell">{{$loop->index+1}}</th>
                                <th colspan="2">{{$team}}</th>
                                <th class="scoreboard-small-cell">{{$data['matches']}}</th>
                                <th class="scoreboard-small-cell">{{$data['wins']}}</th>
                                <th class="scoreboard-medium-cell">{{$data['sw']}}:{{$data['sl']}}</th>
                                <th class="scoreboard-small-cell">{{$data['pts']}}</th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>
</div>
