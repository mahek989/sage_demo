@if($xfiveContent)
	@foreach($xfiveContent as $content)

	@if($content->layout == 'banner')
		@include('partials.sections.banner')

	@elseif($content->layout == 'about')
		@include('partials.sections.about')

	@elseif($content->layout == 'contact_info')
		@include('partials.sections.contact_info')

	@elseif($content->layout == 'meet_our_team')
		@include('partials.sections.meet_our_team')

	@elseif($content->layout == 'our_practice_area')
		@include('partials.sections.our_practice_area')

	@elseif($content->layout == 'testimonial')
		@include('partials.sections.testimonial')

	@elseif($content->layout == 'services')
		@include('partials.sections.services')

	@endif

	@endforeach

@endif

