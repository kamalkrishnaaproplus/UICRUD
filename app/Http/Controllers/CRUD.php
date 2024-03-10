<?php

namespace App\Http\Controllers;

use App\Models\Docnum;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CRUD extends Controller
{


    public function loadDocumentNumber($doctype)
    {
        $documentNumber = Docnum::getDocumentNumber($doctype);
        return response()->json(['documentNumber' => $documentNumber]);
    }
    
    public function getCategories(Request $request)
    {
        // Fetch all categories
        $categories = Category::all();

        // Return categories as JSON response
        return response()->json($categories);
    }

    // CRUD controller method for handling form submission
    // CRUD controller method for handling form submission
   // CRUD controller method for handling form submission
   public function createProduct(Request $request)
   {

    dd($request->all());
       // Validate form data
    //    $request->validate([
    //        'product_id' => 'required|string',
    //        'product_name' => 'required|string',
    //        'Category' => 'required', // Ensure Category exists in the categories table
    //        'mrp' => 'required|numeric|min:1',
    //        'p_rate' => 'required|numeric|min:1',
    //        's_rate' => 'required|numeric|min:1',
    //        'tax_percentage' => 'required|numeric|min:1',
    //        'tax_type' => 'required|in:Included,Excluded',
    //        'taxable' => 'required|in:Yes,No',
    //        'active_status' => 'required|in:Active,Inactive' // Validate active status
    //    ]);
   
    //    // Determine active status
    //    $activeStatus = $request->input('active_status');
   
    //    // Create new product record
    //    $product = Product::create([
    //        'ProductID' => $request->input('product_id'),
    //        'ProductName' => $request->input('product_name'),
    //        'CategoryID' => $request->input('Category'),
    //        'MRP' => $request->input('mrp'),
    //        'PRate' => $request->input('p_rate'),
    //        'SRate' => $request->input('s_rate'),
    //        'TaxPercentage' => $request->input('tax_percentage'),
    //        'Taxable' => $request->input('taxable'),
    //        'TaxType' => $request->input('tax_type'),
    //        'ActiveStatus' => $activeStatus, // Store active status
    //        'DFlag' => 0,
    //        'CreatedOn' => now(),
    //        'UpdatedOn' => null,
    //        'DeletedOn' => null,
    //    ]);
   
    //    // Call function from DocNum model to update the document number
    //    Docnum::updateDocumentNumber('Product');
   
    //    return response()->json(['message' => 'Product created successfully'], 200);
   }
   
    


}
