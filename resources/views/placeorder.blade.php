<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order - Meesho</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <style>


            .box {
        background-color: #f2f2f2;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 15px;
        margin-top: 20px;
        margin-bottom:20px;
    }

    .box h4 {
        color: #333;
        font-size: 20px;
        margin-bottom: 10px;
    }

    .address-details {
        margin-left: 20px; /* Add some left margin to the address details for indentation */
    }

    .address-details p {
        margin: 5px 0;
        font-size: 16px;
    }

        .place-order-btn .thank-you-pop {
            width: 100%;
            padding: 20px;
            text-align: center;
        }

        .place-order-btn .tick-icon.animated {
            animation: bounce 2s ease infinite;
            color: green;
        }

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

        .place-order-btn .thank-you-pop img {
            width: 76px;
            height: auto;
            margin: 0 auto;
            display: block;
            margin-bottom: 25px;
        }

        .place-order-btn .thank-you-pop h1 {
            font-size: 42px;
            margin-bottom: 25px;
            color: #5C5C5C;
        }

        .place-order-btn .thank-you-pop p {
            font-size: 20px;
            margin-bottom: 27px;
            color: #5C5C5C;
        }

        .place-order-btn .thank-you-pop h3.cupon-pop {
            font-size: 25px;
            margin-bottom: 40px;
            color: #222;
            display: inline-block;
            text-align: center;
            padding: 10px 20px;
            border: 2px dashed #222;
            clear: both;
            font-weight: normal;
        }

        .place-order-btn .thank-you-pop h3.cupon-pop span {
            color: #03A9F4;
        }

        .place-order-btn .thank-you-pop a {
            display: inline-block;
            margin: 0 auto;
            padding: 9px 20px;
            color: #fff;
            text-transform: uppercase;
            font-size: 14px;
            background-color: #8BC34A;
            border-radius: 17px;
        }

        .place-order-btn .thank-you-pop a i {
            margin-right: 5px;
            color: #fff;
        }

        .place-order-btn #ignismyModal .modal-header {
            border: 0px;
        }

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
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h2>Place Your Order</h2>
                <form action="{{ route('order') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="address">Delivery Address</label>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" style="width: 20rem; height: 3rem;">Add address</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Enter contact details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span>×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="name">Name:</label>
                                            <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name">
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="contact-no">Contact No:</label>
                                            <input type="text" class="form-control" id="contact-no" placeholder="Enter your contact number" name="contact_no" pattern="(\+91)?[0-9]{10}" required>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="address">Address:</label>
                                            <textarea class="form-control" id="address" rows="3" placeholder="Enter your address" name="address"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="pincode">Pincode:</label>
                                            <input type="text" class="form-control" id="pincode" placeholder="Enter your pincode" name="pincode">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Save and continue</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </form>
                      
                @if(isset($address))
                <form action="{{ route('order') }}" method="post">
                    @csrf
<div class="box">
    <button type="button" data-bs-toggle="modal" data-bs-target="#editAddressModal" style="float:right; border:none; color:green; font-size:19px;">Edit</button>

    <div class="modal fade" id="editAddressModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span>×</span></button>
                </div>
                <form action="{{ route('updateaddress', ['id' => $address->id]) }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" value="{{ $address->name }}">
                        </div>
                        <div class="form-group">
                            <label for="contact-no">Contact No:</label>
                            <input type="text" class="form-control" id="contact-no" placeholder="Enter your contact number" name="contact_no" value="{{ $address->contact_no }}">
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <textarea class="form-control" id="address" rows="3" placeholder="Enter your address" name="address">{{ $address->address }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="pincode">Pincode:</label>
                            <input type="text" class="form-control" id="pincode" placeholder="Enter your pincode" name="pincode" value="{{ $address->pincode }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="address-details">
        <p><strong>Address:</strong> {{ $address->address }} {{ $address->pincode }}</p>
        <p><strong>Contact No:</strong> {{ $address->contact_no }}</p>
    </div>
</div>
    </form>
@endif



                        
                <div class="form-group">
                    <label>Payment Method</label>
                    <div class="payment-method">
                        <label>
                            <input type="radio" name="payment" value="cod" checked> Cash on Delivery
                        </label>
                        <label>
                            <input type="radio" name="payment" value="cod" checked>online delivery
                        </label>
                    </div>
                </div>
                @if (empty($address))
    <button type="button" class="btn btn-success" style="width: 20rem; height: 3rem;" disabled>Continue</button>
@else
    @if (!empty($buyNowProduct))
        <a href="{{ route('finalorder', ['from' => 'buynow']) }}">
            <button type="button" class="btn btn-success" style="width: 20rem; height: 3rem;">Continue</button>
        </a>
    @else
        <a href="{{ route('finalorder') }}">
            <button type="button" class="btn btn-success" style="width: 20rem; height: 3rem;">Continue</button>
        </a>
    @endif
@endif

                
            </div>
            <div class="col-6 order-summary">
                <h3>Order Summary</h3>
                <div class="price-details">
                    <p class="total-amount">Total Amount: <span>{{ session('totalPrice', 0) }}₹</span></p>
                    <p>Discount: <span>-10.00₹</span></p>
                    <p class="total-amount">Total Amount: <span>{{ max(session('totalPrice', 0) - 10, 0) }}₹</span></p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>