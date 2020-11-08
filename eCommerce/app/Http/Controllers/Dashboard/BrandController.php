<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        return view('dashboard.pages.brand');
    }

    public function allBrand(){
        $allBrand = Brand::orderBy('id', 'DESC')->get();
       //Fatching data from database

       $output = '';

       if(count($allBrand) > 0){
           $output = '
               <thead>
                   <tr>
                   <th scope="col">SL No.</th>
                   <th scope="col">Brand Name</th>
                   <th scope="col">Description</th>
                   <th>Action</th>
                   </tr>
               </thead>';
           $stNum = 1;
           foreach($allBrand as $row){
               $output .= "
                   <tr>
                       <th scope='row'>{$stNum}</th>
                       <td>{$row["name"]}</td>
                      <td>{$row["description"]}</td>
                       <td>
                           <button class='btn-danger' data-brand_id='{$row["id"]}' id='brand_delete'><i class='fa fa-trash-o'></i></button></td>
                       </td>
                       </tr>";
                   $stNum ++;
           }
       }
       // End of fatching data from database
       return response($output);
   }

   public function saveBrand(){
       $brandName = $_POST['brand'];
       $desc = $_POST['description'];

       $brand = new Brand();
       $brand->name = $brandName;
       $brand->description = $desc;
       $brand->save();

       if($brand){
           echo 1;
       }else{
           echo 0;
       }

   }

   public function deleteBrand(){
       $brandId = $_GET['id'];
       $brand = Brand::find($brandId);
       $brand->delete();
       if($brand){
           echo 1;
       }else{
           echo 0;
       }
   }
}
