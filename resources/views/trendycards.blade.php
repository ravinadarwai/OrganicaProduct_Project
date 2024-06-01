<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<section class="section top-product">
        <div class="container">

          <p class="section-subtitle"> -- Organic Food --</p>

          <h2 class="h2 section-title">Trendy Products</h2>

          <ul class="top-product-list grid-list">

          @foreach ($products3 as $product)


            <li class="top-product-item">
              <div class="product-card top-product-card">

                <figure class="card-banner">
                  <img src="{{ asset($product->image) }}" width="100" height="100" loading="lazy"
                    alt="Lorigun Artificial">

                  <div class="btn-wrapper">
                  <form action="{{ route('wishlist') }}" method="post" enctype="multipart/form-data">

<button class="product-btn" aria-label="Add to Wishlist">
  <ion-icon name="heart-outline">
@csrf
<input type="hidden" name="product_id" value="{{ $product->id }}">
<input type="hidden" name="name" value="{{ $product->name }}">

<input type="hidden" name="image" class=" w-100" value="{{ asset($product->image) }}" multiple />
<input type="hidden" name="sprice" value="{{ $product->sprice }}">

<input type="hidden" name="quantity" value="1">

  </ion-icon>
  <div class="tooltip">Add to Wishlist</div>
</button>
</form>

                                          
<a href="{{ route('buynow', ['type' => 'trendy', 'id' => $product->id]) }}" class="product-link" aria-label="View Product">

<button class="product-btn" aria-label="Quick View">
<ion-icon name="eye-outline"></ion-icon>
<div class="tooltip">View Product</div>

</button>

</a>
                  </div>
                </figure>

                <div class="card-content">

                  <div class="rating-wrapper">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                  </div>
                  <h3 class="h4 card-title">
                    <a href="./product-details.html">{{ $product->name }}</a>
                  </h3>
               
                  <div class="price-wrapper">
                    <data class="price" value="">₹{{ $product->sprice }}</data>
                  </div>

                  <form action="{{ route('cart.add') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">

                    <input type="hidden" name="image" class=" w-100" value="{{ asset($product->image) }}" multiple />
                    <input type="hidden" name="sprice" value="{{ $product->sprice }}">

                    <input type="hidden" name="quantity" value="1">

                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                   </form>
                </div>

              </div>
            </li>
            @endforeach

          </ul>

        </div>
      </section>
</body>
</html>