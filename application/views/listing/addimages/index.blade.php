@layout('master')


@section('header')
  @include('partials.header')
  {{ HTML::style('css/listingCreate.css')}}
@endsection

@section('loginbar')
	@include('partials.loginbar')
@endsection

@section('content')
  @include('listing.addimages.content')
@endsection

@section('footer')
  @include('partials.footer')
@endsection