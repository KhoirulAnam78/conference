<?php

namespace App\Exports;

use App\Models\UploadAbstract;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;

class AbstractExport extends DefaultValueBinder implements FromCollection, WithMapping, WithHeadings, WithColumnFormatting, WithCustomValueBinder
{
    public $status;
    
    public function __construct($status){
        $this->status = $status;
    }
    
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
        return UploadAbstract::where('status', 'like', '%' . $this->status)->with('participant','topicScope')->orderBy('title')->get();
    }

    public function map($abstract): array
    {
        return [
            //data yang dari kolom tabel database yang akan diambil
            $abstract->participant->full_name1,
            $abstract->participant->user->email,
            $abstract->title,
            $abstract->topicScope->scope_name,
            $abstract->authors,
            $abstract->keywords,
            $abstract->created_at,
            $abstract->status
        ];
    }

    public function headings(): array
    {
        return ['Full Name', 'Email', 'Abstract Title', 'Topic','Authors','Keywords','Submitted At','Status'];
    }
}