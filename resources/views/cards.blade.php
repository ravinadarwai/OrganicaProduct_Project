
<!-- Example usage of the $productType variable in the "cards" Blade file -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabbed Content</title>
  <style>
    /* Add your CSS styles here */
    .tab-pane {
      display: none;
    }

    .tab-pane.active {
      display: block;
    }
  </style>
</head>

<body>
  <section class="section product">
    <div class="container">
      <p class="section-subtitle"> -- Organic Products --</p>
      <h2 class="h2 section-title">All Organic Products List</h2>
      <ul class="filter-list">
        
      <li class="nav-item" role="presentation">
          <button class="filter-btn" style="width: 3rem; height: 3rem;" id="fresh-vegetables-tab" type="button" role="tab" aria-controls="fresh-vegetables" aria-selected="false">
          <img src="{{ asset('public/assets/images/filter-1.png') }}" width="20" alt="" class="default">
            <img src="{{ asset('public/assets/images/filter-1-active.png') }}" width="20" alt="" class="color">
          Fresh Vegetables
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="filter-btn " style="width: 3rem; height: 3rem;" id="fish-meat-tab" type="button" role="tab" aria-controls="fish-meat" aria-selected="false">
          <img src="{{ asset('public/assets/images/filter-2.png') }}" width="20" alt="" class="default">
            <img src="{{ asset('public/assets/images/filter-2-active.png') }}" width="20" alt="" class="color">
          Fish & Meat
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="filter-btn" style="width: 3rem; height: 3rem;" id="healthy-fruit-tab" type="button" role="tab" aria-controls="healthy-fruit" aria-selected="false">
          <img src="{{ asset('public/assets/images/filter-3.png') }}" width="20" alt="" class="default">
            <img src="{{ asset('public/assets/images/filter-3-active.png') }}" width="20" alt="" class="color">
          Healthy Fruit
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="filter-btn" style="width: 3rem; height: 3rem;" id="dairy-products-tab" type="button" role="tab" aria-controls="dairy-products" aria-selected="false">
          <img src="{{ asset('public/assets/images/filter-1.png') }}" width="20" alt="" class="default">
            <img src="{{ asset('public/assets/images/filter-1-active.png') }}" width="20" alt="" class="color">
          Dairy Products
          </button>
        </li>
        
        <!-- Add similar buttons for other tabs -->
      </ul>

      <div class="tab-content" id="productTabsContent">


      
      <div class="tab-pane" id="fresh-vegetables" role="tabpanel" aria-labelledby="fresh-vegetables-tab">
          <!-- Content for the Fresh Vegetables tab -->

       
          <ul class="grid-list">
              @foreach ($products as $product)
              <li class="grid-item">
                <div class="product-card newclass">
                  <figure class="card-banner">
                    <img src="{{ asset($product->image) }}" height="189" loading="lazy" style="object-fit: cover; width: 19rem;" alt="Product Image">

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
                    <input type="hidden" name="description" value="{{ $product->description }}">


                        </ion-icon>
                        <div class="tooltip">Add to Wishlist</div>
                      </button>
                      </form>

                      
<a href="{{ route('buynow', ['type' => 'vegetable', 'id' => $product->id]) }}" class="product-link" aria-label="View Product">

<button class="product-btn" aria-label="Quick View">
<ion-icon name="eye-outline"></ion-icon>
<div class="tooltip">View Product</div>

</button>

</a>



                    </div>
                  </figure>

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
                    <input type="hidden" name="description" value="{{ $product->description }}">


                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                   </form>
                </div>
              </li>
              @endforeach
            </ul>


           <!--  end-->
        </div>
       

        <div class="tab-pane" id="fish-meat" role="tabpanel" aria-labelledby="fish-meat-tab">
                      <!-- Content for the Healthy Fruit tab -->

        <ul class="grid-list">
              @foreach ($products1 as $product)
              <li class="grid-item">
                <div class="product-card newclass">
                  <figure class="card-banner">
                    <img src="{{ asset($product->image) }}" height="189" loading="lazy" style="object-fit: cover; width: 19rem;" alt="Product Image">

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
                    <input type="hidden" name="description" value="{{ $product->description }}">


                        </ion-icon>
                        <div class="tooltip">Add to Wishlist</div>
                      </button>
                      </form>

                      <a href="{{ route('buynow', ['type' => 'fish', 'id' => $product->id]) }}" class="product-link" aria-label="View Product">

<button class="product-btn" aria-label="Quick View">
<ion-icon name="eye-outline"></ion-icon>
<div class="tooltip">View Product</div>

</button>

</a>


   </div>
                  </figure>

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
                    <del class="del">{{ $product->quant }}</del>
                    <data class="price" value="">{{ $product->sprice }}</data>
                  </div>

                  <form action="{{ route('cart.add') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">

                    <input type="hidden" name="image" class=" w-100" value="{{ asset($product->image) }}" multiple />
                    <input type="hidden" name="sprice" value="{{ $product->sprice }}">

                    <input type="hidden" name="quantity" value="1">
                    <input type="hidden" name="description" value="{{ $product->description }}">


                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                   </form>
                </div>
              </li>
              @endforeach
            </ul>

             <!--  end-->
      </div>

        <div class="tab-pane" id="healthy-fruit" role="tabpanel" aria-labelledby="healthy-fruit-tab">
          <!-- Content for the Healthy Fruit tab -->
        
          <ul class="grid-list">
              @foreach ($products4 as $product)
              <li class="grid-item">
                <div class="product-card newclass">
                  <figure class="card-banner">
                    <img src="{{ asset($product->image) }}" height="189" loading="lazy" style="object-fit: cover; width: 19rem;" alt="Product Image">

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
<input type="hidden" name="description" value="{{ $product->description }}">

  </ion-icon>
  <div class="tooltip">Add to Wishlist</div>
</button>
</form>
<a href="{{ route('buynow', ['type' => 'fruit', 'id' => $product->id]) }}" class="product-link" aria-label="View Product">

<button class="product-btn" aria-label="Quick View">
<ion-icon name="eye-outline"></ion-icon>
<div class="tooltip">View Product</div>

</button>

</a>
                    </div>
                  </figure>

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
                    <del class="del">{{ $product->quant }}</del>
                    <data class="price" value="">{{ $product->sprice }}</data>
                  </div>

                  <form action="{{ route('cart.add') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">

                    <input type="hidden" name="image" class=" w-100" value="{{ asset($product->image) }}" multiple />
                    <input type="hidden" name="sprice" value="{{ $product->sprice }}">

                    <input type="hidden" name="quantity" value="1">
                    <input type="hidden" name="description" value="{{ $product->description }}">


                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                   </form>
                </div>
              </li>
              @endforeach
            </ul>



          <!--  end-->
        </div>

        <div class="tab-pane" id="dairy-products" role="tabpanel" aria-labelledby="dairy-products-tab">
          <!-- Content for the Dairy Products tab -->


          <ul class="grid-list">
              @foreach ($products2 as $product)
              <li class="grid-item">
                <div class="product-card newclass">
                  <figure class="card-banner">
                    <img src="{{ asset($product->image) }}" height="189" loading="lazy" style="object-fit: cover; width: 19rem;" alt="Product Image">

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
<input type="hidden" name="description" value="{{ $product->description }}">

  </ion-icon>
  <div class="tooltip">Add to Wishlist</div>
</button>
</form>


<a href="{{ route('buynow', ['type' => 'dairy', 'id' => $product->id]) }}" class="product-link" aria-label="View Product">

<button class="product-btn" aria-label="Quick View">
<ion-icon name="eye-outline"></ion-icon>
<div class="tooltip">View Product</div>

</button>

</a>
                    </div>
                  </figure>

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
                    <del class="del">{{ $product->quant }}</del>
                    <data class="price" value="">{{ $product->sprice }}</data>
                  </div>

                  <form action="{{ route('cart.add') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">

                    <input type="hidden" name="image" class=" w-100" value="{{ asset($product->image) }}" multiple />
                    <input type="hidden" name="sprice" value="{{ $product->sprice }}">

                    <input type="hidden" name="quantity" value="1">
                    <input type="hidden" name="description" value="{{ $product->description }}">


                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                   </form>
                </div>
              </li>
              @endforeach
            </ul>


           <!--  end-->
        </div>


        <!-- Add similar content sections for other tabs -->
      </div>
    </div>
  </section>

  <script>
    // JavaScript for handling tab clicks
    document.addEventListener("DOMContentLoaded", function () {
      const tabButtons = document.querySelectorAll(".filter-btn");
      const tabContents = document.querySelectorAll(".tab-pane");

      // Set the first tab and its content as active by default
      tabButtons[0].classList.add("active");
      tabContents[0].classList.add("active");

      tabButtons.forEach((button, index) => {
        button.addEventListener("click", () => {
          // Hide all tab contents
          tabContents.forEach((content) => {
            content.classList.remove("active");
          });

          // Show the clicked tab content
          const tabId = button.getAttribute("aria-controls");
          const tabContent = document.getElementById(tabId);
          tabContent.classList.add("active");

          // Set the clicked tab button as active
          tabButtons.forEach((btn) => {
            btn.classList.remove("active");
          });
          button.classList.add("active");
        });
      });
    });
  </script>

</body>

</html>



















