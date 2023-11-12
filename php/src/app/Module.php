<?php

namespace BatBook;
use BatBook\Exempcions\InvalidFormatException;
use PDO;

class Module{
    static string $nameTable = 'modules';
    public function __construct(
        private string $code='',
        private string $cliteral='',
        private string $vliteral='',
        private string $idCycle=''
    )
    {
    }

    /**
     * @throws InvalidFormatException
     */

    public static function getModulesInArray(){
        $data = [];

        try {
            $newConexion = new Connection();
            $conexion = $newConexion->getConection();

            $sql = "SELECT * FROM modules";

            $sentencia = $conexion -> prepare($sql);
            $sentencia -> setFetchMode(PDO::FETCH_CLASS,Module::class);
            $sentencia ->execute();

            $data = $sentencia -> fetchAll();

            while ($module = $sentencia -> fetch()){
                $data[] = new Module($module->code,$module->cliteral,$module->vliteral,$module->idCycle);
            }

        }catch (\PDOException $e){
            throw new \Exception("Error de la consulta: "  . $e->getMessage());
        }
        return $data;
    }
    public static function getModuleById($idModule){
        $values['code'] = $idModule;
        return QueryBuilder::sql(Module::class,$values);
    }

    public static function loadModulesFromFile($fileName): array
    {
        $file = fopen($fileName, "r");
        $modules = [];
        if ($file) {
            try {
                while (($content = fgetcsv($file)) !== false) {
                    if (count($content) !== 4) {
                        throw new InvalidFormatException("Dada de línia invàlida: " . implode(", ", $content));
                    }
                    $modules[] = new Module($content[0], $content[1], $content[2], intval($content[3]));

                }
            } catch (Exception $e) {
                echo "InvalidFormatException: " . $e->getMessage(), "<br>";
            }
        }
        fclose($file);
        return $modules;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function getCliteral(): string
    {
        return $this->cliteral;
    }

    public function setCliteral(string $cliteral): void
    {
        $this->cliteral = $cliteral;
    }

    public function getVliteral(): string
    {
        return $this->vliteral;
    }

    public function setVliteral(string $vliteral): void
    {
        $this->vliteral = $vliteral;
    }

    public function getIdCycle(): string
    {
        return $this->idCycle;
    }

    public function setIdCycle(string $idCycle): void
    {
        $this->idCycle = $idCycle;
    }


    public function __toString(): string
    {
        return "<div class='Module'><p><strong>Code:</strong> $this->code</p>" .
            "<p><strong>Cliteral:</strong> $this->cliteral</p>" .
            "<p><strong>Vliteral:</strong> $this->vliteral</p>" .
            "<p><strong>ID Cycle:</strong> $this->idCycle</p></div>";
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