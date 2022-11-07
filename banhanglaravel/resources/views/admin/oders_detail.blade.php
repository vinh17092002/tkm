@extends('admin.layout.master')
@section('content')
<div class="container-fluid px-4">
<ul>
    <li>Tên khách hàng: <strong>{{$customer->name}}</strong></li>
    <li>Giới tính: <strong>{{$customer->gender}}</strong></li>
    <li>Email: <strong>{{$customer->email}}</strong></li>
    <li>Address: <strong>{{$customer->address}}</strong></li>
    <li>Phone: <strong>{{$customer->phone_number}}</strong></li>
    <li>Note: <strong>{{$customer->note}}</strong></li>
</ul>
</div>
<div class="carts">
							<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
							<table class="table">
                                <tbody>
                                    <tr>
                                        <th>Name</th>
                                        <th>Data_oder</th>
                                        <th>Payment</th>
                                        <!-- <th>Quantity</th> -->
                                        <th>Note</th>
                                        <th>Total</th>
                                    </tr>
                                    @foreach ($bill as $cart)
                                    <tr>
                                        <td>{{$cart->id_customer}}</td>
                                        <td>{{$cart->date_order}}</td>
                                        <td>{{$cart->payment}}</td>
                                        <td>{{$cart->note}}</td>
                                        <td>{{$cart->total}}</td>
                                    </tr>

                                    <tr>
                                        <td colspan="4"></td>
                                        <td>Tổng tiền:{{$cart->total}}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    </table>
@endsection
