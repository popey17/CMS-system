<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Customer;
use App\Models\Product;
use App\Models\User;
use App\Models\Store;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::where('deleted', false)->orderBy('sale_id', 'DESC')->paginate(12);

        return view('sale.index')->with('sales', $sales);
    }

    public function fetch_data(Request $request)
    {
        if($request->ajax())
        {
            $sales = Sale::where('deleted', false)->orderBy('sale_id', 'DESC')->paginate(12);
            return view('_components.sale.list', compact('sales'))->render();
        }
    }

    public function sort(Request $request)
    {
        if ($request->ajax()) {
            $sort = $request->get('sort');
            $order = $request->get('order');
            $sales = Sale::join('customers', 'sales.customer_id', '=', 'customers.id')
                    ->select('sales.*', 'customers.name')
                    ->where('sales.deleted', false)
                    ->orderBy($sort, $order)->paginate(12);
            
            return view('_components.sale.list', compact('sales'))->render();
        }
    }

    public function binSort(Request $request)
    {
        if ($request->ajax()) {
            $sort = $request->get('sort');
            $order = $request->get('order');
            $sales = Sale::join('customers', 'sales.customer_id', '=', 'customers.id')
                    ->select('sales.*', 'customers.name')
                    ->where('sales.deleted', true)
                    ->orderBy($sort, $order)->paginate(12);
            
            return view('_components.sale.list', compact('sales'))->render();
        }
    }

    public function sendToBin($id)
    {
        $sale = Sale::find($id);
        $sale->deleted = true;
        $sale->save();

        $customer = $sale->customer->name;
        return redirect('/sale')->with('success', "Sale for ser <span class='text-primary'>$customer</span> has been deleted");
    }

    public function bin()
    {
        $sales = Sale::where('deleted', true)->orderBy('sale_id', 'DESC')->paginate(12);

        return view('sale.bin')->with('sales', $sales);
    }

    public function purge($id)
    {
        $sale = Sale::find($id);
        $sale->delete();

        $customer = $sale->customer->name;
        return redirect('/sale/bin')->with('success', "User <span class='text-primary'>$customer</span> has been completely deleted");
    }

    public function create()
    {
        $customers = Customer::where('deleted', false)->orderBy('name', 'ASC')->get();
        $users = User::OrderBy('name', 'ASC')->get();
        $product = Product::OrderBy('name', 'ASC')->get();

        $sale = Sale::orderBy('created_at', 'desc')->first();

        if ($sale === null) {
            $saleId = 1;
        } else {
            $parts = explode('-', $sale->sale_id);
            $saleId = $parts[1] + 1;
        }

        return view('sale.create',['customers' => $customers, 'users' => $users, 'products' => $product, 'saleId' => $saleId]);
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            $sales = Sale::join('customers', 'sales.customer_id', '=', 'customers.id')
            ->select('sales.*', 'customers.name')
            ->where('sales.deleted', false)->where('customers.name', 'like', '%' . $query . '%')
            ->orderBy('name', 'ASC')
                    ->paginate(12);

        if ($sales->isEmpty()){
            return response()->json('<div class="no-data">No Data For this User</div>');
        }        

        return view('_components.sale.list', compact('sales'))->render();
        }
    }

    public function binSearch(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            $sales = Sale::join('customers', 'sales.customer_id', '=', 'customers.id')
            ->select('sales.*', 'customers.name')
            ->where('sales.deleted', true)->where('customers.name', 'like', '%' . $query . '%')
            ->orderBy('name', 'ASC')
                    ->paginate(12);

        if ($sales->isEmpty()){
            return response()->json('<div class="no-data">No Data For this User</div>');
        }        

        return view('_components.sale.list', compact('sales'))->render();
        }
    }

    public function store(Request $request) 
    {
        // dd($request->all());

        
        // dd($product);

        $product_ids = [];

        foreach ($request->product as $item) {
            if (isset($item['product_id']) && isset($item['quantity'])) {
                $product_ids[$item['product_id']] = ['quantity' => $item['quantity']];
            }
    }

        // dd($product_ids);

        
        $request->validate([
            'sale_id' => 'required',
            'customer_id' => 'required',
            'user_id' => 'required',
            'store_id' => 'required',
            'sale_date' => 'required',
        ]);
        
        
        
        $sale = new Sale();
        $sale->total_price = $request->total;
        $sale->sale_id = $request->sale_id;
        $sale->customer_id = $request->customer_id;
        $sale->user_id = $request->user_id;
        $sale->store_id = $request->store_id;
        $sale->sale_date = $request->sale_date;
        
        $sale->save();
        
        $sale->products()->attach($product_ids);

        return redirect('/sale')->with('success', "Sale has been created");

    }

    public function detail($id)
    {
        $sales = Sale::find($id);
        return view('sale.detail')->with('sales', $sales);
    }

    public function getStoreList(Request $request)
    {

        $user = User::find($request->user_id);
        $stores = $user->stores;
        return response()->json($stores);
    }

}
