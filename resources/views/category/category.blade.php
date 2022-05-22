
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               
            <form method="POST" action="{{ route('addcategory') }}">
            @csrf
  <label for="fname">Category:</label><br>
  <input type="text" id="category"  class="form-control" name="category" value="" required><br>
 
  <input type="submit" value="Submit">
</form> 
</div>
        </div>
        

        <div class="col-md-8" style="margin-top:20px;">
        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
            <div class="card">
            @if(!empty(Session::get('user.teams')))
        <table class="table table-bordered">
<tr>
<th>Category Name</th>
@foreach(Session::get('user.teams') as $category)
<tr>
            <td>{{ $category }}</td>
</tr>

@endforeach



</tr>

</table>
@endif
<a class="btn btn-link" href="{{ route('save') }}">
Save All
                                    </a>

    </div>
    </div>
    </div>
</div>
@endsection
