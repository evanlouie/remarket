@layout('master')


@section('header')
  @include('partials.header')
  {{ HTML::style('css/listingSearch.css')}}
 
@endsection

@section('loginbar')
	@include('partials.loginbar')
@endsection

@section('content')
  @include('listing.search.content')
@endsection

@section('footer')
  @include('partials.footer')
@endsection