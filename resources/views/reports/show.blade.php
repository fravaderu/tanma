<!-- resources/views/reports/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Detail Laporan Harian</h1>

    <p>Tanggal Laporan: {{ $report->report_date }}</p>
    <p>Jenis Laporan: {{ $report->report_type }}</p>
    <p>Tanggal Registrasi: {{ $report->registration_date }}</p>
    <p>Nomor Batch: {{ $report->batch_number }}</p>
    <p>Jumlah Klaim: {{ $report->claim_count }}</p>

    <a href="{{ route('reports.edit', $report->id) }}">Edit</a>

    <form action="{{ route('reports.destroy', $report->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Hapus</button>
    </form>
@endsection