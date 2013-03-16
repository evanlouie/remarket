@layout('master')


@section('header')
  @include('partials.header');
  {{ HTML::style('css/accountDetails.css')}}
@endsection

@section('loginbar')
	@include('partials.loginbar')
@endsection

@section('content')
  @include('account.details.content')
@endsection

@section('footer')
  @include('partials.footer')
@endsection