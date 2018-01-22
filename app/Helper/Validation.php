<?php namespace App\Helper;

class Validation
{
    private $errors;

    private $data;

    public function make(Array $data, Array $rules)
    {
        $valid = true;

        $this->data = $data;

        foreach($rules as $item => $ruleset) {
            $ruleset = explode("|",$ruleset);

            foreach ($ruleset as $rule) {
                $pos = strpos($rule, ":");

                if ($pos !== false ) {
                    $parameter = substr($rule, $pos+1);
                    $rule = substr($rule, 0 , $pos);
                } else {
                    $parameter = "";
                }

                $methodName = ucfirst($rule);

                $value = isset($data[$item]) ? $data[$item] : null;

                if(method_exists($this, $methodName)) {
                    if($this->{$methodName}($item, $value, $parameter) == false ) {
                        $valid = false;
                        break;
                    }
                }

            }
        }



        return $valid;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    private function required($item, $value)
    {
        if (strlen($value) == 0) {
            $this->errors[$item][] = "پر کردن فیلد {$item} الزامیست";
            return false;
        }
        return true;
    }

    private function email($item, $value) {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$item][] = "فرمت ایمیل وارد شده صحیح نیست";
            return false;
        }
        return true;
    }

    private function min($item, $value, $param) {
        if (strlen($value) < $param) {
            $this->errors[$item][] = "طول فیلد {$item} کمتر از {$param} کاراکتر است";
            return false;
        }
        return true;
    }

    private function max($item, $value, $param) {

        if (strlen($value) > $param) {
            $this->errors[$item][] = "طول فیلد {$item} نمیتواند بیشتر از {$param} کاراکتر باشد";
            return false;
        }
        return true;
    }

    private function confirm($item, $value, $param) {
        $orginal = isset($this->data[$item]) ? $this->data[$item] : null;
        $confirm = isset($this->data[$param]) ? $this->data[$param] : null;

        if ($orginal !== $confirm) {
            $this->errors[$item][] = "فیلد {$item} با {$param} برابر نیست";
            return false;
        }
        return true;
    }

}