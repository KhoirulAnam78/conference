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

class PaidParticipantExport extends DefaultValueBinder implements FromCollection, WithMapping, WithHeadings, WithColumnFormatting, WithCustomValueBinder
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
            'K' => NumberFormat::FORMAT_TEXT,
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
        return Participant::join('participant_type as b','b.id','participants.participant_type')
        ->join('payments as c','participants.id','c.participant_id')
        ->where('c.validation','valid')
        ->where('b.type','Participant ')
        ->get();
    }

    public function map($participant): array
    {
        return [
            //data yang dari kolom tabel database yang akan diambil
            $participant->user->email,
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
        return ['Email', 'Full Name', 'Participant Type','Attendance', 'Institution', 'Address', 'Phone'];
    }
}