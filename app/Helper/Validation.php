<?php namespace App\Helper;

use App\Model\DB;

class Validation
{
    /**
     * @var
     */
    private $errors;
    /**
     * @var
     */
    private $data;


    /**
     * @param array $data
     * @param array $rules
     * @return bool
     */
    public function make(Array $data, Array $rules)
    {
        $valid = true;
        $this->data = $data;

        foreach ($rules as $item => $ruleset) {
            $ruleset = explode("|", $ruleset);

            foreach($ruleset as $rule) {
               $pos = strpos($rule, ":");

               if ($pos !== false) {
                   $parametr = substr($rule, $pos + 1);
                   $rule = substr($rule, 0, $pos);
               } else {
                   $parametr = "";
               }

               $MethodName = ucfirst($rule);

               $value = isset($data[$item]) ? $data[$item] : null;


               if(method_exists($this, $MethodName)) {
                   if($this->{$MethodName}($item, $value, $parametr) == false) {
                       $valid = false;
                       break;
                   }
               }
            }
        }

        return $valid;
    }

    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param $item
     * @param $value
     * @return bool
     */
    private function Required($item, $value)
    {
        if(strlen($value) == 0) {
            $this->errors[$item][] = "Please fill the {$item} field";
            return false;
        }
        return true;
    }

    /**
     * @param $item
     * @param $value
     * @return bool
     */
    private function Email($item, $value)
    {
        if (! filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$item][] = "The Email Format is incorrect";
            return false;
        }
        return true;
    }

    /**
     * @param $item
     * @param $value
     * @param $param
     * @return bool
     */
    private function Min($item, $value, $param)
    {
        if (strlen($value) < $param) {
            $this->errors[$item][] = "The length of {$item} can't be less than {$param} characters!";
            return false;
        }
        return true;
    }


    /**
     * @param $item
     * @param $value
     * @param $param
     * @return bool
     */
    private function Max($item, $value, $param)
    {
        if (strlen($value) > $param) {
            $this->errors[$item][] = "The length of {$item} can't be more than {$param} characters";
            return false;
        }
        return true;
    }

    /**
     * @param $item
     * @param $value
     * @param $param
     * @return bool
     */
    private function Confirm($item, $value, $param)
    {
        $orginal = isset($this->data[$item]) ? $this->data[$item] : null;
        $confirm = isset($this->data[$param]) ? $this->data[$param] : null;

        if ($orginal !== $confirm) {
            $this->errors[$item][] = "{$item} is not equal with {$param}";
            return false;
        }
        return true;
    }

    private function Unique($item, $value, $param)
    {
        $db = new DB();

        if(is_null($param))
            return false;

        $db->from($param);

        if ($db->find($item, $value) != false) {
            $this->errors[$item][] = "This Email is already registered!";
            return false;
        }
        return true;
    }


}