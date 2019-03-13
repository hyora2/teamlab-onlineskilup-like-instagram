<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\userdatas;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Illuminate\Support\Facades\DB;

/**
 *
 */
class ProfileController extends Controller
{
  public function index(){

    if((session()->has('github_id')) == null){
      redirect('welcome');
    }

    $token = session('github_token');
    $username = session('github_id');
      $iconData = base64_encode(file_get_contents('https://github.com/' . $username . '.png'));

    return view('profile', ["token" => $token, "username" => $username, "iconData" => $iconData]);
  }

}