@extends('layout.main')

@section('title', 'Input Transaksi')

@section('container')


@livewireStyles
<livewire:transaction.create>
<livewire:transaction.detail-create>
@livewireScripts


@endsection