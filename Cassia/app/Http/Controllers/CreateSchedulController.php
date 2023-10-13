<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Carbon;

class CreateSchedulController extends Controller
{
    /**
     * Create dynamic table along with dynamic fields
     *
     * @param       $table_name
     * @param array $fields
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function createTable($table_name, $fields = [])
    {
        // check if table is not already exists
        if (!Schema::hasTable($table_name)) {
            Schema::create($table_name, function (Blueprint $table) use ($fields, $table_name) {
                $table->increments('id');
                if (count($fields) > 0) {
                    foreach ($fields as $field) {
                        $table->{$field['type']}($field['name']);
                    }
                }
                $table->timestamps();
            });

            return response()->json(['message' => 'Given table has been successfully created!'], 200);
        }

        return response()->json(['message' => 'Given table is already existis.'], 400);
    }

    public function operate()
    {
        $payDate = now();
        //$monthYear = Carbon::createFromFormat('d/m/Y', $payDate)->format('FY');
        $monthYear = date('FY');
       // Use small y for 2 digit year
        $tableName = "Schedule".$monthYear;

        // set dynamic table name according to your requirements

        $table_name = $tableName;

        // set your dynamic fields (you can fetch this data from database this is just an example)
        $fields = [
            ['name' => 'staff_id', 'type' => 'string'],
            ['name' => 'rk_id', 'type' => 'string'],
            ['name' => 'basic',8,2, 'type' => 'decimal'],
            ['name' => 'rent',8,2, 'type' => 'decimal'],
            ['name' => 'enter',8,2, 'type' => 'decimal'],
            ['name' => 'util',8,2, 'type' => 'decimal'],
            ['name' => 'meal',8,2, 'type' => 'decimal'],
            ['name' => 'o_time',8,2, 'type' => 'decimal'],
            ['name' => 'dom',8,2, 'type' => 'decimal'],
            ['name' => 'conjus',8,2, 'type' => 'decimal'],
            ['name' => 'other_allow',8,2, 'type' => 'decimal'],
            ['name' => 'gross_pay',8,2, 'type' => 'decimal'],
            ['name' => 'tot_ded',8,2, 'type' => 'decimal'],
            ['name' => 'net_pay',8,2, 'type' => 'decimal']
        ];

        return $this->createTable($table_name, $fields);
    }

    /**
     * To delete the tabel from the database 
     * 
     * @param $table_name
     *
     * @return bool
     */
    public function removeTable($table_name)
    {
        Schema::dropIfExists($table_name); 
        
        return true;
    }
}
