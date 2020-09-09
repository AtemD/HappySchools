@extends('layouts.admin')

@section('header')
<section class="content-header">
  <h1>
    Create
    <small>Add New School or Import from Excel File</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Schools</a></li>
    <li class="active">Create</li>
  </ol>
</section>
@endsection

@section('content')
@if ($errors->any() || session()->has('success'))
  @php
    $messages = $errors->any() ? $errors->all() : [session()->get('success')];
    $type     = $errors->any() ? 'error' : 'success';
  @endphp
  <x-alert :type="$type" :messages="$messages" />
@endif

<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Import From Excel</h3>
  </div>
  <!-- /.box-header -->
  @if (session()->has('failures'))
    @php
      $rows = [];
      $messages = ['The following rows might be inserted incorrectly for some reason, Please revise them.'];
      $failures = session()->get('failures');

      $messages[] = implode(', ', $failures);
    @endphp
    <x-alert type="info" :messages="$messages" />
  @endif
  <!-- form start -->
  <form role="form" method="POST" action="{{ route('school.import') }}" enctype="multipart/form-data">
    @csrf
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputFile">Select File</label>
        <input type="file" id="exampleInputFile" name="import" required />
      </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" class="btn btn-primary">
        <i class="ion-upload"></i>
        Upload
      </button>
      <a href="#" class="btn btn-info">
        <i class="ion-android-download mr-2"></i>
        Download Template File
      </a>
    </div>
  </form>
</div>

<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">
      {{ 'Create New' }}
      <small>Fields marked with * are required.</small>
    </h3>
  </div>
  <!-- /.box-header -->

  <x-school-form type="create" />
</div>
@endsection