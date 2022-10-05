<?php

namespace App\Exports;

use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class AttExport implements FromView
{
    use Exportable;

    public function __construct(String $start, String $end)
    {
        $this->start = Carbon::parse($start);
        $this->end = Carbon::parse($end);
    }

    public function view(): View
    {
        $user = User::all();
        $dateTo = $this->start->diffInDays($this->end);
        $dataChart = [];
        foreach ($user as $user) {
            for ($i = 0; $i <= $dateTo; $i++) {
                $datefix = Carbon::parse($this->end)->subDays($i);
                $chart[$i] = Attendance::whereDate('created_at', $datefix)->where('user_id', $user->id)
                    ->select('user_id', 'id', 'created_at')->with('userId')->get();
                $label[$i] = $datefix->format('d M');
            }
            $dataChart[] = array("label" => $user->name, "data" => $chart);
        }
        return view('exports.att', [
            'charts' => $dataChart,
            'labels' => $label,
        ]);
    }
}
