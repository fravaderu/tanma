<!-- resources/views/reports/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Edit Laporan Harian</h1>

    <form action="{{ route('reports.update', $report->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="report_date">Tanggal Laporan:</label>
        <input type="date" id="report_date" name="report_date" value="{{ $report->report_date }}" required>

        <label for="report_type">Jenis Laporan:</label>
        <select id="report_type" name="report_type" required>
            <option value="softcopy_claim" {{ $report->report_type == 'softcopy_claim' ? 'selected' : '' }}>Registrasi Klaim Softcopy</option>
            <option value="admedika_document" {{ $report->report_type == 'admedika_document' ? 'selected' : '' }}>Dokumen AdMedika</option>
            <option value="ari_transaction" {{ $report->report_type == 'ari_transaction' ? 'selected' : '' }}>Transaksi ARI</option>
            <option value="admedika_document_scan" {{ $report->report_type == 'admedika_document_scan' ? 'selected' : '' }}>Scan Dokumen AdMedika</option>
            <option value="email_follow_up" {{ $report->report_type == 'email_follow_up' ? 'selected' : '' }}>Follow Up Email</option>
            <option value="fhi_reimbursement" {{ $report->report_type == 'fhi_reimbursement' ? 'selected' : '' }}>Reimbursement FHI</option>
            <option value="direct_payment" {{ $report->report_type == 'direct_payment' ? 'selected' : '' }}>Direct Payment</option>
            <option value="ari_claim_employee" {{ $report->report_type == 'ari_claim_employee' ? 'selected' : '' }}>Klaim Karyawan ARI</option>
            <option value="document_merge" {{ $report->report_type == 'document_merge' ? 'selected' : '' }}>Merger Dokumen</option>
        </select>

        <label for="registration_date">Tanggal Registrasi:</label>
        <input type="date" name="registration_date" value="{{ $report->registration_date }}" required>

        <label for="batch_number">Nomor Batch:</label>
        <input type="text" name="batch_number" value="{{ $report->batch_number }}" required>

        <label for="claim_count">Jumlah Klaim:</label>
        <input type="number" name="claim_count" value="{{ $report->claim_count }}" required>

        <button type="submit">Simpan</button>
    </form>
@endsection