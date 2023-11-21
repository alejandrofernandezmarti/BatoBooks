<?php

namespace BatBook;

class Familia{

    static string $nameTable = 'families';
    private int $id;
    public function __construct(
        private string $vliteral = '',
        private string $cliteral=''
    )
    {
    }

    public static function getNameTable(): string
    {
        return self::$nameTable;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getVliteral(): string
    {
        return $this->vliteral;
    }

    public function getCliteral(): string
    {
        return $this->cliteral;
    }



}