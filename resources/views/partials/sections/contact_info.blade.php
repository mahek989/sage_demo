<!-- print "<pre>";
  print_r($content);
print "</pre>"; -->
@php

  $heading = $content->heading;
  $select_layout = $content->select_layout;
  $background_image = $content->background_image;
  $contact_info = $content->contact_info;
  $week__hours = $content->week__hours;
  $button = $content->book_online;
  $extraid = $content->id;
  $extraclass = $content->extra_class;
  $hide_section = $content->hide_section;

@endphp

@if($select_layout == 'layout_one')
  @if($content->hide_section == 'no')
  <div class="mian-div">
      <div class="saction">
        <div class="main-data">
          <h1>{{$heading}}</h1>
          <h3>{{$subheading}}</h3>
          <div class="main-patner">
            <div class="data-about">
              @foreach ($contact_info as $contactinfo)
                  <div class="mian-image">
                    <img src="{{$contactinfo['icon']['url']}}" alt="{{$contactinfo['icon']['title']}}" srcset="">
                    <div class="main-heading">
                      <p>{!! $contactinfo['information'] !!}</p>
                    </div>
                  </div>
              @endforeach
            </div> 
            <div class="mail-hours">
              <br>
              <p>{{$week__hours}}</p>
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
@endif


@if($select_layout == 'layout_two')
  @if($content->hide_section == 'no')
  <div class="mian-div">
      <div class="saction">
        <div class="main-data">
          <img src="{{$background_image['url']}}" alt="{{$background_image['title']}}" srcset="">
          <h1>{{$heading}}</h1>
          <h3>{{$subheading}}</h3>
          <div class="main-patner">
            <div class="data-about">
              @foreach ($contact_info as $contactinfo)
                  <div class="mian-image">
                    <img src="{{$contactinfo['icon']['url']}}" alt="{{$contactinfo['icon']['title']}}" srcset="">
                    <div class="main-heading">
                      <p>{!! $contactinfo['information'] !!}</p>
                    </div>
                  </div>
              @endforeach
            </div> 
            <div class="mail-hours">
              <br>
              <p>{{$week__hours}}</p>
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
@endif