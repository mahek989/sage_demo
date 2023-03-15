<!-- print "<pre>";
    print_r($content);
    print "</pre>"; -->
@php
  $testimonialheading = $content->heading;
  $testimonialsubheading = $content->sub_heading;
  $testimonialbackimage = $content->background_image;
  $testimonialhideshow = $content->hide_testimonial;
  $testimonialpostdata = $content->testimonial_data;
  $extraid = $content->id;
  $extraclass = $content->extra_class;
  $hide_section = $content->hide_section;
  $hide_testimonial = $content->hide_testimonial;
@endphp

@if($hide_testimonial == 'no')
  <div class="mian-div">
      <div class="saction">
          <div class="main-data">
            <div class="main-back">
                <img src="{{$testimonialbackimage['url']}}" alt="{{$testimonialbackimage['title']}}" srcset="">
            </div>
            <div class="main-patner">
                <div class="headings">
                    <h1>{{$testimonialheading}}</h1>
                    <span>
                        <h4>{{$testimonialsubheading}}</h4>
                    </span>
                </div>
              <div class="data-about">
                @foreach ($testimonialpostdata as $postdata)
                @if($postdata['hide_saction'] == 'no')
                <div class="mian">
                    <img src="{{$postdata['theme_image']}}" alt="" srcset="">
                    <h1>{{$postdata['title']}}</h1>
                    <p>Rating: {{$postdata['rating']}}<p>
                    <p>{!! $postdata['content'] !!}</p>
                    <spna>
                    <iframe width="420" height="315"
                             src="{{$postdata['video']}}">
                    </iframe>
                    </spna>
                </div>
                @else
                <div class="main-data">
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