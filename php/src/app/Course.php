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
    public static function loadCoursesFromFile($fileName): array
    {
        $file = fopen($fileName, "r");
        $courses = [];
        if ($file) {
            try {
                while (($content = fgetcsv($file)) !== false) {
                    if (count($content) !== 5) {
                        throw new InvalidFormatException("Dada de línia invàlida: " . implode(", ", $content));
                    }
                    $courses[] = new Course($content[1], intval($content[2]), $content[3], $content[4]);
                }
            } catch (Exception $e) {
                echo 'InvalidFormatException: ', $e->getMessage(), "<br>";
            }
        }
        fclose($file);
        return $courses;
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