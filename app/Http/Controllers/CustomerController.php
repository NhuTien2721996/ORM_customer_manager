<?php

namespace App\Http\Controllers;

use App\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        $customer = new customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->address = $request->address;

        if (!$request->hasFile('inputFile')) {
            $customer->image = $request->inputFile;
        } else {
            $file = $request->file('inputFile');

            //Lấy ra định dạng và tên mới của file từ request
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = $request->inputFileName;

            // Gán tên mới cho file trước khi lưu lên server
            $newFileName = "$fileName.$fileExtension";

            //Lưu file vào thư mục storage/app/public/image với tên mới
            $request->file('inputFile')->storeAs('public/image', $newFileName);

            // Gán trường image của đối tượng task với tên mới
            $customer->image = $newFileName;
        }
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
      $customer=$this->customer->findOrFail($id);
        File::delete(storage_path('app\public\image\\' . $customer->image));
      $customer->update($request->all());
      return redirect()->route('customers.index');
    }
}
