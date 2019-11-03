<?php


namespace App\Http\Controllers;


use App\Models\User;

class UserController extends Controller
{
public function showAction($id)
{
    $user= User::find($id);
    echo $user->email."<br>";
    echo $user->meno." ".$user->priezvisko."<br>";
    echo $user->vek."<br>";
    echo $user->updated_at;

}
    public function insertAction()
    {
$user = new User();
$user->meno=str_random(5);
        $user->meno=str_random(5);
        $user->priezvisko=str_random(5);
        $user->email= $user->meno.".".$user->priezvisko."@gmail.com";
        $user->vek=mt_rand(1,80);
        $user->heslo=str_random(20);

        $user->save();

    }
    public function updateAction($id)
    {
$user=User::where("id", "=", $id)->first();
$user->update(["vek"=>mt_rand(1,80)]);
    }
    public function deleteAction($id)
    {
$user=User::find($id);
$user->delete();
    }
    public function showAlllAction()
    {
        $users= User::all();
        foreach ($users as $user){
            echo $user->email." ".$user->vek." ".$user->updated_at."<br>";
        }
    }
}