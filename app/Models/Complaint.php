<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'complaint_code',
        'user_id',
        'category',
        'sub_category',
        'description',
        'file_path',
        'is_anonymous',
        'status',
        'assigned_to',
        'escalated_at'
    ];

    protected $casts = [
        'is_anonymous' => 'boolean',
        'escalated_at' => 'datetime',
    ];

    // Auto-generate FCMS-2026-001 ID
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($complaint) {
            $year = date('Y');
            $lastComplaint = self::whereYear('created_at', $year)->latest()->first();
            $number = $lastComplaint ? intval(substr($lastComplaint->complaint_code, -4)) + 1 : 1;
            $complaint->complaint_code = 'FCMS-' . $year . '-' . str_pad($number, 4, '0', STR_PAD_LEFT);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function coordinator()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}