@layout('master')


@section('header')
  @include('partials.header');
  {{ HTML::style('css/locationEdit.css')}}
@endsection

@section('loginbar')
	@include('partials.loginbar')
@endsection

@section('content')
  @include('location.edit.content')
@endsection

@section('footer')
  @include('partials.footer')
@endsection