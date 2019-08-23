<?php

class Formulaire
{
    private $html ="";

    public function __construct($action, $method){

        $this->html.="<form action='$action' method='$method'>";
    }

    public function input($type,$nom,$placeholder=null,$value=null){
        $typeAutorise=['text','esalMail','password','date'];
        if (in_array($type, $typeAutorise)){
            $this->html.="<input type='$type' name='$nom' placeholder='$placeholder' value='$value'>";
        }
        else{
            echo "le type $type n'est pas autorisé<br/>";
        }
    }

    public function select($nom,$tbl,$selected = null,$placeholder=null){
        $this->html.="<select name='$nom'><option disabled selected>$placeholder</option>";
        foreach ($tbl as $index => $element){
            if ($index == $selected){
                $this->html.="<option value='$index' selected>$element</option>";
            }
            else{
                $this->html.="<option value='$index'>$element</option>";
            }
        }
        $this->html.='</select>';
    }

    public function radio($nom,$tbl,$selected=null){
        foreach ($tbl as $index => $element){
            if ($index == $selected){
                $this->html.="<label><input type='radio' name='$nom' checked>$element</label>";
            }
            else{
                $this->html.="<label><input type='radio' name='$nom'>$element</label>";
            }
        }
    }

    public function checkbox($nom,$value,$label,$coche=false){
        if ($coche){
            $this->html.="<label><input type='checkbox' name='$nom' value='$value' checked>$label</label>";
        }
        else{
            $this->html.="<label><input type='checkbox' name='$nom' value='$value'>$label</label>";
        }

    }

    public function label($for, $value){
        $this->html.="<label for='$for'>$value</label>";
    }

    public function submit($nom, $value){
        $this->html.="<input type='submit' value='$value' name='$nom'>";
    }

    public function render(){
        return $this->html."</form>";
    }
}