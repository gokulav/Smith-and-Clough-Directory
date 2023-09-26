@extends($theme.'layouts.app')
@section('t i tle',trans('Ho
me'))

@section('content')
 

      @include($theme.'partials.heroBanner')

     <!-- categroy section -->
     @include($theme.'sections.category')

      <!--  Home Content listings -->
      @include($theme.'sections.home-content')

     <!-- popular listings -->

     @include($theme.'sections.listing')



     <!-- t e stimonial section -->
     @include($theme.'sections.testimonial')

     <!-- b l og section -->

     @include($theme.'sections.blog')

     <!-- n e wsletter -->

     @include($theme.'sections.news-letter')

@endsection  

