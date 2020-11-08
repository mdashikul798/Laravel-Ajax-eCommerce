<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function manageSlider(){
        return view('dashboard.pages.slider');
    }

    public function allSlider(){
        $allSlider = Slider::orderBy('id', 'DESC')->get();
       //Fatching data from database

       $output = '';

       if(count($allSlider) > 0){
           $output = '
               <thead>
                   <tr>
                   <th scope="col">SL No.</th>
                   <th>Slider Image</th>
                   <th>Title</th>
                   <th>Sub-Title</th>
                   <th>Price start text</th>
                   <th>Description</th>
                   <th>Action</th>
                   </tr>
               </thead>';
           $stNum = 1;
           foreach($allSlider as $row){
               $output .= "
                   <tr>
                       <th scope='row' width=8px;>{$stNum}</th>
                       <td style='display:none'>{$row["id"]}</td>
                       <td width=130px;><img src=".asset('public/uploads/slider/'.$row["slider_img"])." class='slider_img'></td>
                       <td>{$row["title"]}</td>
                       <td>{$row["sub_title"]}</td>
                       <td>{$row["price_text"]}</td>
                       <td width=20%>".substr($row['description'], 10)."</td>
                       <td width=100px;>
                            <a href='#' id='slider_edit' data-edit_slider='{$row["id"]}' title='Edit slider' class='btn btn-warning btn-sm'><i class='fa fa-pencil'></i></a>
                           <button class='btn-danger btn-sm' data-slider_id='{$row["id"]}' id='slider_delete'><i class='fa fa-trash-o'></i></button></td>
                       </td>
                       </tr>";
                   $stNum ++;
           }
       }
       // End of fatching data from database
       return response($output);
   }

   public function saveSlider(Request $request){
       $request->validate([
           'slider_image' => 'required'
       ]);
        $image = $request->file('slider_image');
        $fileExt = $image->getClientOriginalExtension();
        $fileName = date('ymdhis.') . $fileExt;
        $image->move(public_path('uploads/slider'), $fileName);

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->slider_img = $fileName;
        $slider->price_text = $request->price_text;
        $slider->description = $request->description;
        $slider->save();
        if($slider){
            echo 1;
        }else{
            echo 0;
        }
        return redirect()->back()->with('success', ' Slider added successfully!');
   }

   public function editSlider(Request $request, $sliderId){
    // $sliderId = $_POST['id'];
    $slider = Slider::find($sliderId);

    $slider->title = $request->title;
    $slider->sub_title = $request->sub_title;
    $slider->price_text = $request->price_text;
    $slider->description = $request->description;
    $slider->save();
    return back()->with('success', ' Slider updated successfully!');
   }

   public function deleteSlider(){
    $sliderId = $_GET['id'];
    $slider = Slider::find($sliderId);
    $imageUrl = $slider->slider_img;

    $uploadedImg = 'public/uploads/slider/' . $imageUrl;
    unlink($uploadedImg);
    $slider->delete();

    if($slider){
        echo 1;
    }else{
        echo 0;
    }
   }

}
