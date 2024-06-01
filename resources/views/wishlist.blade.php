@include('layout.header')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Wishlist</title>
  <style>






    .container {
      display: flex;
      flex-wrap: wrap;
    }

    .grid-item {
      margin: 4rem; 
      margin-bottom: 0;
      display: flex;
      border: 1px solid #daeada;
            padding: 1rem;
      width: 145rem;
    height: 25rem
    }

    .product-image {
      flex-basis: 50%;
      padding-right: 1rem;
    }

    .product-content {
        flex-basis: 50%;
    row-gap: 1rem;
    display: flex;
    flex-direction: column;
    float: left;
    border: 1px solid #bce0be;
    margin: 0rem;
    padding: 4rem;
    }

    .product-image img {
      max-width: 41%;
      height: auto;
      margin: 2.5rem;
    margin-left: 13rem;
    }
  </style>
</head>
<body>
  <div class="container">
  @foreach ($products as $product)
    <div class="grid-item">
        <div class="product-image" style="background-color: #d1efe5;">
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }} Image">
        </div>

        <div class="product-content">
            <h1 class="h4 card-title">{{ $product->description }}</h1>
            <h1 class="h4 card-title">{{ $product->name }}</h1>
            <div class="rating-wrapper" style="margin-left: -35rem;">
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
            </div>
            <div class="price-wrapper">
                <span class="price"><h4>{{ number_format($product->sprice, 2) }}</h4></span>
            </div>
            <a href="{{ route('buynow', ['type' => 'all', 'id' => $product->id]) }}" class="product-link" aria-label="View Product">
                <button type="submit" class="btn btn-primary">Buy Now</button>
            </a>
            
            <form action="{{ route('wishlist.destroy', $product->id) }}" method="POST" >
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-dark" onclick="return confirm('Are you sure you want to delete this product?')" 
                    style="float: right; margin: -1rem; margin-top: -15rem; background-color: beige; color: green;"
                    {{ $product->status === 'cancelled' ? 'disabled' : '' }}>
                    <i class="fa-solid fa-trash-can text-success"></i> 
                </button>
            </form>
        </div>
    </div>
@endforeach

  </div>
</body>
</html>