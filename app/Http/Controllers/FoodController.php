<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Food;

class FoodController extends Controller {

  public function __construct() {
    return $this->middleware('auth');
  }

  public function index(){
    $foods = DB::table('foods')->orderBy('id','desc')->paginate(6);
    return view('food.index', ['foods' => $foods]);
  }

  public function show($id){
    $food = Food::find($id);
    return view('food.show', ['food' => $food]);
  }

  public function create(){
    return view('food.create');
  }

  public function store(Request $request){
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $name = $request->food_name;
    $description = $request->food_description;
    $image = $request->food_image;
    
    $dataInsertToDatabase = array(
      'name'  => $name,
      'description' => $description,
      'image_url' => $image,
      'created_at' => date('Y-m-d H:i:s'),
      'updated_at' => date('Y-m-d H:i:s'),
    );
    $insertData = Food::insert($dataInsertToDatabase);
    return redirect('food')->with('success', 'Add Food success');
  }

  public function edit($id){
    $food = Food::find($id);
    return view('food.update', ['food' => $food]);
  }

  public function update(Request $request){
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $id = $request->id;
    $name = $request->food_name;
    $description = $request->food_description;
    $image = $request->food_image;
    $dataUpdateToDatabase = array(
      'name'  => $name,
      'description' => $description,
      'image_url' => $image,
      'created_at' => date('Y-m-d H:i:s'),
      'updated_at' => date('Y-m-d H:i:s'),
    );
    DB::table('foods')->where('id', $id)->update($dataUpdateToDatabase);
    return redirect('food/'.$id)->with('success', 'Update success');
  }
  
  public function destroy($id){
    DB::table('foods')->where('id', $id)->delete();
    return redirect('food');
  }
}