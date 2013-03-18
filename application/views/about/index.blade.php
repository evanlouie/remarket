@layout('master')


@section('header')
  @include('partials.header');
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