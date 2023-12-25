<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreReques;
use App\Models\Category;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Category $category)
    {
        @unlink($category->image);

        $notification = [
            'message' => 'The category was successfully deleted',
            'alert-type' => 'success'
        ];

        $category->delete();
        return redirect()->back()->with($notification);
    }
}
