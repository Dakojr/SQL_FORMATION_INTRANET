<?php

    abstract class Entity
    {
        protected function hydrate($data)
        {
            foreach($data as $x => $value)
            {
                $tab_x = explode("_", $x);

                $methode = "set".ucwords($tab_x[0]);
                
                if(method_exists($this, $methode))
                {
                    $this->$methode($value);
                }
            }
        }
    }