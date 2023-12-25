<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateReques;
use App\Models\Category;

class UpdateController extends Controller
{
    public function __invoke(UpdateReques $request, Category $category)
    {
        $data = $request->validated();

        if (isset($data['image'])){
            $image = $data['image'];
            @unlink(public_path($category->image));
            $data['image'] = 'upload/categories/'. hexdec(uniqid()) . '.' . $data['image']->getClientOriginalExtension();
            $image->move(public_path('upload/categories'), $data['image']);

            $data['slug'] = strtolower(str_replace(' ', '-', $data['title']));
        }else{
            $data['slug'] = strtolower(str_replace(' ', '-', $data['title']));
        }
        $notification = [
            'message' => 'The category was updated successfully',
            'alert-type' => 'success'
        ];

        $category->update($data);
        return redirect()->route('admin.category.index')->with($notification);
    }
}
