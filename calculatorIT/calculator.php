<?php 

abstract class Operation {
  protected $operand_1;
  protected $operand_2;
  public function __construct($o1, $o2) {
    // Make sure we're working with numbers...
    if (!is_numeric($o1) || !is_numeric($o2)) {
      throw new Exception('Non-numeric operand.');
    }
    
    // Assign passed values to member variables
    $this->operand_1 = $o1;
    $this->operand_2 = $o2;
  }
  public abstract function operate();
  public abstract function getEquation(); 
}

// Addition subclass inherits from Operation
class Addition extends Operation {
  public function operate() {
    return $this->operand_1 + $this->operand_2;
  }
  public function getEquation() {
    return $this->operand_1 . ' + ' . $this->operand_2 . ' = ' . $this->operate();
  }
}




// Add subclasses for Subtraction, Multiplication and Division here

class Subtraction extends Operation {
  public function operate() {
    return $this->operand_1 - $this->operand_2;
  }
  public function getEquation() {
    return $this->operand_1 . ' - ' . $this->operand_2 . ' = ' . $this->operate();
  }
}

class Multiplication extends Operation {
  public function operate() {
    return $this->operand_1 * $this->operand_2;
  }
  public function getEquation() {
    return $this->operand_1 . ' * ' . $this-> operand_2 . ' = ' . $this->operate();
  }
  
}

class Division extends Operation {
  public function operate() {
    return $this->operand_1 / $this->operand_2;
  }
  public function getEquation() {
    return $this->operand_1 . ' / ' . $this->operand_2 . ' = ' . $this->operate();
}

class square_root extends Operation{
    public function operate() {
        return sqrt($this->operand_1);
    }
    public function getEquation() {
        return 'sqrt(' . $this->operand_1 . ') = ' . $this->operate();
    }
}

class squared extends Operation{
    public function operate() {
        return $this->operand_1 * $this->operand_1;
    }
    public function getEquation() {
        return $this->operand_1 . '^2 = ' . $this->operate();
    }
}

class power extends Operation{
  public function operate() {
      return pow($this->operand_1, $this->operand_2);
  }
  public function getEquation(){
    return $this->operand_1 . '^' . $this->operand_2 . ' = ' . $this->operate();
  }
}

class log10 extends Operation{
  public function operate() {
      return log10($this->operand_1);
  }
  public function getEquation(){
    return 'log10(' . $this->operand_1 . ') = ' . $this->operate();
  }
}

class ln extends Operation{
  public function operate() {
      return log($this->operand_1);
  }
  public function getEquation(){
    return 'ln(' . $this->operand_1 . ') = ' . $this->operate();
  }
}
//10^x
class ten_to_the_x extends Operation{
  public function operate() {
      return pow(10, $this->operand_1);
  }
  public function getEquation(){
    return '10^' . $this->operand_1 . ' = ' . $this->operate();
  }
}
//e^x
class e_to_the_x extends Operation{
  public function operate() {
      return pow(M_E, $this->operand_1);
  }
  public function getEquation(){
    return 'e^' . $this->operand_1 . ' = ' . $this->operate();
  }
}

class sin extends Operation{
  public function operate() {
      return sin($this->operand_1);
  }
  public function getEquation(){
    return 'sin(' . $this->operand_1 . ') = ' . $this->operate();
  }
}

class cos extends Operation{
  public function operate() {
      return cos($this->operand_1);
  }
  public function getEquation(){
    return 'cos(' . $this->operand_1 . ') = ' . $this->operate();
  }
}

class tan extends Operation{
  public function operate() {
      return tan($this->operand_1);
  }
  public function getEquation(){
    return 'tan(' . $this->operand_1 . ') = ' . $this->operate();
  }
}
// Some debugs - uncomment these to see what is happening...
// echo '$_POST print_r=>',print_r($_POST);
// echo "<br>",'$_POST vardump=>',var_dump($_POST);
// echo '<br/>$_POST is ', (isset($_POST) ? 'set' : 'NOT set'), "<br/>";
// echo "<br/>---";


// Check to make sure that POST was received 
// upon initial load, the page will be sent back via the initial GET at which time
// the $_POST array will not have values - trying to access it will give undefined message

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $o1 = $_POST['op1'];
    $o2 = $_POST['op2'];
  }
  $err = Array();


// Instantiate an object for each operation based on the values returned on the form
// For example, check to make sure that $_POST is set and then check its value and 
// instantiate its object
// 
// The Add is done below.  Go ahead and finish the remiannig functions.  
// Then tell me if there is a way to do this without the ifs
// We might cover such a way on Tuesday...

  try {
    if (isset($_POST['add']) && $_POST['add'] == 'Add') {
      $op = new Addition($o1, $o2);
    }


// Put code for subtraction, multiplication, and division here

    if(isset($_POST['sub']) && $_POST['sub'] == 'Sub') {
        $op = new Subtraction($o1, $o2);
    }
    if(isset($_POST['mult']) && $_POST['mult'] == 'Mult') {
        $op = new Multiplication($o1, $o2);
      }
    }
    if(isset($_POST['divi']) && $_POST['divi'] == 'Div') {
        $op = new Division($o1, $o2);
    }
    if(isset($_POST['sqrt']) && $_POST['sqrt'] == 'sqrt') {
        $op = new square_root($o1, $o2);
    }
    if(isset($_POST['squared']) && $_POST['squared'] == 'squared') {
        $op = new squared($o1, $o2);
    }
    if(isset($_POST['power']) && $_POST['power'] == 'power') {
        $op = new power($o1, $o2);
    }
    if(isset($_POST['log10']) && $_POST['log10'] == 'log10') {
        $op = new log10($o1, $o2);
    }
    if(isset($_POST['ln']) && $_POST['ln'] == 'ln') {
        $op = new ln($o1, $o2);
    }
    if(isset($_POST['ten_to_the_x']) && $_POST['ten_to_the_x'] == 'ten_to_the_x') {
        $op = new ten_to_the_x($o1, $o2);
    }
    if(isset($_POST['e_to_the_x']) && $_POST['e_to_the_x'] == 'e_to_the_x') {
        $op = new e_to_the_x($o1, $o2);
    }
    if(isset($_POST['sin']) && $_POST['sin'] == 'sin') {
        $op = new sin($o1, $o2);
    }
    if(isset($_POST['cos']) && $_POST['cos'] == 'cos') {
        $op = new cos($o1, $o2);
    }
    if(isset($_POST['tan']) && $_POST['tan'] == 'tan') {
        $op = new tan($o1, $o2);
    }

  
  }catch (Exception $e) {
    $err[] = $e->getMessage();
  }
?>

<!doctype html>
<html>
<head>
<title>PHP Calculator</title>
</head>
<body>
  <pre id="result">
  <?php 
    if (isset($op)) {
      try {
        echo $op->getEquation();
      }
      catch (Exception $e) { 
        $err[] = $e->getMessage();
      }
    }

    foreach($err as $error) {
        echo $error . "\n";
    } 
  ?>
  </pre>
  <form method="post" action="calculator.php">
    <input type="text" name="op1" id="name" value="" />
    <input type="text" name="op2" id="name" value="" />
    <br/>
    <!-- Only one of these will be set with their respective value at a time -->
    <input type="submit" name="add" value="Add" />  
    <input type="submit" name="sub" value="Subtract" />  
    <input type="submit" name="mult" value="Multiply" />  
    <input type="submit" name="divi" value="Divide" /> 
    <input type="submit" name="squared" value="Square" /> 
    <input type="submit" name="sqrt" value="Square Root" />
    <input type="submit" name="power" value="Power" />
    <input type="submit" name="log10" value="Log10" />
    <input type="submit" name="ln" value="ln" />
    <input type="submit" name="ten_to_the_x" value="10^x" />
    <input type="submit" name="e_to_the_x" value="e^x" />
    <input type="submit" name="sin" value="sin" />
    <input type="submit" name="cos" value="cos" />
    <input type="submit" name="tan" value="tan"/>
  </form>
</body>
</html>

