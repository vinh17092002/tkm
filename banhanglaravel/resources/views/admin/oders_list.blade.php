@extends('admin.layout.master')
@section('content')
<div class="container">
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
        <div class="container-fluid px-4">
                <h1 class="mt-4">Tables</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Customer
                            </div>
                            <div class="card-body">
                            <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Note</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customer as $customer)
            <tr class="active">
                <td><a href="customers/{{$customer->id}}">{{$customer->id}}</a></td>
                <td>{{$customer->name}}</td>
                <td>{{$customer->gender}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->address}}</td>
                <td>{{$customer->phone_number}}</td>
                <td>{{$customer->note}}</td>
                <td>{{$customer->created_at}}</td>
                <td style="width:120px"><button type="button" class="btn btn-primary" onclick="window.location='{{route('customers.show',$customer->id)}}'"><i class="fas fa-eye"></i></button>
                <button name="delete" class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button></form>
                </td>
                <td>

                </td>
            </tr>
            @endforeach
        </tbody>
                                 </table>
                                 <!-- script ajax (javascript) có thể đặt ở trong cặp thẻ head hoặc body -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script>
		$("document").ready(function(){
			$(".btn-danger").click(function(){
				return confirm("Bạn có thực sự muốn xóa?");
			});
		});

</script>
                              </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
@endsection
