<?php

use exceptions\InvalidFormatException;

class Course{
    private string $cycle;
    private int $idFamily;
    private string $vliteral;
    private string $cliteral;
    public function __construct($cycle,$idFamily,$vliteral,$cliteral){
        $this->cycle=$cycle;
        $this->idFamily=$idFamily;
        $this->vliteral=$vliteral;
        $this->cliteral=$cliteral;
    }

    public function getCycle(): string
    {
        return $this->cycle;
    }
    public function setCycle(string $cycle): void
    {
        $this->cycle = $cycle;
    }
    public function getIdFamily(): int
    {
        return $this->idFamily;
    }
    public function setIdFamily(int $idFamily): void
    {
        $this->idFamily = $idFamily;
    }
    public function getVliteral(): string
    {
        return $this->vliteral;
    }
    public function setVliteral(string $vliteral): void
    {
        $this->vliteral = $vliteral;
    }
    public function getCliteral(): string
    {
        return $this->cliteral;
    }
    public function setCliteral(string $cliteral): void
    {
        $this->cliteral = $cliteral;
    }

    public function __toString(): string{
        return "<div clas='course'>
                    <h3>Cycle: ".$this->cycle."</h3>
                    <h5>ID Family: ".$this->idFamily."<h5>
                    <h6>Vliteral: ".$this->vliteral."</h6>
                    <h6>Cliteral: ".$this->cliteral."</h6>
                </div>";
    }
    public function toJson() {
        return json_encode(get_object_vars($this));
    }


    public static function loadCoursesFromFile($filename){
        $courses = null;

        if (($handle = fopen($filename,"r")) !== false){
            while (($data = fgetcsv($handle,1000,",")) != false){
                try {
                    if (count($data) !== 5){
                       //   throw new InvalidFormatException("Dada de la línia inválida: " . implode(", ", $data));
                    }
                    $idCycle = $data[0];
                    $cycle = $data[1];
                    $idFamily = $data[2];
                    $vliteral = $data[3];
                    $cliteral = $data[4];


                    $courses[$idCycle] = new Course(
                        $cycle,$idFamily,$vliteral,$cliteral
                    );
                }catch (InvalidFormatException $e){
                    echo 'InvalidFormatException: ', $e->getMessage();
                    continue;
                }
            }
            fclose($handle);
        }
        return $courses;
    }

}