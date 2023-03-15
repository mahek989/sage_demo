<!-- print "<pre>";
  print_r($content);
print "</pre>"; -->

@php

$meet_our_team = $content->meet_our_team;

@endphp


@if($content->hide_section == 'no')
  <div class="mian-div">
      <div class="saction">
          <div class="main-data">
            <div class="main-patner">
              <div class="data-about">
                @foreach ($meet_our_team as $meet_our_team)
                  @if($loop->iteration % 2 == 0)
                        <div class="main-data">
                          <div class="data-services">
                            <img src="{{$meet_our_team['image']['url']}}" alt="{{$meet_our_team['image']['title']}}" srcset="">
                            <h1>{{$meet_our_team['heading']}}</h1>
                            <p>{!! $meet_our_team['sub_hading'] !!}</p>
                            <p>{!! $meet_our_team['description'] !!}</p>
                            <p>{!! $meet_our_team['short_description'] !!}</p>
                          </div>
                        </div>
                  @else
                  <div class="main-data">
                          <div class="data-services">
                            <h1>{{$meet_our_team['heading']}}</h1>
                            <p>{!! $meet_our_team['sub_hading'] !!}</p>
                            <p>{!! $meet_our_team['description'] !!}</p>
                            <p>{!! $meet_our_team['short_description'] !!}</p>
                            <img src="{{$meet_our_team['image']['url']}}" alt="{{$meet_our_team['image']['title']}}" srcset="">
                          </div>
                        </div>
                 @endif
                @endforeach
              </div> 
            </div>
          </div>
        </div>
      </div>
@else
  <div class="main-data">
  </div>
@endif