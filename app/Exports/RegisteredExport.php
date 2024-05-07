<?php

namespace App\Exports;

use App\Models\Participant;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;

class RegisteredExport extends DefaultValueBinder implements FromCollection, WithMapping, WithHeadings, WithColumnFormatting, WithCustomValueBinder
{
    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_TEXT,
            'B' => NumberFormat::FORMAT_TEXT,
            'C' => NumberFormat::FORMAT_TEXT,
            'D' => NumberFormat::FORMAT_TEXT,
            'E' => NumberFormat::FORMAT_TEXT,
            'F' => NumberFormat::FORMAT_TEXT,
            'G' => NumberFormat::FORMAT_TEXT,
            'H' => NumberFormat::FORMAT_TEXT,
            'I' => NumberFormat::FORMAT_TEXT,
            'J' => NumberFormat::FORMAT_TEXT,
            'K' => NumberFormat::FORMAT_TEXT
        ];
    }

    public function bindValue(Cell $cell, $value)
    {
        if (is_numeric($value)) {
            $cell->setValueExplicit($value, DataType::TYPE_STRING);

            return true;
        }

        // else return default behavior
        return parent::bindValue($cell, $value);
    }

    public function collection()
    {
        return Participant::with('user')->orderBy('full_name1', 'asc')->get();
    }

    public function map($participant): array
    {
        return [
            //data yang dari kolom tabel database yang akan diambil
            $participant->user->email,
            $participant->user->email_verified_at,
            $participant->full_name1,
            $participant->full_name2,
            $participant->participant_type,
            $participant->attendance,
            $participant->institution,
            $participant->address,
            $participant->hki_id,
            $participant->hki_status,
            $participant->phone
        ];
    }

    public function headings(): array
    {
        return ['Email', 'Email Velidation', 'Full Name', 'Full Name (with academic title)', 'Participant Type','Attendance', 'Institution', 'Address', 'HKI ID', 'Status HKI Member', 'Phone'];
    }
}
