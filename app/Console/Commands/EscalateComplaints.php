<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Models\Complaint;
use Carbon\Carbon;

class EscalateComplaints extends Command
{
    protected $signature = 'complaints:escalate';
    protected $description = 'Auto-escalate pending complaints older than 72 hours to HOD';

    public function handle()
    {
        $threshold = Carbon::now()->subHours(72);
        
        $count = Complaint::where('status', 'pending')
            ->where('created_at', '<', $threshold)
            ->update(['status' => 'escalated', 'remarks' => 'Auto-escalated after 72h - No action by Coordinator']);

        $this->info("{$count} complaints escalated after 72h!");
        return 0;
    }
}