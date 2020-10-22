@extends('layouts.app')

@section('content')
<div class="row">
  @foreach (App\Models\Products::orderBy("created_at" ,"desc")->get() as $product)

  <div class="col-md-3">
    <div id="carouselExampleControls{{$product->id}}" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        @foreach ($product->images as $image)
        <div class="carousel-item 
                        @if ($loop->first)
                        active
                        @endif
                     ">
          <img src="{{asset('storage/'.$image->img)}}" class="d-block w-100" alt="{{$product->name}}">
         

        </div>
        @endforeach
        <div class="carousel-caption d-none d-md-block">
          <a class="btn btn-sm btn-danger" onclick="addTobag({{$product->toJson()}} ,this)">Add to Bag</a>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls{{$product->id}}" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls{{$product->id}}" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  @endforeach
</div>
@endsection

@section('script')
<script>
  function addTobag (product ,link){
    
     if(localStorage.bag)
        bag = JSON.parse(localStorage.bag);
     else bag =[];

     if ( $(link).html() =="Add to Bag"){
        bag.push(product);
        // console.log(bag);
        localStorage.bag = JSON.stringify(bag);

        $(link).html("Remove from Bag");
        $(link).removeClass("btn-danger");
        $(link).addClass("btn-info");
      }else if( $(link).html() =="Remove from Bag"){        
        var i = 0;
        var rslt =0 ;
        for (el of bag){
          console.log(el.id);
          if(el.id == product.id){
            rslt =i;
            break;            
          }
          i++;
        }
        console.log(rslt);
        bag.splice(rslt , 1);
        // // bag.slice( product.id ,1);
        // console.log(bag);
        localStorage.bag = JSON.stringify(bag);
        $(link).html("Add to Bag");
        $(link).removeClass("btn-info");
        $(link).addClass("btn-danger");
      }
      $("#cart_item").html(bag.length);

    
    }
</script>

@endsection