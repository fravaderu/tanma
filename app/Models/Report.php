<?php
// app/Models/Report.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'report_date',
        'report_type',
        'registration_date',
        'batch_number',
        'claim_count',
    ];
}