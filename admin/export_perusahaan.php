<?php
require '../vendor/autoload.php';
require '../koneksi.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$sql = "SELECT * FROM riwayat_kerja ORDER BY user_id ASC";

$result = $koneksi->query($sql);

if (!$result) {
    die("Terjadi Error: ");
}

if ($result->num_rows > 0) {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $columnIndex = 1;
    while ($field = $result->fetch_field()) {
        $sheet->setCellValueByColumnAndRow($columnIndex, 1, $field->name);
        $columnIndex++;
    }

    $rowIndex = 2;
    while ($row_data = $result->fetch_assoc()) {
        $columnIndex = 1;
        foreach ($row_data as $value) {
            $sheet->setCellValueByColumnAndRow($columnIndex, $rowIndex, $value);
            $columnIndex++;
        }
        $rowIndex++;
    }
    
    foreach (range('A',$sheet->getHighestDataColumn()) as $column) {
        $sheet->getColumnDimension($column)->setAutoSize(true);
    }
    
    $filename = 'riwayat kerja .xlsx';

    $writer = new Xlsx($spreadsheet);
    $writer->save($filename);

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Cache-Control: max-age=0');
    readfile($filename);

    unlink($filename);
} else {
    echo "Tidak ada data yang ditemukan dalam tabel.";
}

$koneksi->close();
?>
