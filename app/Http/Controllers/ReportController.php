<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all();
        return view('reports.index', compact('reports'));
    }

    public function create()
    {
        return view('reports.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'report_date' => 'required|date',
            'report_type' => 'required|string',
            'tasks.*.registration_date' => 'required|date',
            'tasks.*.batch_number' => 'required|string',
            'tasks.*.claim_count' => 'required|integer',
        ]);

        foreach ($validatedData['tasks'] as $task) {
            Report::create([
                'report_date' => $validatedData['report_date'],
                'report_type' => $validatedData['report_type'],
                'registration_date' => $task['registration_date'],
                'batch_number' => $task['batch_number'],
                'claim_count' => $task['claim_count'],
            ]);
        }

        return redirect()->route('reports.index')->with('success', 'Laporan berhasil ditambahkan!');
    }

    public function show(Report $report)
    {
        return view('reports.show', compact('report'));
    }

    public function edit(Report $report)
    {
        return view('reports.edit', compact('report'));
    }

    public function update(Request $request, Report $report)
    {
        $validatedData = $request->validate([
            'report_date' => 'required|date',
            'report_type' => 'required|string',
            'registration_date' => 'required|date',
            'batch_number' => 'required|string',
            'claim_count' => 'required|integer',
        ]);

        $report->update($validatedData);
        return redirect()->route('reports.index')->with('success', 'Laporan berhasil diperbarui!');
    }

    public function destroy(Report $report)
    {
        $report->delete();
        return redirect()->route('reports.index')->with('success', 'Laporan berhasil dihapus!');
    }
}
