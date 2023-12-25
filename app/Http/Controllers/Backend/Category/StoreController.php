<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreReques;
use App\Models\Category;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreReques $reques)
    {
        $data = $reques->validated();

        $image = $data['image'];
        $data['image'] = 'upload/categories/'. hexdec(uniqid()) . '.' . $data['image']->getClientOriginalExtension();
        $image->move(public_path('upload/categories'), $data['image']);

        $data['slug'] = strtolower(str_replace(' ', '-', $data['title']));
        $notification = [
            'message' => 'The category was added successfully',
            'alert-type' => 'success'
        ];

        Category::create($data);
        return redirect()->route('admin.category.index')->with($notification);
    }
}
