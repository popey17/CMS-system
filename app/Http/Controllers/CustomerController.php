<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index ()
    {
        $customers = customer::where('deleted', false)->orderBy('customer_id', 'DESC')->paginate(12);
        return view('customer.index')->with('customers', $customers);
    }

    public function fetch_data(Request $request)
    {
        if($request->ajax())
        {
            $customers = customer::where('deleted', false)->orderBy('customer_id', 'DESC')->paginate(12);
            return view('_components.customer.list', compact('customers'))->render();
        }
    }

    public function sort(Request $request)
    {
        if ($request->ajax()) {
            $sort = $request->get('sort');
            $order = $request->get('order');
            $customers = customer::where('deleted', false)->orderBy($sort, $order)->paginate(12);
            return view('_components.customer.list', compact('customers'))->render();
        }
    }

    public function binSort(Request $request)
    {
        if ($request->ajax()) {
            $sort = $request->get('sort');
            $order = $request->get('order');
            $customers = customer::where('deleted', true)->orderBy($sort, $order)->paginate(12);
            return view('_components.customer.deleted', compact('customers'))->render();
        }
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            $customers = customer::where('deleted', false)->where('name', 'like', '%' . $query . '%')
            ->orderBy('name', 'ASC')
                    ->paginate(12);

        if ($customers->isEmpty()){
            return response()->json('<div class="no-data">No Data For this User</div>');
        }        

        return view('_components.customer.list', compact('customers'))->render();
        }
    }

    public function binSearch(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            $customers = customer::where('deleted', true)->where('name', 'like', '%' . $query . '%')
            ->orderBy('name', 'ASC')
                    ->paginate(12);

        if ($customers->isEmpty()){
            return response()->json('<div class="no-data">No Data For this User</div>');
        }        

        return view('_components.customer.deleted', compact('customers'))->render();
        }
    }

    public function sendToBin($id)
    {
        $user = customer::find($id);
        $user->deleted = true;
        $user->save();
        return redirect('/customer')->with('success', "User <span class='text-primary'>$user->name</span> has been deleted");
    }

    public function removeFromBin($id)
    {
        $user = customer::find($id);
        $user->deleted = false;
        $user->save();
        return redirect('/customer/bin')->with('success', "User <span class='text-primary'>$user->name</span> has been deleted");
    }

    public function bin ()
    {
        $customers = customer::where('deleted', true)->orderBy('customer_id', 'DESC')->paginate(12);
        return view('customer.bin')->with('customers', $customers);
    }

    public function deletedSearch(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            $customers = customer::where('deleted', false)->where('name', 'like', '%' . $query . '%')
            ->orderBy('name', 'ASC')
                    ->paginate(12);

        if ($customers->isEmpty()){
            return response()->json('<div class="no-data">No Data For this User</div>');
        }        

        return view('_components.customer.list', compact('customers'))->render();
        }
    }

    public function purge($id)
    {
        $user = customer::find($id);
        $user->delete();
        return redirect('/customer/bin')->with('success', "User <span class='text-primary'>$user->name</span> has been completely deleted");
    }
}
