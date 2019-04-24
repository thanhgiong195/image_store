<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\FoodRequest;
use App\Food;
use App\Like;
use App\User;

class FoodController extends Controller {

  public function __construct() {
    return $this->middleware('auth');
  }

  public function changeLanguage($language) {
    \Session::put('website_language', $language);
    return redirect()->back();
  }

  public function index(){
    $foods = DB::table('foods')->paginate(6);
    return view('food.index', ['foods' => $foods]);
  }

  public function show($id){
    $food = Food::find($id);
    $countlike = Like::where([['food_id',$id],['like', true]])->count();
    $checkULike = Like::where([['food_id',$id],['user_id', Auth::id()],['like', true]])->count();
    $checkLike = $checkULike > 0 ? true : false;
    $auth_food = User::find($food->user_id);

    return view('food.show', ['food' => $food, 'countlike' => $countlike, 'checkLike' => $checkLike, 'auth_food' => $auth_food]);
  }

  public function create(){
    return view('food.create');
  }

  public function store(FoodRequest $request){
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $name = $request->food_name;
    $description = $request->food_description;
    $image = $request->food_image;
    $user_id = Auth::id();
    
    $dataInsertToDatabase = array(
      'name'  => $name,
      'description' => $description,
      'user_id' => $user_id,
      'image_url' => $image,
      'created_at' => date('Y-m-d H:i:s'),
      'updated_at' => date('Y-m-d H:i:s'),
    );
    Food::insert($dataInsertToDatabase);

    return redirect('food')->with('success', 'Add Food success');
  }

  public function edit($id){
    $food = Food::find($id);
    return view('food.update', ['food' => $food]);
  }

  public function update(FoodRequest $request){
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $id = $request->id;
    $name = $request->food_name;
    $description = $request->food_description;
    $user_id = Auth::id();
    $image = $request->food_image;

    $dataUpdateToDatabase = array(
      'name'  => $name,
      'description' => $description,
      'user_id' => $user_id,
      'image_url' => $image,
      'updated_at' => date('Y-m-d H:i:s'),
    );
    DB::table('foods')->where('id', $id)->update($dataUpdateToDatabase);

    return redirect('food/'.$id)->with('success', 'Update success');
  }
  
  public function destroy($id){
    DB::table('foods')->where('id', $id)->delete();
    return redirect('/');
  }
}