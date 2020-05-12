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
            'Ngày bán',
            'Số lượng đã bán',
            'Số lượng còn lại',
            'Tổng tiền bán được'
        ];
    }

    public function collection()
    {
        $products = Product::all();
        foreach ($products as $row) {
            $total_price = 0;
            foreach ($row->order_product as $item) {
                if ($item->orders->status == 'completed') {
                    $total_price += $item->product_price * $item->product_qty;
                }
            }
            $product[] = array(

                '0' => $row->iteration,
                '1' => $row->product_name,
                '2' => $row->created_at,
                '3' => $row->pay,
                '4' => $row->quantity,
                '5' => number_format($total_price) . 'vnđ'
            );

        }

        return (collect($product));
    }
}
