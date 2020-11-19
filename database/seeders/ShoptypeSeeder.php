<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shoptype;

class ShoptypeSeeder extends Seeder
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
        $sheet = $reader->load($inputFileName)->setActiveSheetIndexByName('order');

        $typesArray = [];

        foreach ($sheet->getRowIterator() as $rowkey => $row) {
            if($rowkey == 1){
                continue;
            }
            array_push($typesArray,$sheet->getCell('F'.$row->getRowIndex())->getValue());

            // dump( 'row key ' . $rowkey);
            // dump( 'row index ' . $row->getRowIndex());
            // dump( 'shop type ' . );
            // $cellIterator = $row->getCellIterator() ;
            // $cellIterator->setIterateOnlyExistingCells(FALSE);
            // foreach ( $cellIterator as $cellkey => $cell) {
            //     dump($cell->getValue());
            // }
        }
        $typesArrayDistinct = array_unique($typesArray);
        
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Shoptype::truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        foreach ($typesArrayDistinct as $type) {
            $shoptype = new Shoptype;
            $shoptype->type = $type;
            $shoptype->save();
        }


    }
}
