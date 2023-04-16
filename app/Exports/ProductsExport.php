<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::select(

            'name',
            'supplier_id',
            'category_id',
            'product_code',
            'product_garage',
            'product_route',
            'photo',
            'description',
            'buy_date',
            'expire_date',
            'buying_price',
            'selling_price',
        )->get();
    }


}
