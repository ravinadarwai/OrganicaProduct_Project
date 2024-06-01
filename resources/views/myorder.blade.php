@php
$totalPrice = 0;
@endphp
@include('layout.header')
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
      body{
        font-size: large;
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

    </style>
</head>

<body>
    <div class="container ">
        <h3 style="display: flex; justify-content: center;">My Order List</h3>

        <div class="row">
            <div class="col-12">
            @foreach ($products as $product)
    <div class="card cart-card mb-4 ps-5">
        <div class="card-body">
            <div class="row">
                <div class="col-6 col-md-3">
                    <p style="width: 17rem;"> {{ $product->created_at }}</p>
                    <hr style="width: 35rem;">
                    @php
                        $productNames = json_decode($product->name);
                        $productImages = json_decode($product->image);
                        $productsPrices = json_decode($product->sprice);
                    @endphp
                    @if (is_array($productNames) && is_array($productImages) && is_array($productsPrices))
                        @for ($i = 0; $i < count($productNames); $i++)
                            <div class="product-box" style="display: flex;">
                                <div class="product-image" style="display: flex; margin-left:3px">
                                    <img src="{{ asset($productImages[$i] ?? 'path_to_default_image.jpg') }}" style="width: 13rem; height: 12rem;" class="cart-image" alt="Product Image">
                                </div>
                                <div class="product-name" style="display: flex; margin-left:5rem; margin-top:2rem;">
                                    <h3 class="card-title">{{ $productNames[$i] }}</h3>
                                </div>
                                <div class="product-price" style="display: flex; margin-left:5rem; margin-top:2rem;">
                                    <p>Price: ${{ $productsPrices[$i] }}</p>
                                </div>
                            </div>
                        @endfor
                    @else
                        <p>No product names, images, or prices found for this product.</p>
                    @endif
                </div>
                <div class="col-6 order-summary" style="margin-top: 8px; margin-left: 20rem;">
                    <h3>Order Summary</h3><hr>
                    <div class="price-details mt-5">
                        <h3 class="total-amount" style="margin-left: 2rem; display: flex;">Total Amount:</h3> <span style="margin-top:-3rem;margin-left: 36rem;">${{$product->total_amount}}</span>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="card cart-card">
                                <div class="card-body">
                                    <h2>Would you like to cancel your order ?</h2>
                                    @if($product->status !== 'cancelled')
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cancelOrderModal">Cancel Order</button>
                                    @else
                                        <button type="button" class="btn btn-primary" disabled>Order Cancelled</button>
                                    @endif                                </div>
                            </div>
                        </div>
                    </div>

                    </div>

                    <hr>
                    <!-- Order status -->
                    <div class="row">
                        <div class="col-12">
                            <p style="color: {{ $product->status === 'pending' ? 'orange' : ($product->status === 'received' ? 'green' : 'red') }}">
                                @if($product->status === 'pending')
                                    Your order is pending
                                @elseif($product->status === 'received')
                                    Order Received
                                @elseif($product->status === 'cancelled')
                                    Order Cancelled
                                @endif
                            </p>
                        </div>
                    </div>
<hr></div>

                        <!-- Rest of your code for quantity and other details -->
                    </div>
                </div>

            
            
            
            @endforeach

          







        </div>
    </div>


    <!-- Modal for Cancel Order -->
    <div class="modal fade" id="cancelOrderModal" tabindex="-1" role="dialog" aria-labelledby="cancelOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cancelOrderModalLabel">Cancel Order Options</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Please select a reason for cancelling your order.</p>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="lateDeliveryOptionModal" name="cancelOptionModal" value="lateDelivery">
                        <label class="form-check-label" for="lateDeliveryOptionModal">Late Delivery</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="changeOrderOptionModal" name="cancelOptionModal" value="changeOrder">
                        <label class="form-check-label" for="changeOrderOptionModal">Change My Order</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="otherReasonOptionModal" name="cancelOptionModal" value="otherReason">
                        <label class="form-check-label" for="otherReasonOptionModal">Other Reason</label>
                    </div>
                </div>
                <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

    <!-- Form for confirming order cancellation -->
    <form action="{{ route('update.order.status') }}" method="POST">
    @csrf
    <input type="hidden" name="order_id" value="{{ $product->id }}">
    <button type="submit" class="btn btn-primary">Confirm Order Cancel</button>
</form>

</div>

            </div>
        </div>
    </div>


    </div>

    <!-- Add this code inside the <head> section of your HTML -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>