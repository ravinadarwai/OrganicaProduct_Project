@php
    $totalPrice = 0;
@endphp



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order - Meesho</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
       
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        
    .modal-content {
        border: none;
        border-radius: 10px;
    }

    .modal-title {
        font-size: 24px;
        font-weight: bold;
    }

    .modal-body {
        padding: 20px;
    }

    .modal-footer {
        border-top: none;
    }

    .btn-primary {
        background-color: #04A459;
        border: none;
    }

    .btn-primary:hover {
        background-color: #04A459;
    }



        .container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 30px auto;
            padding: 30px;
        }

        .container h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .form-control {
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            padding: 10px;
            width: 100%;
        }

        .payment-method label {
            align-items: center;
            display: flex;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .payment-method input[type="radio"] {
            margin-right: 10px;
        }

        .place-order-btn {
            margin-top: 30px;
        }

        .place-order-btn button {
            background-color: #04A459;
            border: none;
            width: 20rem;
            border-radius: 4px;
            color: #fff;
            cursor: pointer;
            font-size: 18px;
            padding: 15px 30px;
            transition: background-color 0.2s;
        }

        .place-order-btn button:hover {
            background-color: #04A459;
        }

        .order-summary {
            margin: 30px auto;
            max-width: 600px;
            padding: 20px;
        }

        .order-summary h3 {
            color: #333;
            font-size: 20px;
            margin-bottom: 20px;
        }

        .price-details {
            border-top: 1px solid #ccc;
            margin-top: 20px;
            padding-top: 20px;
        }

        .price-details p {
            display: flex;
            justify-content: space-between;
            font-size: 18px;
            margin: 10px 0;
        }

        .total-amount {
            font-weight: bold;
        }
        .thank-you-pop{
        width:100%;
         padding:20px;
        text-align:center;
    }

    .tick-icon.animated {
            animation: bounce 2s ease infinite;
            color:green;
        }

        / Define the bounce animation /
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-30px);
            }
            60% {
                transform: translateY(-15px);
            }
        }
    .thank-you-pop img{
        width:76px;
        height:auto;
        margin:0 auto;
        display:block;
        margin-bottom:25px;
    }
    
    .thank-you-pop h1{
        font-size: 42px;
        margin-bottom: 25px;
        color:#5C5C5C;
    }
    .thank-you-pop p{
        font-size: 20px;
        margin-bottom: 27px;
         color:#5C5C5C;
    }
    .thank-you-pop h3.cupon-pop{
        font-size: 25px;
        margin-bottom: 40px;
        color:#222;
        display:inline-block;
        text-align:center;
        padding:10px 20px;
        border:2px dashed #222;
        clear:both;
        font-weight:normal;
    }
    .thank-you-pop h3.cupon-pop span{
        color:#03A9F4;
    }
    .thank-you-pop a{
        display: inline-block;
        margin: 0 auto;
        padding: 9px 20px;
        color: #fff;
        text-transform: uppercase;
        font-size: 14px;
        background-color: #8BC34A;
        border-radius: 17px;
    }
    .thank-you-pop a i{
        margin-right:5px;
        color:#fff;
    }
    #ignismyModal .modal-header{
        border:0px;
    }

    .cart-card {
            margin-bottom: 20px;
        }

        .cart-image {
            max-width: 100px;
            max-height: 100px;
        }

        .cart-total-price {
            font-size: 19px;
            font-weight: 500;
        }
    </style>
</head>
<body>



@if (!empty($buyNowProduct))
<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $buyNowProduct->name }}</h5>
    </div>
</div>
@endif




<div class="container">
        <div class="row">
    <div class="col-12">
    <div class="card cart-card">
            <div class="card-body">
                <div class="row">

<h2>Address:-</h2>
<div>
<h3 class="card-title">{{ $address->name }}</h3>
<p class="card-title">{{ $address->address }},({{ $address->pincode }})</p>
<p class="card-title">{{ $address->contact_no }}</p>


   
          </div>
            </div>
        </div>

            <div class="form-group ms-3">
                <label><h2> Payment Method:-</h2></label>
                <div class="payment-method">
                    <label>
                        <input type="radio" name="payment" value="cod" checked> Cash on Delivery
                    </label>
                    <!-- You can add more payment options here -->
                </div>
            </div>


    </div>
  
     

       
    </div>
    
    <div class="container">
        <h3   style="display: flex; justify-content: center;">Your Order List</h3>
        <div class="row">

    <div class="col-6">
    @if (!empty($products))

    @foreach ($products as $product)
        <div class="card cart-card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{ asset($product->image) }}" class="cart-image" alt="Product Image">
                    </div>
                    <div class="col-md-3 mt-3">
                        <h5 class="card-title">{{ $product->name }}</h5>
                    </div>
                    <div class="col-md-2 mt-3">


                  




                    

                    @php
        // Determine the quantity unit based on the first character of the product name
        $productName = $product->name;
        $quantityUnit = '';
        $firstCharacter = strtoupper(substr($productName, 0, 1));

        if ($firstCharacter === 'M' || $firstCharacter === 'V' || $firstCharacter === 'F') {
            $quantityUnit = 'g';
        } elseif ($firstCharacter === 'D') {
            $quantityUnit = 'ml';
        }

        // Retrieve the updated quantity for the current product
        $productId = $product->id;
        $updatedQuantities = session('updatedQuantities', []);
        $updatedQuantity = isset($updatedQuantities[$productId]) ? $updatedQuantities[$productId] : null;
    @endphp

    @if ($updatedQuantity)
        <p>{{ $updatedQuantity }} {{ $quantityUnit }}</p>
    @endif


                                         </div>
                    <div class="col-md-2 mt-3">
                    @php
            // Convert quantity to kilograms
            $quantityInKg = $product->quantity / 1000;
            
            // Calculate the total price based on quantity and rate per kilogram
            $totalProductPrice = $product->rate * $quantityInKg;
            
            // Add each product's total price to the total price
            $totalPrice += $totalProductPrice;
            
            // Format the total product price with two decimal places
            $formattedTotalProductPrice = number_format($totalProductPrice, 1);
            
            // Display the total product price
            echo "₹".$formattedTotalProductPrice;
        @endphp                    </div>
                  
                </div>
            </div>
        </div>
        @endforeach
        @endif

    </div>
    

    <!-- Order Summary -->

    <div class="col-6 order-summary">
        <h3>Order Summary</h3>
        <div class="price-details">
        <p class="total-amount">Total Amount: <span>{{ session('totalPrice', 0) }}₹</span></p>
            <p>Discount: <span>-10.00₹</span></p>
            <p class="total-amount">Total Amount: <span>{{ max(session('totalPrice', 0) - 10, 0) }}₹</span></p>
        </div>
        <div>
        <form action="{{ route('place.order') }}" method="POST">
    @csrf
    <!-- Your form fields for user details and payment method here -->
    
    <button type="submit" data-toggle="modal" href="#ignismyModal" style="width: 31rem;
    height: 3rem;
    padding: 1rem;">confirm order</button>

            <div class="modal fade" id="ignismyModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
                         </div>
                        
                        <div class="modal-body">
                           
                            <div class="thank-you-pop">
                                <i class="fas fa-check-circle fa-5x tick-icon animated"></i>
                                <h1>Thank You!</h1>
                                <p>Your submission is received and we will contact you soon</p>
                                <h3 class="cupon-pop">Your Id: <span>12345</span></h3>
                                
                             </div>
                             
                        </div>
                        
                    </div>
                </div>
            </div>
</form>
 
        </div>
    </div>
    </div>
    </div>






    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>




