@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
  <table class="table">
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>&nbsp;</th>
      </tr>
    </thead>
    <tbody id="bag_body">
        <tr>
          <td colspan="4">Empty Bag</td>
        </tr>
    </tbody>
  </table>
  
</div>
</div>
@endsection

@section('script')
  <script>
    $(document).ready(function(){
        if(localStorage.bag){
          bag = JSON.parse(localStorage.bag);
          $("#bag_body").empty();
        }
      else bag =[];
      var qty = 1;
      var sumOrder =0;
      var countItems =0;
      $("#cart_item").html(bag.length);
  // console.log(bag);
    for(product of bag){
        console.log(product);
        $("#bag_body").append("<tr><td>"+product.name+"</td><td>"+product.price+"</td><td>"+qty+"</td><td>"+ product.price * qty +"</td> <td></td></tr>");
        countItems +=qty;
        sumOrder += (product.price *qty);
    }
    $("#bag_body").append("<tr><td colspan='2'>Total</td> <td>"+countItems+"</td><td>"+ sumOrder +"</td></tr>");
    });
  </script>

@endsection