@if(Auth::user()->role=='admin')
 @include('vente.admin')
@else
@include('vente.user')

@endif
