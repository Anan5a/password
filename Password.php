<?php
class Password{
    private $password;
    //Validation rules
    //min length,max length,hashing algorithm
    protected $validationconf=array('6','32',PASSWORD_BCRYPT);
    public $errors=array();
    
    function setValidationRules(array $rules)
    {
       if(is_array($rules))
        {
            $this->validationconf=$rules;
        }
    }
    function validate($password,$conf='')
    {
        if(is_array($conf))
        {
            $this->validationconf=$conf;
        }
        if(strlen($password)<$this->validationconf[0])
        {
            $this->errors['tooShort']='The password is too short.';
        }
        else if(strlen($password)>$this->validationconf[1])
        {
            $this->errors['tooLong']='The password is too long.';
        }
        else if(!preg_match_all('$\S*(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])$',$password))
        {
            $this->errors['weak']='The password is weak';
        }
        else
        {
            //ok. assign the password
            $this->password=$password;
        }
        
    }
    
    //hashing the password
    //it will return a safe hash
    function hash()
    {
        $hp= password_hash($this->password,$this->validationconf[2]);
        if($hp)
            {
            return $hp;
            }
        else {
        echo "<h1>Unable to perform hashing on this server :(</h1>";
        }
    }
        //validate a paassword against hash fetched from server
    function verify($pwd,$sfh)
    {
      if(password_verify($pwd,$sfh))
        {
            return true;
        }
      else
        {
            return false;
        }
    }
}
?>  
