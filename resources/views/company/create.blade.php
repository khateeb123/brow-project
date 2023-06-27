@extends('MyLayouts.master')



@section('title')
<h1 class="m-0">
  {{ __('create Company') }}
</h1>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#"> {{ __('Company') }}</a></li>
<li class="breadcrumb-item"><a href="#"> {{ __('create') }}</a></li>

@endsection
@section('content')

<div class="row">
  <div class="col-6">
    <form method="post" action="{{ route('companies.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="card-body">

        <div class="form-group">
          <label for="name">{{__('Name')}}</label>
          <input type="text" name="name" class="form-control @error('name') is-invalid  @enderror" id="name" placeholder="Enter company name" value="{{ old('name') }}">
          @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="form-group">
          <label for="email">{{__('Email')}}</label>
          <input type="email" class="form-control @error('email') is-invalid  @enderror" id="email" name="email" placeholder="Enter company email" value="{{ old('email') }}">
          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="form-group">
          <label for="website">{{__('Website')}}</label>
          <input type="text" class="form-control  @error('website') is-invalid  @enderror" name="website" id="website" placeholder="Enter company website" value="{{ old('website') }}">
          @error('website')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="form-group">
          <label for="logo">File input</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" name="logo" class="custom-file-input @error('logo') is-invalid  @enderror" id="logo">
              <label class="custom-file-label" for="logo">Choose file</label>
            </div>
            <div class="input-group-append">
              <span class="input-group-text">Upload</span>
            </div>
          </div>
          @error('logo')
          <span class="text-danger" role="alert">
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