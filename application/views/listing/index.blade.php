@layout('master')


@section('header')
  @include('partials.header')
  {{ HTML::style('css/listing.css')}}
@endsection

@section('loginbar')
	@include('partials.loginbar')
@endsection

@section('content')
  @include('listing.content')
@endsection

@section('footer')
  @include('partials.footer')
@endsection