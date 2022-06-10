<?php
interface Universalclasss{
    public function add($string);
    public function call();
}

class ClassOne implements Universalclasss {
    private $classString;
    public function add($string)
    {
        $this->classString = $string;
    }

    public function call(){
        return get_class($this).': '.$this->classString;
    }

}


class ClassTwo implements Universalclasss {
    private $classString;
    public function add($string)
    {
        $this->classString = $string;
    }

    public function call(){
        return get_class($this).': '.$this->classString;
    }

}

class ClassIoC {
    private $sentence;

    public function __construct(Universalclasss $class){
        $class->add('This is the sentence!');
        $this->sentence = $class->call();
    }

    public function getSentence(){
        return $this->sentence;
    }
}

$instanceOne = new ClassIoC(new ClassOne());
echo $instanceOne->getSentence().'<br>';

$instanceTwo = new ClassIoC(new ClassTwo());
echo $instanceTwo->getSentence().'<br>';

?>