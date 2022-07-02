<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Carbon;
use Image;
use Auth;

class ServiceController extends Controller
{
    public function Service(){
        $services = Service::latest()->paginate(4);
        return view('admin.service.index',compact('services'));
    }

    public function AddService(){
        return view('admin.service.create');
    }
 public function StoreService(Request $request){

    $service_image = $request->file('image');
    $name_gen = hexdec(uniqid()).'.'.$service_image->getClientOriginalExtension();
    Image::make($service_image)->resize(1920,1088)->save('image/service/'.$name_gen);

    $last_img = 'image/service/'.$name_gen;
    Service::insert([
        'image' => $last_img,
        'title' => $request->title,
        'description' => $request->description,

        'created_at' => Carbon::now()
    ]);

    return Redirect()->route('home.service')->with('success','Service Inserted Successfully.');


  }

public function EditService($id){
    $services = Service::find($id);
    return view('admin.service.edit',compact('services'));

}

public function UpdateService(Request $request, $id){



   $old_image = $request->old_image;
   $service_image = $request->file('image');

   if($service_image){


   $name_gen = hexdec(uniqid());
   $img_ext = strtolower($service_image->getClientOriginalExtension());
   $img_name = $name_gen.'.'.$img_ext;
   $up_location = 'image/service/';
   $last_img = $up_location.$img_name;
   $service_image->move($up_location,$img_name);

   unlink($old_image);
   Service::find($id)->update([
    'image' => $last_img,
    'title' => $request->title,
    'description' => $request->description,
    'created_at' => Carbon::now()

   ]);
   return Redirect()->back()->with('success','Service Updated Successfully');

   }else{

    Service::find($id)->update([
        //'image' => $last_img,
    'title' => $request->title,
    'description' => $request->description,
    'created_at' => Carbon::now()

       ]);
       return Redirect()->back()->with('success','Service Updated Successfully');


   }



}

public function DeleteService($id){
    $delete = Service::find($id)->Delete();
    return Redirect()->back()->with('success','Service Deleted Successfully!');

}



}

