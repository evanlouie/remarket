@layout('master')


@section('header')
  @include('partials.header');
  {{ HTML::style('css/wishlist.css')}}
  {{ HTML::style('css/sidebar.css')}}
@endsection

@section('loginbar')
	@include('partials.loginbar')
@endsection

@section('content')
  @include('account.wishlist.content')
@endsection

@section('footer')
  @include('partials.footer')
@endsection