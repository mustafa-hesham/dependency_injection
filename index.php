<?php
interface UniversalMethods{
    public function add($string);
    public function call();
}

class ClassOne implements UniversalMethods {
    private $classString;
    public function add($string)
    {
        $this->classString = $string;
    }

    public function call(){
        return get_class($this).' '.$this->classString;
    }

}


class ClassTwo implements UniversalMethods {
    private $classString;
    public function add($string)
    {
        $this->classString = $string;
    }

    public function call(){
        return get_class($this).' '.$this->classString;
    }

}

class ClassIoC {
    private $sentence;

    public function __construct(UniversalMethods $method){
        $method->add('This is the sentence!');
        $this->sentence = $method->call();
    }

    public function getSentence(){
        return $this->sentence;
    }

}

$ClassOneObj = new ClassOne();
$ClassTwoObj = new ClassTwo();

$instanceOne = new ClassIoC($ClassOneObj);
echo $instanceOne->getSentence().'<br>';

$instanceTwo = new ClassIoC($ClassTwoObj);
echo $instanceTwo->getSentence().'<br>';

?>