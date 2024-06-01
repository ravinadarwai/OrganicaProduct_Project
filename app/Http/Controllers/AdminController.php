<?php


namespace App\Http\Controllers;


use App\Models\Blog;
use App\Models\contact;
use App\Models\dairyModel;
use App\Models\FishModel;
use App\Models\FruitModel;
use App\Models\metadata;
use App\Models\TrendyModel;
use App\Models\order;
use App\Models\orderproducts;
use Illuminate\Support\Facades\DB;




use App\Models\VegeModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   


    public function meta(){
        return view('admin.meta');
    }
    


    


    public function contact()
    {
        $meta= MetaData::find(5);
    
        return view('contact',compact('meta'));
    }
    
    public function send(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);
    
        contact::create($validatedData);
        // Redirect back with a success message
        return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');
    }

    public function metastore(Request $request){
        $store = $request->all();
        $jj = metadata::create($store);
        return redirect()->route('meta')->with('success', 'Blog post created successfully');

    }


    public function showOrders()
    {
        // Fetch orders with their related orderProducts
        $orders = Order::with('orderProducts')->get();

        // Pass the $orders variable to the view
        return view('admin.admin', ['orders' => $orders]);
    }
    public function admin()
    {
        $orders = order::with('orderproducts')->get();
        return view('admin.admin', ['orders' => $orders]);
    }
    
    
public function create()
{
    return view('admin.blogadd');
}
public function store(Request $request)
{
    $validatedData = $request->all();

    // Handle image upload
    if ($request->hasFile('image')&& $request->file('image')->isValid()) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('public/upload/', $filename);
        $validatedData['image'] = 'public/upload/' . $filename;
    }


    // Create the new blog post
    Blog::create($validatedData);

    return redirect()->route('blogadd')->with('success', 'Blog post created successfully');
}

public function addVegetableForm()
{
    return view('admin.vegeadd');
}

public function storeVegetable(Request $request)
{

  
    $validatedData = $request->all();
    if ($request->hasFile('image')&& $request->file('image')->isValid()) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('public/upload/', $filename);
        $validatedData['image'] = 'public/upload/' . $filename;
    }


    VegeModel::create($validatedData);

    return redirect()->route('vege')->with('success', 'Vegetable added successfully');
}

public function vegelist()
{
    $vegetables = VegeModel::all();
    return view('admin.view_vege', compact('vegetables'));
}


public function destroy($id)
{
    $vegetable = VegeModel::find($id);

    if (!$vegetable) {
        return redirect()->route('vegelist')->with('error', 'Vegetable not found');
    }

    $vegetable->delete();

    return redirect()->route('vegelist')->with('success', 'Vegetable deleted successfully');
}
public function edit($id)
{
    $vegetable = VegeModel::find($id);

    if (!$vegetable) {
        return redirect()->route('vegelist')->with('error', 'Vegetable not found');
    }

    return view('admin.edit_vege', compact('vegetable'));
}

public function update(Request $request, $id)
{
    $vegetable = VegeModel::find($id);

    if (!$vegetable) {
        return redirect()->route('vegelist')->with('error', 'Vegetable not found');
    }

   
    $validatedData = $request->all();
    // Handle image upload
    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('public/upload/', $filename);
        $validatedData['image'] = 'public/upload/' . $filename;
    }

    // Update the vegetable record with the new data
    $vegetable->update($validatedData);

    return redirect()->route('vegelist')->with('success', 'Vegetable updated successfully');
}







public function fish()
    {
        return view('admin.fishadd');// This assumes you have a Blade view named 'create' for displaying the form.
    }


    public function fishtore(Request $request)
    {
       
        $validatedData = $request->all();
        if ($request->hasFile('image')&& $request->file('image')->isValid()) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('public/upload/', $filename);
            $validatedData['image'] = 'public/upload/' . $filename;
        }
        FishModel::create($validatedData);
        // Redirect back to the form with a success message
        return redirect()->route('fish')->with('success', 'Vegetable added successfully!');

        
    }
  
    public function fishlist()
{
    $fish = FishModel::all(); // Change variable name to $fish
    return view('admin.view_fish', compact('fish'));
}



public function destroyF($id)
{
    $fish = FishModel::find($id);

    if (!$fish) {
        return redirect()->route('fishlist')->with('error', 'Vegetable not found');
    }

    $fish->delete();

    return redirect()->route('fishlist')->with('success', 'Vegetable deleted successfully');
}
public function editF($id)
{
    $fish = FishModel::find($id);

    if (!$fish) {
        return redirect()->route('fishlist')->with('error', 'Vegetable not found');
    }

    return view('admin.edit_fish', compact('fish'));
}

public function updateF(Request $request, $id)
{
    $fish = FishModel::find($id);

    if (!$fish) {
        return redirect()->route('fishlist')->with('error', 'Vegetable not found');
    }

   
    $validatedData = $request->all();
    // Handle image upload
    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('public/upload/', $filename);
        $validatedData['image'] = 'public/upload/' . $filename;
    }

    // Update the vegetable record with the new data
    $fish->update($validatedData);

    return redirect()->route('fishlist')->with('success', 'Vegetable updated successfully');
}



    public function dairy()
    {
        return view('admin.dairyadd');// This assumes you have a Blade view named 'create' for displaying the form.
    }


    public function dairystore(Request $request)
    {
       
        $validatedData = $request->all();
        if ($request->hasFile('image')&& $request->file('image')->isValid()) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('public/upload/', $filename);
            $validatedData['image'] = 'public/upload/' . $filename;
        }
    DairyModel::create($validatedData);
        // Redirect back to the form with a success message
        return redirect()->route('dairy')->with('success', 'Vegetable added successfully!');

        
    }

    public function dairylist()
    {
        $dairy = DairyModel::all(); // Change variable name to $fish
        return view('admin.view_dairy', compact('dairy'));
    }
    

    public function destroyD($id)
    {
        $dairy = DairyModel::find($id);
    
        if (!$dairy) {
            return redirect()->route('dairylist')->with('error', 'Vegetable not found');
        }
    
        $dairy->delete();
    
        return redirect()->route('dairylist')->with('success', 'Vegetable deleted successfully');
    }
    public function editD($id)
    {
        $dairy = DairyModel::find($id);

        if (!$dairy) {
            return redirect()->route('dairy.list')->with('error', 'Dairy product not found');
        }
        return view('admin.edit_dairy', compact('dairy'));
    }
    
    public function updateD(Request $request, $id)
    {
        $dairy = DairyModel::find($id);
    
        if (!$dairy) {
            return redirect()->route('dairylist')->with('error', 'Dairy product not found');
        }
    
        $validatedData = $request->all();

    
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('public/upload/', $filename);
            $validatedData['image'] = 'public/upload/' . $filename;
        }
    
        $dairy->update($validatedData);
    
        return redirect()->route('dairylist')->with('success', 'Dairy product updated successfully');
    }
    
    public function trendy()
    {
        return view('admin.trendyadd');// This assumes you have a Blade view named 'create' for displaying the form.
    }


    public function trendystore(Request $request)
    {
       
        $validatedData = $request->all();
        if ($request->hasFile('image')&& $request->file('image')->isValid()) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('public/upload/', $filename);
            $validatedData['image'] = 'public/upload/' . $filename;
        }
        TrendyModel::create($validatedData);
        // Redirect back to the form with a success message
        return redirect()->route('trendy')->with('success', 'Vegetable added successfully!');

        
    }

    public function trendylist()
    {
        $trendy = TrendyModel::all(); // Change variable name to $fish
        return view('admin.view_trendy', compact('trendy'));
    }

    public function destroyT($id)
    {
        $trendy = TrendyModel::find($id);
    
        if (!$trendy) {
            return redirect()->route('trendylist')->with('error', 'Vegetable not found');
        }
    
        $trendy->delete();
    
        return redirect()->route('trendylist')->with('success', 'Vegetable deleted successfully');
    }
    public function editT($id)
    {
        $trendy = TrendyModel::find($id);
    
        if (!$trendy) {
            return redirect()->route('trendylist')->with('error', 'Vegetable not found');
        }
    
        return view('admin.edit_trendy', compact('trendy'));
    }
    
    public function updateT(Request $request, $id)
    {
        $trendy = TrendyModel::find($id);
    
        if (!$trendy) {
            return redirect()->route('trendylist')->with('error', 'Vegetable not found');
        }
    
       
        $validatedData = $request->all();
        // Handle image upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('public/upload/', $filename);
            $validatedData['image'] = 'public/upload/' . $filename;
        }
    
        // Update the vegetable record with the new data
        $trendy->update($validatedData);
    
        return redirect()->route('trendylist')->with('success', 'Vegetable updated successfully');
    }

    public function fruit()
    {
        return view('admin.fruitadd');// This assumes you have a Blade view named 'create' for displaying the form.
    }
    public function fruitstore(Request $request)
    {
       
        $validatedData = $request->all();
        if ($request->hasFile('image')&& $request->file('image')->isValid()) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('public/upload/', $filename);
            $validatedData['image'] = 'public/upload/' . $filename;
        }
        FruitModel::create($validatedData);
        // Redirect back to the form with a success message
        return redirect()->route('fruit')->with('success', 'Vegetable added successfully!');

        
    }
    public function fruitlist()
    {
        $fruit = FruitModel::all(); // Change variable name to $fish
        return view('admin.view_fruit', compact('fruit'));
    }

    public function destroyfr($id)
    {
        $fruit = FruitModel::find($id);
    
        if (!$fruit) {
            return redirect()->route('fruitlist')->with('error', 'Vegetable not found');
        }
    
        $fruit->delete();
    
        return redirect()->route('fruitlist')->with('success', 'Vegetable deleted successfully');
    }
    public function editfr($id)
    {
        $fruit = FruitModel::find($id);
    
        if (!$fruit) {
            return redirect()->route('fruitlist')->with('error', 'Vegetable not found');
        }
    
        return view('admin.edit_fruit', compact('fruit'));
    }
    
    public function updatefr(Request $request, $id)
    {
        $fruit = FruitModel::find($id);
    
        if (!$fruit) {
            return redirect()->route('fruitlist')->with('error', 'Vegetable not found');
        }
    
       
        $validatedData = $request->all();
        // Handle image upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('public/upload/', $filename);
            $validatedData['image'] = 'public/upload/' . $filename;
        }
    
        // Update the vegetable record with the new data
        $fruit->update($validatedData);
    
        return redirect()->route('fruitlist')->with('success', 'Vegetable updated successfully');
    }





    public function createForm()
    {
        return view('admin.meta');
    }

    public function storee(Request $request)
    {

        $da = $request->all(); 
        MetaData::create($da);


        return redirect()->route('add-meta-data')->with('success', 'Vegetable updated successfully');

        
    }

    public function metalist()
    {
        $meta = Metadata::all(); // Change variable name to $fish
        return view('admin.view_meta', compact('meta'));
    }

    
    public function destroymeta($id)
    {
        $fruit = MetaData::find($id);
    
        if (!$fruit) {
            return redirect()->route('metalist')->with('error', 'Vegetable not found');
        }
    
        $fruit->delete();
    
        return redirect()->route('metalist')->with('success', 'Vegetable deleted successfully');
    }
    public function editmeta($id)
    {
        $fruit = MetaData::find($id);
    
        if (!$fruit) {
            return redirect()->route('admin.view_meta')->with('error', 'Vegetable not found');
        }
    
        return view('admin.edit_meta', compact('fruit'));
    }
    
    public function updatemeta(Request $request, $id)
    {
        $fruit = MetaData::find($id);
    
        if (!$fruit) {
            return redirect()->route('admin.view_meta')->with('error', 'Vegetable not found');
        }
    
       
        $validatedData = $request->all();
      
        // Update the vegetable record with the new data
        $fruit->update($validatedData);
    
        return redirect()->route('metalist')->with('success', 'Vegetable updated successfully');
    }

}
