<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\orderproducts;
use App\Models\User;
use App\Models\VegeModel;
use App\Models\wishlist;
use Illuminate\Support\Facades\Auth;

use App\Models\dairymodel;
use App\Models\fishmodel;
use Illuminate\Http\Request;

use App\Models\fruitmodel;
use App\Models\trendymodel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Adminmodel;
use App\Models\Cart;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Apiusercontroller extends Controller
{
    

    public function show()
    {
        $products = Adminmodel::paginate(8);
        $products1 = FishModel::paginate(8);
        $products2 = dairymodel::paginate(8);
        $products3 = TrendyModel::paginate(9);
        $products4 = FruitModel::paginate(8);

        

        $response = [
            'status' => true,
            'data' => [
                'products' => $products,
                'products1' => $products1,
                'products2' => $products2,
                'products3' => $products3,
                'products4' => $products4,
            ],
        ];


        return response()->json($response);

    
    }
    public function shopnow()
    {
        $products = Adminmodel::all();
        $products1 = fishmodel::all();

        $products2 = dairymodel::all();
        $products3 = trendymodel::all();

        $products4 = fruitmodel::all();


        $response = [
            'status' => true,
            'data' => [
                'products' => $products,
                'products1' => $products1,
                'products2' => $products2,
                'products3' => $products3,
                'products4' => $products4,
            ],
        ];


        return response()->json($response);  
      }





        public function trendyshow()
        {
            
            $products3 = trendymodel::all();
    
    
            return response()->json(['status' => true , 'data'=> $products3]);
        }
            
    
    
        public function showcart()
        {
            
            $userId = Auth::id();
    
            $products = Cart::where('user_id', $userId)->get();
        
            return response()->json(['status' => true , 'data'=> $products]);
        }


        public function showaddress()
        {
            // Fetch the most recent address from the database
            $address = order::latest()->first();
               dd($address);
            return view('placeorder', compact('address'));
        }
        
    
    
            
    
           
        public function addToCart(Request $request)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('message', 'Please log in to add items to your cart.');
        }
    
        // User is authenticated, continue with adding the product to the cart
        $user = Auth::user();
    
    
        // Validate the request data if needed
    
        // Add the product to the cart
        Cart::create([
            'user_id' => $user->id,
            'product_id' => $request->input('product_id'),
            'name' => $request->input('name'),
    
            'image' => $request->input('image'),
            'rate' => $request->input('sprice'),
    
            'quantity' => $request->input('quantity', 1),
    
        ]);
    
        // Update the cart count in the session
        $cartCount = Cart::where('user_id', $user->id)->count();
            session(['cart_count' => $cartCount]);
       
    
            return response()->json(['status' => true ]);
    }
    
    
    
    public function update(Request $request, $id)
    {
        $cartItem = Cart::find($id);
        
        if (!$cartItem) {
            return redirect()->route('showcart')->with('error', 'Item not found in the cart.');
        }
    
        $cartItem->update([
            'quantity' => $request->quantity
        ]);
    
        return redirect()->route('showcart')->with('success', 'Item quantity updated successfully.');
    }
    
    public function destroy($id)
    {
        $cartItem = Cart::find($id);
    
        if (!$cartItem) {
            return redirect()->route('showcart')->with('error', 'Item not found in the cart.');
        }
    
        $cartItem->delete();
         $cartCount = Cart::where('user_id', Auth::id())->count();
         session(['cart_count' => $cartCount]);
    
        return redirect()->route('showcart')->with('success', 'Item removed from the cart.');
    }
    
    public function deleteAll()
    {
        Cart::truncate(); // Delete all records from the 'carts' table
        session(['cart_count' => 0]);
        session(['deleteAllClicked' => true]);
    
        // Flash the input data into the session
    
        return redirect()->route('showcart')->with('success', 'All items have been removed from the cart.');
    }
    
    public function placeorder(){
        // Calculate the total price from the session data
        $totalPrice = session('cartTotalPrice', 0);
    
        // Render the "Place Order" view and pass $totalPrice to the view
        return view('placeorder', ['totalPrice' => $totalPrice]);
    }
    
     
    
    public function wishlist(Request $request)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('message', 'Please log in to add items to your cart.');
        }
    
        // User is authenticated, continue with adding the product to the cart
        $user = Auth::user();
    
    
        // Validate the request data if needed
    
        // Add the product to the cart
        wishlist::create([
            'user_id' => $user->id,
            'product_id' => $request->input('product_id'),
            'name' => $request->input('name'),
            'image' => $request->input('image'),
            'sprice' => $request->input('sprice'),
            'quant' => $request->input('quant', 1),
            'description' =>  $request->input('description'),
    
        ]);
    
        // Update the cart count in the session
        $wish = wishlist::where('user_id', $user->id)->count();
            session(['wishlist_count' => $wish]);
       
    
            return response()->json(['status' => true ]);
    }
    
    
    public function wishlistget()
    {
        $products = wishlist::all();
              
    
        return response()->json(['status' => true , 'data'=> $products]);
    
    }
    
    
    public function destroyW($id)
    {
        $wishItem = wishlist::find($id);
    
        if (!$wishItem) {
            return redirect()->route('wishlistget')->with('error', 'Item not found in the wishlist.');
        }
    
        $wishItem->delete();
    
        // Update the wishlist count in the session
        $wishCount = wishlist::where('user_id', Auth::id())->count();
        session(['wishlist_count' => $wishCount]);
    
        return response()->json(['status' => true ]);
    }
    
    
    public function order(Request $request)
    {
       
        $validatedData = $request->all();
        $orders = Order::with('orderproducts')->get();
    
        $address = order::latest()->first();
    
        order::create($validatedData);
        // Redirect back to the form with a success message
        return view('placeorder', compact('address' , 'orders'));
    
        
    }
    
    public function updateaddress(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required',
            'contact_no' => 'required',
            'address' => 'required',
            'pincode' => 'required',
        ]);
    
        // Update the address in the database
        $address = Order::latest()->first();
        $address->update([
            'name' => $request->name,
            'contact_no' => $request->contact_no,
            'address' => $request->address,
            'pincode' => $request->pincode,
        ]);
    
        // Redirect back with a success message
        return redirect()->route('place-order')->with('success', 'Address updated successfully');
    }
    
    
    
    
    
    public function finalorder(Request $request)
    {
        $from = $request->input('from');
        // Fetch the Buy Now product from the session
        $buyNowProduct = session('buyNowProduct');
    
        if ($from === 'buynow') {
            // User is coming from buynow, show Buy Now data
            return view('finalorder', compact('buyNowProduct'));
        } else {
            // User is coming directly to finalorder, show cart data
            $products = Cart::all();
            $address = Order::latest()->first();
    
            $totalPrice = 0;
    
            // Calculate the total price of products in the cart
            foreach ($products as $product) {
                $totalPrice += $product->rate * $product->quantity;
            }
    
            return response()->json(['status' => true , 'data'=> $products]);
        }
    }
    
    
    public function myorder(){
    
        $id = Auth::id();
    
        $products = orderproducts::all();
    
        $latestOrder = orderproducts::latest('id')->first(); // Fetch the most recently added order
        return response()->json(['status' => true , 'data'=> $products]);
       
    
    }
    
        public function updateStatus(Request $request)
    {
        $orderId = $request->input('order_id');
    
        $order = orderproducts::findOrFail($orderId);
        // dd($order);
        $order->status = 'cancelled';
        $order->save();
    
        return redirect()->back()->with('success', 'Order status updated successfully.');
    }
    
    
    public function placeorderr()
    {
        // Get the user ID of the currently authenticated user
        $userId = Auth::user()->id;
    
        // Get all the product IDs and names from the 'carts' table for this user
        $cartItems = Cart::where('user_id', $userId)->select('product_id', 'name' ,'rate', 'image')->get();
        $totalPrice = Session::get('totalPrice', 0)-10;
        $jh=order::all()->max('id');
        
        $rs = User::all()->max('id');
    
    
        // Initialize arrays to store product IDs and names
        $productIds = [];
        $productNames = [];
        $productimage = [];
        $productsprice = [];
    
    
         
        foreach ($cartItems as $cartItem) {
            $productIds[] = $cartItem->product_id;
            $productNames[] = $cartItem->name;
            $productimage[] = $cartItem->image;
            $productsprice[]= $cartItem->rate;
    
    
    
        }
    
        // Serialize arrays to JSON format
        $productIdsJson = json_encode($productIds);
    
        // Insert the serialized JSON data into the 'orderproducts' table
        orderproducts::create([
            'user_id' => $rs,
            'order_id' => $jh,
            'product_id' => $productIdsJson,
            'name' => json_encode($productNames),
            'image' => json_encode($productimage),
    'sprice' =>json_encode($productsprice),
            'total_amount' => $totalPrice,
            
             // Insert the total price from the session
    
             // Store product names as JSON or adjust the column type
        ]);
    
        // You can also add additional logic here, such as clearing the 'carts' table or calculating the total amount.
    
        return response()->json(['status' => true ]);
    }
    
    public function buynow($type,$id)
        {
    
    
            if($type === 'all'){
                $product = wishlist::find($id);
    
                return view('buynow', compact('product'));
    
            }
            else{
            $productType = $type;
            switch ($type) {
    
                case 'vegetable':
                    $product = VegeModel::find($id);
                    
                    break;
                case 'fish':
                    $product = FishModel::find($id);
                    break;
                case 'dairy':
                    $product = DairyModel::find($id);
                    break;
                case 'fruit':
                    $product = FruitModel::find($id);
                    break;
                case 'trendy':
                    $product = TrendyModel::find($id);
                    break;
                default:
                    // Handle the case when the product type is not recognized
                    abort(404);
                    break;
    
            }
    // Set the session for Buy Now product
             session(['buyNowProduct' => $product]);
    
        
    
            return view('buynow', compact('product', 'productType'));
        }
        
    
        }
    
    
    
        public function about(){
            return view('aboutus');
        }
    

           

        








        /////////////////////////////////////////////////////////////////////////////////////////////////////////

        //////////// login and registration//////////////////////////



       


}
