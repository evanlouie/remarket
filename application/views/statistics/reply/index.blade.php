@layout('master')


@section('header')
  @include('partials.header')
  {{ HTML::style('css/about.css')}}
@endsection

@section('loginbar')
	@include('partials.loginbar')
@endsection

@section('content')
  @include('statistics.reply.content')
@endsection

@section('footer')
  @include('partials.footer')
@endsection