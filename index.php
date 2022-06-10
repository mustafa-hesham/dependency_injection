<?php
interface UniversalMethods{
    public function add($string);
    public function call();
}

class classOne implements UniversalMethods {
    private $classString;
    public function add($string)
    {
        $this->classString = $string;
    }

    public function call(){
        return get_class($this).' '.$this->classString;
    }

}


class classTwo implements UniversalMethods {
    private $classString;
    public function add($string)
    {
        $this->classString = $string;
    }

    public function call(){
        return get_class($this).' '.$this->classString;
    }

}

class classIoC {
    private $sentence;

    public function __construct(UniversalMethods $method){
        $method->add('This is the sentence!');
        $this->sentence = $method->call();
    }

    public function getSentence(){
        return $this->sentence;
    }

}

$classOneObj = new classOne();
$classTwoObj = new classTwo();

$instanceOne = new classIoC($classOneObj);
echo $instanceOne->getSentence().'<br>';

$instanceTwo = new classIoC($classTwoObj);
echo $instanceTwo->getSentence().'<br>';





?>