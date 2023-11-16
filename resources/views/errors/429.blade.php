@extends('errors::prophysioError')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('message', __('Too many attempts, please wait a minute to try again.'))

