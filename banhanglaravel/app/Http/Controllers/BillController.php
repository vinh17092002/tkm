<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Customer;
use App\Models\BillDetail;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills=Bill::orderByDesc('id')->paginate(10);
        return view('admin.bill_list',['bills' => $bills]);
        // return view('admin.bill_list',[
        //     'title' => 'Chi tiết ',
        //     'bills'=>$bills,
        //     'customer'=> $bills->customer()->with('customer')->get()

        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.bill_edit', [
            'bill' => Bill::firstWhere('id', $id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request,[
        //     'status'=>'required'

        // ],[
        //     'status.required' => 'Bạn chưa nhập hình thức'
        // ]);
        $bill=Bill::find($id);
        $bill->status='Đã hoàn tất';
        $bill->save();

        return redirect()->route('bills.index')->with('success','Bạn đã cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bill=Bill::find($id);
        $bill->delete();
        return redirect()->route('bills.index')->with('success','Bạn đã xóa thành công');
    }
}
