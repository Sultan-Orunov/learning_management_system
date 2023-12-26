<?php

namespace App\Http\Controllers\Backend\SubCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubCategory\StoreReques;
use App\Models\SubCategory;

class StoreController extends Controller
{
    public function __invoke(StoreReques $reques)
    {
        $data = $reques->validated();
        $data['slug'] = strtolower(str_replace(' ', '-', $data['title']));

        $notification = [
            'message' => 'The sub category was added successfully',
            'alert-type' => 'success'
        ];
        SubCategory::create($data);
        return redirect()->route('admin.subcategory.index')->with($notification);
    }
}
