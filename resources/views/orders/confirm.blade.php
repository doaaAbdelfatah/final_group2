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
  <a  class="btn btn-danger" onclick="order()" role="button">Complete Order</a>
  
</div>
</div>
@endsection

@section('script')
  <script>
    var sumOrder =0;
    var countItems =0;
    var qty = 1;

    $(document).ready(function(){
        if(localStorage.bag){
          bag = JSON.parse(localStorage.bag);
          $("#bag_body").empty();
        }
      else bag =[];
     
     
      $("#cart_item").html(bag.length); 
      var i=0;
      for(product of bag){      
          $("#bag_body").append("<tr id='bag_row_"+ i +"'><td>"+product.name+"</td><td>"+product.price+"</td><td>"+qty+"</td><td>"+ product.price * qty +"</td></tr>");
          countItems +=qty;
          sumOrder += (product.price *qty);
      }
      $("#bag_body").append("<tr id='bag_row_summry'><td colspan='2'>Total</td> <td>"+countItems+"</td><td>"+ sumOrder +"</td></tr>");
    });
    function order(){
      if(localStorage.bag){
        bag = JSON.parse(localStorage.bag);
        console.log(bag);
        $.ajax({
               type:'POST',
               url:'/order/store',
               data:{"_token": "{{csrf_token()}}"  , "bag" : bag}, 
               success:function(data) {
                 if(data ==1 ){
                    localStorage.bag = JSON.stringify([]);     
                    $("#cart_item").html(0);
                    
                    window.location.replace('{{config("app.url")}}');

                 }
               }
            });


        
         }
    }
  </script>

@endsection