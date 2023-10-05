@extends('layouts.main')

@section('extra-css')
    <style>
        
    </style>
@endsection

@section('content')
<section class="wrapper bg-soft-primary">
    <div class="container pt-5 pb-6 pt-md-7 pb-md-8 text-center">
      <div class="row">
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <h2 class="display-5 mb-3">{{$page->titre}}</h2>
          <p class="lead px-xxl-3"></p>
        </div>
        <!-- /column -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<section id="terms-conditions" >
    <div class="container pt-5 pb-6 pt-md-7 pb-md-8">
        {!!$page->content!!}
    </div>
</section>
@endsection
@section('extra-js')

@endsection