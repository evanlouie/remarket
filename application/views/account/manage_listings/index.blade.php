@layout('master')


@section('header')
  @include('partials.header')
  {{ HTML::style('css/manageListings.css')}}
  {{ HTML::style('css/sidebar.css')}}
@endsection

@section('loginbar')
	@include('partials.loginbar')
@endsection

@section('content')
  @include('account.manage_listings.content')
@endsection

@section('footer')
  @include('partials.footer')
@endsection