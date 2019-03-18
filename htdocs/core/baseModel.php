<?php
class Model
{
    public function tryMap($data)
    {
        $rules = $this->rules();
        foreach($rules as $key => $field)
        {
            $this->{$field} = $data[$field];
        }
        
        return true;
    }
    
    public function validate()
    {
        if(empty($this->name) || empty($this->password))
        {
            return false;
        }
        
        return true;
    }
}