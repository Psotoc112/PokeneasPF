<?php

namespace App\Http\Controllers;
class PokeneasController extends Controller
{
    public static $pokeneas = array(

        ["id"=>"1", "name"=>"Picanea", "height"=>"1.1", "skill" => "Robo electrico", "image" => "https://storage.googleapis.com/pokeneaspf/nea1.jpg", "philosophyQuote" => "pica pica"],
        
        ["id"=>"2", "name"=>"Squinea", "height"=>"1.2", "skill" => "Robo acuatico", "image" => "https://storage.googleapis.com/pokeneaspf/nea2.jpg", "philosophyQuote" => "sqrt(ans)"],
        
        ["id"=>"3", "name"=>"Charmanea", "height"=>"1.3", "skill" => "Robo caliente", "image" => "https://storage.googleapis.com/pokeneaspf/nea3.jpg", "philosophyQuote" => "no lo se bro no soy calculadora"],
        
        ["id"=>"4", "name"=>"Luginea", "height"=>"1.4", "skill" => "Chirreo maximo", "image" => "https://storage.googleapis.com/pokeneaspf/nea4.jpg", "philosophyQuote" => "usted se caracteriza por dos cosas"],

        ["id"=>"5", "name"=>"Snornea", "height"=>"1.5", "skill" => "Bostezo nea", "image" => "https://storage.googleapis.com/pokeneaspf/nea5.jpg", "philosophyQuote" => "no coma cuento"],
        
        ["id"=>"6", "name"=>"Eevenea", "height"=>"1.6", "skill" => "Atraco", "image" => "https://storage.googleapis.com/pokeneaspf/nea6.jpg", "philosophyQuote" => "no sea tan horny"],
        
        ["id"=>"7", "name"=>"Dittnea", "height"=>"1.7", "skill" => "Robo silecioso", "image" => "https://storage.googleapis.com/pokeneaspf/nea7.jpg", "philosophyQuote" => "si? ah bueno"],
        
    );

    public function generateRandomPokenea($callerMethod)
    {
        $totalPokeneas = (count(PokeneasController::$pokeneas));
        $randomNumber = (rand(0, ($totalPokeneas - 1)));
        $randomPokenea = PokeneasController::$pokeneas[$randomNumber];
        $pokeInfo = array();
        if ($callerMethod == "showPokenea") {
            $pokeInfo["id"] = $randomPokenea["id"];
            $pokeInfo["name"] = $randomPokenea["name"];
            $pokeInfo["height"] = $randomPokenea["height"];
            $pokeInfo["skill"] = $randomPokenea["skill"];
            $pokeInfo["image"] = $randomPokenea["image"];
            $pokeInfo["philosophyQuote"] = $randomPokenea["philosophyQuote"];
        } else {
            $pokeInfo["image"] = $randomPokenea["image"];
            $pokeInfo["philosophyQuote"] = $randomPokenea["philosophyQuote"];
        }
        return $pokeInfo;
    }

    public function showPokenea()
    {
        $containerID = gethostbyname(gethostname());
        $jsonData["pokenea"] = PokeneasController::generateRandomPokenea("showPokenea");
        $jsonData["containerID"] = $containerID;
        return response()->json(['jsonData' => $jsonData]);
    }

    public function showMultimedia()
    {
        $containerID = gethostbyname(gethostname());
        $pokeMultimedia = PokeneasController::generateRandomPokenea("showMultimedia");
        $data["containerID"] = $containerID;
        $data["pokeMultimedia"] = $pokeMultimedia;
        return view('pokeContent')->with("data", $data);
    }
}
