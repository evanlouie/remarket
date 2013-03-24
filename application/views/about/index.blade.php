@layout('master')


@section('header')
  @include('partials.header')
  {{ HTML::style('css/aboutSidebar.css')}}
  {{ HTML::style('css/about.css')}}
@endsection

@section('loginbar')
	@include('partials.loginbar')
@endsection

@section('content')
  @include('about.content')
@endsection

@section('footer')
  @include('partials.footer')
@endsection