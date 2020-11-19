<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
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
        $reader->setReadDataOnly(true);
        $sheet = $reader->load($inputFileName)->setActiveSheetIndexByName('customer');

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Customer::truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        foreach ($sheet->getRowIterator() as $rowkey => $row) {
            if($rowkey == 1){
                continue;
            }

            $customer = new Customer;
            $customer->name = $sheet->getCell('B'.$row->getRowIndex())->getValue();
            $customer->age = $sheet->getCell('C'.$row->getRowIndex())->getValue();
            $customer->save();

        }
    }
}
