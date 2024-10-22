<?php

namespace App\Exports;

use App\Models\Assessment;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class AssessmentsExport implements FromCollection, WithHeadings
{
    protected $filter;

    public function __construct($filter)
    {
        $this->filter = $filter;
    }

    public function collection()
    {
        if ($this->filter == 'siswa') {
            $assessments = Assessment::whereNotNull('user_id')->with('result', 'user')->get();
        } elseif ($this->filter == 'umum') {
            $assessments = Assessment::whereNull('user_id')->with('result', 'user')->get();
        } else {
            $assessments = Assessment::with('result', 'user')->get();
        }

        return $assessments->map(function($item) {
            return [
                'Nama Peserta' => $item->name,
                'Hobi/Aktivitas' => $item->hobby,
                'Tipe Kecerdasan' => $item->result->type ?? '-',
                'Rekomendasi Ekstrakulikuler' => $item->result->recomended->pluck('organization.name')->implode(', ') ?? '-',
                'Pilihan Ekstrakulikuler' => $item->user && $item->user->organizatiionRegistration ? $item->user->organizatiionRegistration->pluck('organization.name')->implode(', ') : '-',
                'Kategori Peserta' => $item->user_id ? 'Siswa' : 'Umum',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Nama Peserta',
            'Hobi/Aktivitas',
            'Tipe Kecerdasan',
            'Rekomendasi Ekstrakulikuler',
            'Pilihan Ekstrakulikuler',
            'Kategori Peserta',
        ];
    }
}
