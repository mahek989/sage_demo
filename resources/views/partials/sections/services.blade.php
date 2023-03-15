@php

  $services_detials = $content->services_detials;
  $button1 = $content->button_1;
  $button2 = $content->button_2;
  $extraid = $content->id;
  $extraclass = $content->extra_class;
  $hide_section = $content->hide_section;
@endphp

@if($content->hide_section == 'no')
  <div class="mian-div">
      <div class="saction">
          <div class="main-data">
            <h1>{{$heading}}</h1>
            <div class="main-patner">
              <div class="data-about">
                @foreach ($services_detials as $services_detials)
                  @if($loop->iteration % 2 == 0)
                        <div class="main-data">
                          <div class="data-services">
                            <img src="{{$services_detials['image']['url']}}" alt="{{$services_detials['image']['title']}}" srcset="">
                            <h1>{{$services_detials['title']}}</h1>
                            <p>{!! $services_detials['description'] !!}</p>
                          </div>
                        </div>
                  @else
                  <div class="main-data">
                      <div class="data-services">
                        <h1>{{$services_detials['title']}}</h1>
                        <p>{!! $services_detials['description'] !!}</p>
                        <img src="{{$services_detials['image']['url']}}" alt="{{$services_detials['image']['title']}}" srcset="">
                      </div>
                  </div>
                 @endif
                @endforeach
              </div> 
              <div class="button">
                <a href="{{$button1['url']}}" target="{{$button1['target']}}" rel="noopener noreferrer">{{$button1['title']}}</a>
                <a href="{{$button2['url']}}" target="{{$button2['target']}}" rel="noopener noreferrer">{{$button2['title']}}</a>
              </div>
            </div>
          </div>
        </div>
      </div>
@else
  <div class="main-data">
  </div>
@endif