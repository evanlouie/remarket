@layout('master')


@section('header')
  @include('partials.header')
  {{ HTML::style('css/home.css')}}
@endsection

@section('loginbar')
	@include('partials.loginbar')
@endsection

@section('content')
  @include('home.content')
@endsection

@section('footer')
  @include('partials.footer')
@endsection