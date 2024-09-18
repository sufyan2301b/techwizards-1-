<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\registration;
use App\Models\product;
use App\Models\addedprod;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class mycontroller extends Controller
{
    //
    public function insertdata(Request $input){
        // echo $input->username;
        $table = new registration();

        $table->name = $input->username;
        $table->email = $input->useremail;
        $table->password = $input->userpassword;
        $table->age = $input->userage;
        $table->save();
        return redirect()->back()->with("successmessage","Record has been inserted");
    }
    public function insertproduct(Request $input){
        // echo $input->username;
        $table = new product();

        $table->name = $input->name;
        $table->price = $input->price;
        $table->category = $input->product;
        $image=$input->file('image');
        $ext= rand().".".$image->getClientOriginalName();
        $image->move("Images/",$ext);
        $table->image=$ext;
        $table->save();
        return redirect()->back()->with("successmessage","Record has been inserted");
    }
    public function getdata()
    {
        $records = registration::get();
        return view("record",compact('records'));

    }
    public function getproducts()
    {
        $records = product::get();
        return view("AdminDashboard.prods",compact('records'));

    }
    public function delrecord($id)
    {
       $specificuser = registration::find($id);
       $specificuser->delete();
       return redirect('/fetch');
    }
    public function updateuser($id)
    {
        $specificuser = registration::find($id);
        return view("update",compact('specificuser'));
    }
    public function update(Request $req)
    {
        $specificid =  registration::find($req->userid);
        $specificid->name = $req->username;
        $specificid->email = $req->useremail;
        $specificid->password = $req->userpass;
        $specificid->age = $req->userage;
        $specificid->save();
        return redirect('/fetch');
    }
    public function insertproducts(Request $req)
    {
        $product_name = $req->post('pname');
        $product_price = $req->post('pprice');
        $quantity = $req->post('quantity');
        $total = $req->post('total');
        $userid = $req->post('uid');

        $table = new addedprod();
        $table->Product_Name = $product_name;
        $table->Product_Price = $product_price;
        $table->Product_Quantity = $quantity;
        $table->Product_Total = $total;
        $table->User_Id = $userid;
        $table->save();
        return redirect()->back()->with("atc","Record has been inserted");
    }
    public function checkout()
    {
        $atc = DB::table('addedprods')->where('User_Id',Auth::User()->id)->get();
        return view('checkout',compact('atc'));


    }
    public function deleteproduct($id)
    {
        $prd = addedprod::find($id);
        $prd->delete();
        return redirect('/checkout');
    }
}
