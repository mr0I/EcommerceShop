@extends('site.layout.master')

@section('title')
  {{ __('Mail Test') }}
@endsection


@section('content')
  @if(session()->has('message'))
    <div class="alert alert-success my-5 text-center">
      {{ session()->get('message') }}
    </div>
  @endif
  @if (session('error'))
    <div class="alert alert-danger my-5 text-center">{{ 'خطا در ارسال!!!' }}</div>
  @endif
  <div class="container my-5">

    <form class="theme-form" action="{{ url('sendTestMail') }}" method="post">
      @csrf
      <input type="email" class="form-control" placeholder="target email..." name="target_mail">
      <button type="submit" class="btn btn-info">Send</button>
    </form>
  </div>
@endsection
