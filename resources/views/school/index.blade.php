@extends('layouts.admin')

@section('additional-styles')
<livewire:styles />
@endsection

@section('additional-scripts')
<livewire:scripts />
@endsection

@section('header')
<section class="content-header">
  <h1>
    Schools
    <small>All Schools Information</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Schools</a></li>
    <li class="active">Index</li>
  </ol>
</section>
@endsection

@section('content')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">
      {{ 'List of Registered Schools Information' }}
    </h3>
  </div>
  <!-- /.box-header -->

  <livewire:school.index />
</div>
@endsection