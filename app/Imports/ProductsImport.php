<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $validator = Validator::make($row, [
            'name' => 'required',
            'supplier_id' => 'required',
            'category_id' => 'required',
            'product_code' => 'required',
            'product_garage' => 'required',
            'product_route' => 'required',
            'photo' => 'required',
            'description' => 'required',
            'buy_date' => 'required',
            'expire_date' => 'required',
            'buying_price' => 'required',
            'selling_price' => 'required',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $product = new Product([
            'name' => $row[0],
            'supplier_id' => $row[1],
            'category_id' => $row[2],
            'product_code' => $row[3],
            'product_garage' => $row[4],
            'product_route' => $row[5],
            'photo' => $row[6],
            'description' => $row[7],
            'buy_date' => $row[8],
            'expire_date' => $row[9],
            'buying_price' => $row[10],
            'selling_price' => $row[11],
        ]);
    }

}
