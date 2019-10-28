<?php

namespace App\Http\Controllers;

use App\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    protected $customer;

    public function __construct(customer $customer)
    {
        $this->customer = $customer;
    }

    public function index()
    {
        $customer = $this->customer->all();
        return view('customer.list', compact('customer'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function add(Request $request)
    {
        $image = $request->image;
        $path = 'public/image';
        $fileName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs($path, $fileName);
        $customer = new customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->image = $fileName;
        $customer->save();
        return redirect()->route('customers.index');


    }


    public function delete($id)
    {
        $customer = $this->customer->findOrFail($id);
        File::delete(storage_path('app\public\image\\' . $customer->image));
        $customer->delete();

        return redirect()->route('customers.index');
    }

    public function edit($id)
    {
        $customer = $this->customer->findOrFail($id);
        return view('customer.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = $this->customer->findOrFail($id);
        if ($request->image) {
            File::delete(storage_path('app\public\image\\' . $customer->image));
            $image = $request->image;
            $path = 'public/image';
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs($path, $fileName);
            $customer->image = $fileName;
        }
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->save();
        return redirect()->route('customers.index');
    }
}
