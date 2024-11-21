<!-- resources/views/reports/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Tambah Laporan Harian</h1>

    <form action="{{ route('reports.store') }}" method="POST">
        @csrf

        <label for="report_date">Tanggal Laporan:</label>
        <input type="date" id="report_date" name="report_date" required>

        <label for="report_type">Jenis Laporan:</label>
        <select id="report_type" name="report_type" required>
            <option value="">Pilih Jenis Laporan</option>
            <option value="softcopy_claim">Registrasi Klaim Softcopy</option>
            <option value="admedika_document">Dokumen AdMedika</option>
            <option value="ari_transaction">Transaksi ARI</option>
            <option value="admedika_document_scan">Scan Dokumen AdMedika</option>
            <option value="email_follow_up">Follow Up Email</option>
            <option value="fhi_reimbursement">Reimbursement FHI</option>
            <option value="direct_payment">Direct Payment</option>
            <option value="ari_claim_employee">Klaim Karyawan ARI</option>
            <option value="document_merge">Merger Dokumen</option>
        </select>

        <div id="task-container">
            <h3>Input Tugas</h3>
            <div class="task-input">
                <label for="registration_date">Tanggal Registrasi:</label>
                <input type="date" name="tasks[0][registration_date]" required>

                <label for="batch_number">Nomor Batch:</label>
                <input type="text" name="tasks[0][batch_number]" required>

                <label for="claim_count">Jumlah Klaim:</label>
                <input type="number" name="tasks[0][claim_count]" required>
            </div>
        </div>

        <button type="button" id="add-task">Tambah Tugas</button>
        <button type="submit">Simpan</button>
    </form>

    <script>
        let taskIndex = 1;

        document.getElementById('add-task').addEventListener('click', function() {
            const container = document.getElementById('task-container');
            const newTask = document.createElement('div');
            newTask.classList.add('task-input');
            newTask.innerHTML = `
                <label for="registration_date">Tanggal Registrasi:</label>
                <input type="date" name="tasks[${taskIndex}][registration_date]" required>

                <label for="batch_number">Nomor Batch:</label>
                <input type="text" name="tasks[${taskIndex}][batch_number]" required>

                <label for="claim_count">Jumlah Klaim:</label>
                <input type="number" name="tasks[${taskIndex}][claim_count]" required>
            `;
            container.appendChild(newTask);
            taskIndex++;
        });
    </script>
@endsection