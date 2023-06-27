@extends('layout.master')



@section('title')
<h1 class="m-0">
  {{ __('Edit Employee') }}
</h1>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#"> {{ __('Employee') }}</a></li>
<li class="breadcrumb-item"><a href="#"> {{ __('Edit') }}</a></li>

@endsection
@section('content')
<div class="row justify-content-center">
  <h3>
    <a href="{{route('companies.employees.index',$company->id)}}" class="badge badge-dark text-center"> company: {{ $company->name }}</a>
    <img src="{{ Storage::disk('company')->url($company->logo) }}" class="rounded-circle mr-2" alt="Company Image" width="30" height="30">

  </h3>
</div>

<div class="row">
  <div class="col-6">
    <form method="post" action="{{ route('companies.employees.update',[$company->id, $employee->id]) }}" enctype="multipart/form-data">
      @csrf
      <div class="card-body">

        <div class="form-group">
          <label for="first_name">{{__('First Name')}}</label>
          <input type="text" name="first_name" class="form-control  @error('first_name') is-invalid  @enderror" id="first_name" value="{{ $employee->first_name}}">
          @error('first_name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="form-group">
          <label for="last_name">{{__('Last Name')}}</label>
          <input type="text" name="last_name" class="form-control  @error('last_name') is-invalid  @enderror" id="last_name" value="{{ $employee->last_name }}">
          @error('last_name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="form-group">
          <label for="phone">{{__('Contact number')}}</label>
          <input type="text" name="phone" class="form-control @error('phone') is-invalid  @enderror" id="phone" value="{{ $employee->phone }}">
          @error('phone')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="form-group">
          <label for="email">{{__('Email')}}</label>
          <input type="email" class="form-control  @error('email') is-invalid  @enderror" id="email" name="email" value="$employee->email">
          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
  </div>


</div>
@endsection

@section('scripts')
<script src="{{ asset('theme/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script>
  $(function() {
    bsCustomFileInput.init();
  });
</script>
@endsection