<?php

abstract class Entity
{
    
    protected function hydrate(array $values){
        foreach ($values as $key => $value){
            $methodName = 'set'.ucfirst($key);
            if(method_exists($this,$methodName)){
                $this->$methodName($value);
            }
        }
    }

    protected function tronque($str,$long){
        if(iconv_strlen($str) > $long){
            $str = substr($str,0,$long);
        }
        return $str;
    }

}
