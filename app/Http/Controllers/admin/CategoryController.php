<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('backend.category.index');
    }

    public function createfrom()
    {
        return view('backend.category.createfrom');
    }

    public function edit()
    {
        return view('backend.category.edit');
    }

    public function insert(Request $request)
        {
    //ป้องกัยการกรอกข้อมูลผ่านฟอร์ม
        $validated = $request->validate([
        'name' => 'required|unique:categories|max:255',
        ],
    [
        'name.required' => 'กรุณากรอกข้อมูลประเภทสินค้า',
        'name.unique' => 'ชื่อนี้มีอยู่ในฐานข้อมูลแล้ว',
        'name.max' => 'กรอกข้อมูลได้ 255 ตัวอักษร',
    ]);
    //การบันทึกข้อมูล
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        alert()->success('บันทึกข้อมูลเสร็จแล้ว','ข้อมูลนี้ถูกบันทึกแล้ว');
        return redirect('admin/category/index');
    }
}
