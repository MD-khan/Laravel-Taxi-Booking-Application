@if(Auth::guard('passanger')->check())
{{Auth::guard('passanger')->user()->firstName}}
@endif