<?php
class generalController
{
    // property declaration
    private $text = 'Test class Sum = ';
    private $num1 = 1;
    private $num2 = 2;

    // method declaration
    public function sum($x, $y)
    {
	    $z = $x + $y;
	    echo "<br /><br />Sum class = ". $z;
    }

    public function displayCalc()
    {
        echo $this->text;
        echo $this->num1 + $this->num2;
    }

    public function writeMsg()
    {
	    echo "<br /><br />Hello world class!";
    }

    public function stringLength($string)
    {
        $stringSize = strlen($string);
        echo '<br /><br />String length of entered string "'.$string.'" is: '.$stringSize;
    }

    //Create private file writing function to be accessed only by public functions
    private function createFile($fcontent)
    {
        $submitDate = Date('Y-m-d-H-i-s');
        $submitDate .= "__";
        $submitDate .= $_SERVER['REMOTE_ADDR'];
        $myfile = fopen("model/fileCreations/$submitDate.txt", "w") or die("Unable to open file!");
        $fcontent = strip_tags($fcontent); //Make sure no code is injected into created file
		fwrite($myfile, $fcontent);
        fclose($myfile);
        echo "<br /><br />File created with the following text: ".$fcontent;
    }

    //Create public function to access private file creation function
    public function newFile($FcontentVariableToPassToCreateFileFunction)
    {
     $FcontentVariableToPassToCreateFileFunction .= "\n\n File Created: ".Date('Y-m-d-H-i-s'); //appends date to bottom of file content
     $FcontentVariableToPassToCreateFileFunction .= "\n\n IP Address: ".$_SERVER['REMOTE_ADDR']; //appends ip to bottom of file content
     return $this->createFile($FcontentVariableToPassToCreateFileFunction);
    }

}
?>

