# password
A php class to handle your password
**Usage**
It's very easy to use. See the example

```php
require 'Password.php';
//Create an instance
$pwd=new Password();
//set rules. it's not required. format is array(min_length,max_length,hashing algorithm)
$pwd->setValidationRules(array(6,32,PASSWORD_BCRYPT));
//set the password. it'll perform a validation in server. you can get errors using 
//$pwd->errors; It'll return an array 
$pwd->validate("password");
//it generate the hash of your password. store it in database
$pwd->hash();
//it'll verify a password against a hash fetched from db or anywhere
$pwd->verify($password,$hashedpassword);

**That's it. You're done**

Thank you

# Please report a bug if found
