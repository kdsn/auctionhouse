<?php

class Validate
{
    private $_passed = false;
    private $_errors = [];
    private $_name = null;
    private $_db = null;

    public function check($source, $items = [])
    {
        foreach ($items as $item => $rules)
        {
            foreach ($rules as $rule => $rule_value)
            {
                //echo "{$item} {$rule} must be {$rule_value}<br />";

                $value = trim($source[$item]);

                if ($rule === 'name')
                {
                    $this->_name = $rule_value;
                }

                if ($rule === 'required' && empty($value))
                {
                    $this->addError("Feltet \"{$this->_name}\" er påkrævet.");
                }
                elseif ( ! empty($value))
                {
                    switch ($rule)
                    {
                        case 'min':
                            if (strlen($value) < $rule_value)
                            {
                                $this->addError("\"{$this->_name}\" skal være minimum {$rule_value} karaktere.");
                            }
                            break;

                        case 'max':
                            if (strlen($value) > $rule_value)
                            {
                                $this->addError("\"{$this->_name}\" må ikke være på mere end {$rule_value} karaktere.");
                            }
                            break;

                        case 'unique':
                            $check = App::get('database')->selectCount(
                                    "$rule_value","$item", "$value"
                                    );

                            if ($check)
                            {
                                $this->addError("\"{$this->_name}\" er ikke unikt.");
                            }
                            break;

                        case 'matches':
                            if ($value != $source[$rule_value])
                            {
                                $this->addError("\"{$this->_name}\" skal være det samme som \"{$rule_value}\".");
                            }
                            break;
                    }
                }
            }
        }
        if (empty($this->_errors))
        {
            $this->_passed = true;
        }
        return $this;
    }

    private function addError($error)
    {
        $this->_errors[] = $error;
    }

    public function errors()
    {
        return $this->_errors;
    }

    public function passed()
    {
        return $this->_passed;
    }
}