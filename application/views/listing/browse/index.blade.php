@layout('master')


@section('header')
  @include('partials.header');
  {{ HTML::style('css/browseListing.css')}}
@endsection

@section('loginbar')
	@include('partials.loginbar')
@endsection

@section('content')
  @include('listing.browse.content')
@endsection

@section('footer')
  @include('partials.footer')
@endsection