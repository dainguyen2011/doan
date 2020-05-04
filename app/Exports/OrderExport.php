<?php


namespace App\Exports;

use App\OrderProduct;
use App\Orders;
use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'Số TT',
            'Tên sản phẩm',
            'Sản phẩm bán tháng',
            'Số lượng đã bán',
            'Số lượng còn lại',
            'Tổng tiền bán được'
        ];
    }

    public function collection()
    {
        $products = Product::all();
        foreach ($products as $row) {

            $product[] = array(

                '0' => $row->iteration,
                '4' => $row->product_name,
                '7' => $row->created_at,
                '12' => $row->product_qty,
                '15' => $row->total,
//                '20' => $row->orders->money
            );

        }

        return (collect($product));
    }
}
