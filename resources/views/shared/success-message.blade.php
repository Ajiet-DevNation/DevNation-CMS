@if (session()->has('success'))
    
<div class="alert alert-success alert-dismissible fade show" id="session-message" style="margin:0; text-align:center;" role="alert">
    {{session('success')}}
</div>
@endif

@if (session()->has('error'))
    
<div class="alert alert-danger alert-dismissible fade show" id="session-message" style="margin:0;text-align:center;" role="alert">
    {{session('error')}}
</div>
@endif
