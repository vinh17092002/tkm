@extends('admin.layout.master')
@section('content')
    <h1>Edit Bill</h1>
    <form action="{{ route('bills.update',$bill->id)}}" method="post" role="form" enctype="multipart/form-data">
        @csrf
        @method('put') <!-- <input name="_method" type="hidden" value="PATCH">  -->
    <div class="form-group">
        <label for="">Status</label>
        <input type="text" name="status" id="" class="form-control" hidden value="{{$bill->status}}">
        <br>
        <input name="btnSave" id="" class="btn btn-primary" type="submit" value="Hoàn tất">
    </div>
    </div>
    </form>
@endsection
