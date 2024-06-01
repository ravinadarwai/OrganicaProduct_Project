<?php

namespace App\Http\Controllers;
use App\Models\Adminmodel;


use App\Models\dairymodel;
use App\Models\FishModel;
use App\Models\FruitModel;
use App\Models\TrendyModel;
use App\Models\VegeModel;
use Illuminate\Http\Request;

class Apicontroller extends Controller
{
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
    dairymodel::create($validatedData);
        // Redirect back to the form with a success message
        return response()->json(['status' => true]);


        
    }

    public function dairylist()
    {
        $dairy = DairyModel::all();// Change variable name to $fish
        return response()->json(['status' => true , 'data'=> $dairy]);
    }
    

    public function destroyD($id)
    {
        $dairy = DairyModel::find($id);
    
        if (!$dairy) {
            return redirect()->route('dairylist')->with('error', 'Vegetable not found');
        }
    
        $dairy->delete();
    
        return response()->json(['status' => true ]);
    }
    public function editD($id)
    {
        $dairy = DairyModel::find($id);

        if (!$dairy) {
            return redirect()->route('dairy.list')->with('error', 'Dairy product not found');
        }
        return response()->json(['status' => true , 'data'=> $dairy]);
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
    
        return response()->json(['status' => true ]);
    }
    





      //  end of dairy product




      // starting of vegetable 





      
public function addVegetableForm()
{
    return response()->json(['status' => true ]);
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

    return response()->json(['status' => true ]);
}

public function vegelist()
{
    $vegetables = VegeModel::all();
    return response()->json(['status' => true , 'data'=> $vegetables]);
}


public function destroy($id)
{
    $vegetable = VegeModel::find($id);

    if (!$vegetable) {
        return redirect()->route('vegelist')->with('error', 'Vegetable not found');
    }

    $vegetable->delete();
    return response()->json(['status' => true ]);


    }
public function edit($id)
{
    $vegetable = VegeModel::find($id);

    if (!$vegetable) {
        return redirect()->route('vegelist')->with('error', 'Vegetable not found');
    }

    return response()->json(['status' => true , 'data'=> $vegetable]);
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

    return response()->json(['status' => true]);
}





//  end of vegetable        .............................




//start of fish..............................................






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
        return response()->json(['status' => true]);

        
    }
  
    public function fishlist()
{
    $fish = FishModel::all(); // Change variable name to $fish
    return response()->json(['status' => true  , 'data' => $fish] );
}



public function destroyF($id)
{
    $fish = FishModel::find($id);

    if (!$fish) {
        return redirect()->route('fishlist')->with('error', 'Vegetable not found');
    }

    $fish->delete();

    return response()->json(['status' => true]);
}
public function editF($id)
{
    $fish = FishModel::find($id);

    if (!$fish) {
        return redirect()->route('fishlist')->with('error', 'Vegetable not found');
    }

    return response()->json(['status' => true]);
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

    return response()->json(['status' => true]);
}






///   end of fish



///   start of trendy         





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
    return response()->json(['status' => true]);

    
}

public function trendylist()
{
    $trendy = TrendyModel::all(); // Change variable name to $fish
    return response()->json(['status' => true , 'data' => $trendy]);
}

public function destroyT($id)
{
    $trendy = TrendyModel::find($id);

    if (!$trendy) {
        return redirect()->route('trendylist')->with('error', 'Vegetable not found');
    }

    $trendy->delete();

    return response()->json(['status' => true]);
}
public function editT($id)
{
    $trendy = TrendyModel::find($id);

    if (!$trendy) {
        return redirect()->route('trendylist')->with('error', 'Vegetable not found');
    }

    return response()->json(['status' => true]);

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

    return response()->json(['status' => true]);
}



     // end  of trendy







     //start of fruit





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
         return response()->json(['status' => true]);
 
         
     }
     public function fruitlist()
     {
         $fruit = FruitModel::all(); // Change variable name to $fish
         return response()->json(['status' => true , 'data'=> $fruit]);
        }
 
     public function destroyfr($id)
     {
         $fruit = FruitModel::find($id);
     
         if (!$fruit) {
             return redirect()->route('fruitlist')->with('error', 'Vegetable not found');
         }
     
         $fruit->delete();
     
         return response()->json(['status' => true]);
        }
     public function editfr($id)
     {
         $fruit = FruitModel::find($id);
     
         if (!$fruit) {
             return redirect()->route('fruitlist')->with('error', 'Vegetable not found');
         }
     
         return response()->json(['status' => true]);
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
     
         return response()->json(['status' => true]);
        }




}
