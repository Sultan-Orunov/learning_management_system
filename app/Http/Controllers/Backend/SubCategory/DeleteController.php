<?php

namespace App\Http\Controllers\Backend\SubCategory;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;

class DeleteController extends Controller
{
    public function __invoke(SubCategory $subcategory)
    {
        $notification = [
            'message' => 'The sub category was successfully deleted',
            'alert-type' => 'success'
        ];

        $subcategory->delete();
        return redirect()->back()->with($notification);
    }
}
