<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customer.customers',compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        Customer::create([
            'name' => $request->name,
            'email' =>$request->email,
            'mobile' =>$request->mobile,
            'address' =>$request->address,
        ]);
        return redirect()->route('customers.index')->with(['success' => "تم حفظ بيانات العميل بنجاح"]);

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $update_customer = Customer::findOrFail($request->customer_id);

        $update_customer->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile'=>$request->mobile,
            'address'=>$request->address,
        ]);
        return redirect()->route('customers.index')->with(['success' => "تم تحديث بيانات العميل بنجاح"]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delete_customer = Customer::findOrFail($request->customer_id);
        $delete_customer->delete();
        return redirect()->route('customers.index')->with(['success' => "تم حذف العميل بنجاح"]);

    }
}
