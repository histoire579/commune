@if (session('success'))
    <div class="alert alert-success alert-icon" role="alert">
    <i class="uil uil-check-circle"></i> <a href="" class="alert-link hover">{{session('success')}}</a>.
    
    </div>

@endif
@if (session('error'))
    <div class="alert alert-danger alert-icon" role="alert">
    <i class="uil uil-times-circle"></i>  <a href="" class="alert-link hover">{{session('error')}}</a>.
  
    </div>

@endif