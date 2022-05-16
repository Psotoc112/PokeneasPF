<?php

namespace App\Http\Controllers;
class PokeneasController extends Controller
{
    public static $pokeneas = [

        ["id"=>"1", "name"=>"Picanea", "altura"=>"1.1", "habilidad" => "Robo electrico", "imagen" => "", "frase" => "pica pica"],
        
        ["id"=>"2", "name"=>"Squinea", "altura"=>"1.2", "habilidad" => "Robo acuatico", "imagen" => "", "frase" => "sqrt(ans)"],
        
        ["id"=>"3", "name"=>"Charmanea", "altura"=>"1.3", "habilidad" => "Robo caliente", "imagen" => "", "frase" => "no lo se bro no soy calculadora"],
        
        ["id"=>"4", "name"=>"Luginea", "altura"=>"1.4", "habilidad" => "Chirreo maximo", "imagen" => "", "frase" => "usted se caracteriza por dos cosas"],

        ["id"=>"5", "name"=>"Snornea", "altura"=>"1.5", "habilidad" => "Bostezo nea", "imagen" => "", "frase" => "no coma cuento"],
        
        ["id"=>"6", "name"=>"Eevenea", "altura"=>"1.6", "habilidad" => "Atraco", "imagen" => "", "frase" => "no sea tan horny"],
        
        ["id"=>"7", "name"=>"Dittnea", "altura"=>"1.7", "habilidad" => "Robo silecioso", "imagen" => "", "frase" => "si? ah bueno"],
        
    ];

    public function index()
    {
        $totalPokeneas = (count(PokeneasController::$pokeneas));
        $randomNumber = (rand(0,($totalPokeneas-1)));
        $randomPokenea = PokeneasController::$pokeneas[$randomNumber];
        unset($randomPokenea["imagen"]);
        return response()->json(['Pokenea' => $randomPokenea]);
    }
    public function frases(){
        $totalPokeneas = (count(PokeneasController::$pokeneas));
        $randomNumber = (rand(0,($totalPokeneas-1)));
        $randomFrase = PokeneasController::$pokeneas[$randomNumber]["frase"];
        $randomImg = PokeneasController::$pokeneas[$randomNumber]["imagen"];
        $imageData = base64_encode(file_get_contents($randomImg));
        echo '<img src="data:image/jpeg;base64,'.$imageData.'">';
        echo '<br>';
        return response()->json(['Pokenea' => $randomFrase,'docker_id' => gethostbyname(gethostname())]);
    }
}
