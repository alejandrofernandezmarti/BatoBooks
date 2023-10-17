<?php

use exceptions\InvalidFormatException;

class Module{

    private string $code;
    private string $cliteral;
    private string $vliteral;

    private string $idCycle;
    public function __construct($code,$cliteral,$vliteral,$idCycle){
        $this->code=$code;
        $this->idCycle=$idCycle;
        $this->vliteral=$vliteral;
        $this->cliteral=$cliteral;
    }

    public function getCode(): string{
        return $this->code;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
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

    public function getIdCycle(): string
    {
        return $this->idCycle;
    }

    public function setIdCycle(string $idCycle): void
    {
        $this->idCycle = $idCycle;
    }

    public function toJson() {
        return json_encode(get_object_vars($this));
    }
    public function __toString(): string
    {
        return "<div class='Module'><p><strong>Code:</strong> ". $this->code ."</p>" .
            "<p><strong>Cliteral:</strong> ". $this->cliteral ."</p>" .
            "<p><strong>Vliteral:</strong> ". $this->vliteral ."</p>" .
            "<p><strong>ID Cycle:</strong> ". $this->idCycle ."</p></div>";
    }
    public static function loadModulesFromFile($filename){
        $modules = null;

        if (($handle = fopen($filename,"r")) !== false){
            while (($data = fgetcsv($handle,1000,",")) != false){
                try {
                    if (count($data) !== 4){
                     //  throw new InvalidFormatException("Dada de la línia inválida: " . implode(", ", $data));
                    }
                    $idCycle = $data[0];
                    $code = $data[1];
                    $cliteral = $data[2];
                    $vliteral = $data[3];



                    $modules[$idCycle] = new Module(
                        $code,$cliteral,$vliteral,$idCycle
                    );
                }catch (InvalidFormatException $e){
                    echo 'InvalidFormatException: ', $e->getMessage();
                    continue;
                }
            }
            fclose($handle);
        }
        return $modules;
    }
}