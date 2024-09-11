<?php

namespace App\Exports;

use App\Http\Controllers\DashboardController;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportStatistic implements ShouldAutoSize, WithHeadings, FromArray, WithStyles
{
    protected $data;

    public function __construct()
    {
        $rawData = (object) (new DashboardController())->statistic();
        $rawData = $rawData->data;

        $vehicle_per_month = $rawData->vehicle_per_month;
        $top_vehicle = $rawData->top_vehicle;

        $top_vehicle = collect($top_vehicle)->map(function ($item) {
            return [
                'name' => $item->vehicle->name,
                'total' => $item->total,
                'month' => $item->month,
            ];
        });

        $data = collect($vehicle_per_month)->map(function ($item, $key) {
            return [
                'month' => $this->generateMonth()[$key],
                'total' => $item,
            ];
        });

        $opt = collect([
            'vehicle_per_month' => $data,
            'top_vehicle' => $top_vehicle,
        ]);

        $this->data = $opt;
    }

    private function generateMonth()
    {
        return ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    }

    public function headings(): array
    {
        return [
            [
                '',
                'Booking per Month',
                '',
                '',
                'Top Vehicle',
                '',
                '',
            ],
            [
                '',
                'Month',
                'Total',
                '',
                'Vehicle Name',
                'Month',
                'Total',
            ],
        ];
    }

    public function array(): array
    {
        $mergedData = [];
        $vehiclePerMonth = $this->data['vehicle_per_month'];
        $topVehicle = $this->data['top_vehicle'];

        $mergedData[] = [
            '',
            '',
            '',
            '',
            '',
            '',
            '',
        ];
        $mergedData[] = [
            '',
            '',
            '',
            '',
            '',
            '',
            '',
        ];

        for ($i = 0; $i < 12; $i++) {
            $vehicleMonth = isset($vehiclePerMonth[$i]) ? $vehiclePerMonth[$i] : ['month' => '', 'total' => ''];

            $topVehicleData = isset($topVehicle[$i]) ? $topVehicle[$i] : ['name' => '', 'month' => '', 'total' => ''];

            $mergedData[] = [
                '',
                $vehicleMonth['month'],
                $vehicleMonth['total'] === 0 ? '0' : $vehicleMonth['total'],
                '',
                $topVehicleData['name'],
                $topVehicleData['month'],
                $topVehicleData['total'],
            ];
        }

        return $mergedData;
    }

    public function styles(Worksheet $sheet)
    {
        $countTopVehicle = count($this->data['top_vehicle']);
        $param = 'E2:G' . ($countTopVehicle + 2);

        $sheet->mergeCells('B1:C1');
        $sheet->mergeCells('E1:G1');

        $sheet->getStyle('B1:C1')->applyFromArray([
            'font' => [
                'bold' => true,
            ],
        ]);
        $sheet->getStyle('E1:G1')->applyFromArray([
            'font' => [
                'bold' => true,
            ],
        ]);

        $sheet->getStyle('B1:C14')->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ]);
        $sheet->getStyle('E1:G' . ($countTopVehicle + 2))->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ]);

        $sheet->getStyle('B2:C2')->applyFromArray([
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => 'D9D9D9',
                ],
            ],
            'font' => [
                'bold' => true,
            ],
        ]);
        $sheet->getStyle('E2:G2')->applyFromArray([
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => 'F79646',
                ],
            ],
            'font' => [
                'bold' => true,
            ],
        ]);

        $sheet->getStyle('C3:C14')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER);
        $sheet->getStyle('G3:G' . ($countTopVehicle + 2))->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER);

        $sheet->getStyle('B2:C2')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->getStyle($param)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
    }
}
