<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shoptype;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inputFileName = './database/seeders/Database.xlsx';
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        // $reader->setReadDataOnly(true);
        $sheet = $reader->load($inputFileName)->setActiveSheetIndexByName('order');

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Order::truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        foreach ($sheet->getRowIterator() as $rowkey => $row) {
            if($rowkey == 1){
                continue;
            }
            $excelTimestamp = $sheet->getCell('C'.$row->getRowIndex())->getValue() + $sheet->getCell('D'.$row->getRowIndex())->getValue();
            $timestamp = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($excelTimestamp);

            $shoptype = Shoptype::where('type',$sheet->getCell('F'.$row->getRowIndex())->getValue())->first();

            $order = new Order;
            $order->time = date('Y-m-d H:i:s',$timestamp);
            $order->amount = $sheet->getCell('E'.$row->getRowIndex())->getValue();
            $order->customer_id = $sheet->getCell('B'.$row->getRowIndex())->getValue();
            $order->shoptype_id = $shoptype->id;
            $order->save();

        }

    }
}
