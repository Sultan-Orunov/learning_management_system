<?php

namespace App\Http\Controllers\Backend\SubCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubCategory\UpdateReques;
use App\Models\SubCategory;

class UpdateController extends Controller
{
    public function __invoke(UpdateReques $request, SubCategory $subcategory)
    {
        $data = $request->validated();
        $data['slug'] = strtolower(str_replace(' ', '-', $data['title']));
        $notification = [
            'message' => 'The sub category was updated successfully',
            'alert-type' => 'success'
        ];
        $subcategory->update($data);
        return redirect()->route('admin.subcategory.index')->with($notification);
    }
}
