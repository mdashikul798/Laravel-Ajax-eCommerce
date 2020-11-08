<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dashboard\Category;
use App\Models\Dashboard\SubCategory;
use DB;

class CategoryController extends Controller
{
    public function index(){
        return view('dashboard.pages.category');
    }
    public function allCategory(){
         $allCate = Category::orderBy('id', 'DESC')->get();
        //Fatching data from database

        $output = '';

        if(count($allCate) > 0){
            $output = '
                <thead>
                    <tr>
                    <th scope="col">SL No.</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Description</th>
                    <th>Action</th>
                    </tr>
                </thead>';
            $stNum = 1;
            foreach($allCate as $row){
                $output .= "
                    <tr>
                        <th scope='row'>{$stNum}</th>
                        <td>{$row["category_name"]}</td>
                       <td>{$row["description"]}</td>
                        <td>
                            <button class='btn-danger' data-id='{$row["id"]}' id='category_delete'><i class='fa fa-trash-o'></i></button></td>
                        </td>
                        </tr>";
                    $stNum ++;
            }
        }
        // End of fatching data from database
        return response($output);
    }

    public function saveCategory(){
        $cateName = $_POST['cate_name'];
        $desc = $_POST['description'];

        $category = new Category();
        $category->category_name = $cateName;
        $category->description = $desc;
        $category->save();

        if($category){
            echo 1;
        }else{
            echo 0;
        }

    }

    public function deleteCategory(){
        $cateId = $_GET['id'];
        $category = Category::find($cateId);
        $category->delete();
        if($category){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function subCategory(){
        $allCate = Category::orderBy('category_name', 'ASC')->where('status', '1')->get();
        return view('dashboard.pages.sub_category', compact('allCate'));
    }
    public function allSubCategory(){
        //$allSub = SubCategory::orderBy('id', 'DESC')->get();
        $allSub = DB::table('sub_categories')->orderBy('id', 'DESC')
                ->join('categories', 'sub_categories.category_id', '=', 'categories.id')
                ->select('sub_categories.*', 'categories.category_name')
                ->get();

        $output ='';
        if(count($allSub) > 0){
            $output = "
            <thead>
                <tr>
                <th>SL No.</th>
                <th>Sub-Category Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Action</th>
                </tr>
            </thead>
            ";
            $stNum = 1;
            foreach($allSub as $sub){
                $output .= "
                <tr>
                    <th scope='row'>{$stNum}</th>
                    <td>{$sub->sub_category}</td>
                   <td>{$sub->category_name}</td>
                   <td>{$sub->description}</td>
                    <td>
                        <button class='btn-danger' data-sub_id='{$sub->id}' id='sub_category_delete'><i class='fa fa-trash-o'></i></button></td>
                    </td>
                    </tr>";
                $stNum ++;
            }
        }
        // $array = json_decode(json_encode($output), true);
         return response($output);

    }
    public function saveSubCategory(){
        $subName = $_POST['sub_cate_name'];
        $cateId = $_POST['cate_id'];
        $description = $_POST['description'];

        $subCate = new SubCategory();
        $subCate->sub_category = $subName;
        $subCate->category_id = $cateId;
        $subCate->description = $description;
        $subCate->save();
        if($subCate){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function deleteSubCategory(){
        $subId = $_POST['id'];
        $subCategory = SubCategory::find($subId);
        $subCategory->delete();

        if($subCategory){
            echo 1;
        }else{
            echo 0;
        }
    }
}
