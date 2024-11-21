@extends('layouts.app')

@section('content')
    <h1>Laporan Harian</h1>

    <table>
        <thead>
            <tr>
                <th>Tanggal Laporan</th>
                <th>Jenis Laporan</th>
                <th>Tanggal Registrasi</th>
                <th>Nomor Batch</th>
                <th>Jumlah Klaim</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $report)
            <tr>
                <td>{{ $report->report_date }}</td>
                <td>{{ $report->report_type }}</td>
                <td>{{ $report->registration_date }}</td>
                <td>{{ $report->batch_number }}</td>
                <td>{{ $report->claim_count }}</td>
                <td>
                    <a href="{{ route('reports.show', $report->id) }}">Lihat</a>
                    <a href="{{ route('reports.edit', $report->id) }}">Edit</a>
                    <form action="{{ route('reports.destroy', $report->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('reports.create') }}">Tambah Laporan Baru</a>
@endsection