<?php

namespace BatBook;
use BatBook\Exempcions\InvalidFormatException;

class Course
{
    public function __construct(
        private string $cycle,
        private int    $idFamily,
        private string $vliteral,
        private string $cliteral
    )
    {
    }

    /**
     * @throws InvalidFormatException
     */
    public static function loadCoursesFromFile($archivo)
    {
        if (file_exists($archivo)) {
            $courses = array();
            if (($fp = fopen($archivo, "r")) !== false) {
                while (($data = fgetcsv($fp, 1000, ",")) !== false) {
                    try {
                        if (count($data) !== 5) {
                            throw new InvalidFormatException ("Dada de Linia invàlida: " . implode(",", $data));
                        }
                        $idCycle = $data[0];
                        $cycle = $data[1];
                        $idFamily = $data[2];
                        $vliteral = $data[3];
                        $cliteral = $data[4];

                        $courses[$idCycle] = new Course($cycle, $idFamily, $vliteral, $cliteral);
                    } catch (InvalidFormatException $e) {
                        echo "InvalidFormatException: " . $e->getMessage(), "<br/>";
                        continue;
                    }
                }
                fclose($fp);
                return $courses;
            } else {
                return "No se ha podido abrir el archivo.";
            }
        } else {
            return "El archivo no existe.";
        }
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

    public function __toString(): string
    {
        return "<div class='course'>
                    <h3>Cycle: $this->cycle</h3>
                    <h5>ID Family: $this->idFamily<h5>
                    <h6>Vliteral: $this->vliteral</h6>
                    <h6>Cliteral: $this->cliteral</h6>
                </div>";
    }

    public function toJson()
    {
        $json = [];
        foreach ($this as $clave => $valor) {
            $json[$clave] = $valor;
        }
        return json_encode($json);
    }
}