<!-- print "<pre>";
  print_r($content);
print "</pre>"; -->
@php

  $heading = $content->heading;
  $subheading = $content->sub_heading;
  $services = $content->services;
  $button = $content->view_all_our_practice_areas;
  $extraid = $content->id;
  $extraclass = $content->extra_class;
  $hide_section = $content->hide_section;

@endphp

@if($content->hide_section == 'no')
<div class="mian-div">
    <div class="saction">
      <div class="main-data">
        <h1>{{$heading}}</h1>
        <h3>{{$subheading}}</h3>
        <div class="main-patner">
          <div class="data-about">
            @foreach ($services as $service)
                <div class="mian-image">
                  <img src="{{$service['image']['url']}}" alt="{{$partnersaction['image']['title']}}" srcset="">
                  <div class="main-heading">
                    <h3>{{$service['name']}}</h3>
                  </div>
                </div>
            @endforeach
          </div>
          <a href="{{$button['url']}}" target="{{$button['target']}}" rel="noopener noreferrer">{{$button['title']}}</a>
        </div>
      </div>
    </div>
  </div>
@else
<div class="main-hide">
</div>
@endif                    