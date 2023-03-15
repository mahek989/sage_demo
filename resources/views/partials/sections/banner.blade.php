<!-- fileds -->
@php

  $layout = $content->select_style;
  $background_image = $content->image;
  $heading = $content->heading;
  $sub_heading = $content->sub_heading;
  $details = $content->discripction;
  $button1 = $content->button_1;
  $button2 = $content->button_2;
  $extraid = $content->id;
  $extraclass = $content->extra_class;
  $hide_section = $content->hide_section;

@endphp

<!-- Banner Style 1 -->
<br>
@if($content->hide_section == 'no')
@if($layout == 'style_one')
<div class="main-style">
    <spna>
      <h3>style One</h3>
    </spna>
    <div class="main-heading">
      <img src="{{$background_image['url']}}" alt="{{$background_image['title']}}" srcset="">
      <h1>{{$heading}}</h1>
      <h3>{{$sub_heading}}</h3>
      <p>{{strip_tags($details)}}</p>
    </div>
    <div id="{{$extraid}}">
      <h1>extraid</h1>
    </div>
    <div id="{{$extraclass}}">
      <h1>extra class</h1>
    </div>
  </div>
@endif
@else
<div class="main-hide">
  <p class="hidw"></p>
</div>
@endif
<br>
<!-- Banner Style 2 -->
@if($content->hide_section == 'no')
@if($layout == 'style_two')
<div class="main-style">
    <spna>
      <h3>style two</h3>
    </spna>
    <div class="main-heading">
      <img src="{{$background_image['url']}}" alt="{{$background_image['title']}}" srcset="">
      <h1>{{$heading}}</h1>
      <h3>{{$sub_heading}}</h3>
      <p>{!! $details !!}</p>
      <a href="{{$button1['url']}}" target="{{$button1['target']}}" rel="noopener noreferrer"> Button 1 </a>
    </div>
    <div id="{{$extraid}}">
      <h1>extraid</h1>
    </div>
    <div id="{{$extraclass}}">
      <h1>extra class</h1>
    </div>
  </div>
@endif
@else
<div class="main-hide">
  <p class="hidw"></p>
</div>
@endif
<br>

<!-- Banner Style 3 -->
@if($content->hide_section == 'no')
@if($layout == 'style_three')
  <div class="main-style">
    <spna>
      <h3>style_three</h3>
    </spna>
    <div class="main-heading">
      <img src="{{$background_image['url']}}" alt="{{$background_image['title']}}" srcset="">
      <h1>{{$heading}}</h1>
      <h3>{{$sub_heading}}</h3>
      <p>{!! $details !!}</p>
      <a href="{{$button1['url']}}" target="{{$button1['target']}}" rel="noopener noreferrer"> Button 1 </a>
      <a href="{{$button2['url']}}" target="{{$button2['target']}}" rel="noopener noreferrer"> Button 2 </a>
    </div>
    <div id="{{$extraid}}">
      <h1>extraid</h1>
    </div>
    <div id="{{$extraclass}}">
      <h1>extra class</h1>
    </div>
  </div>
@endif
@else
<div class="main-hide">
  <p class="hidw"></p>
</div>
@endif
<br>
<!-- <br>
@php
print "<pre>";
  print_r($content);
  print "</pre>";
@endphp
</br> -->

