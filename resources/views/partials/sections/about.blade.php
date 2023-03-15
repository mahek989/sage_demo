@php
  $heading = $content->heading;
  $subheading = $content->sub_heading;
  $description = $content->description;
  $button = $content->meet_our_team;
  $partner_saction = $content->partner_saction;
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
        <p>{!! $description !!}</p>
        <div class="main-patner">
          <div class="data-about">
            @foreach ($partner_saction as $partnersaction)
                <div class="mian-image">
                  <img src="{{$partnersaction['image']['url']}}" alt="{{$partnersaction['image']['title']}}" srcset="">
                  <div class="main-heading">
                    <h3>{{$partnersaction['name']}}</h3>
                    <p>{{$partnersaction['role']}}</p>
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