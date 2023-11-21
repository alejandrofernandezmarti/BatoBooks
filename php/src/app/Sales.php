<?php

namespace BatBook;

class Sales {
    static string $nameTable = 'sales';


    private int $id = 0;
    private $idBook;
    private $idUser;
    public function __construct($idBook='', $idUser='') {
        $this->idBook = $idBook;
        $this->idUser = $idUser;
    }


    public function getUser() {
        return QueryBuilder::find(User::class,$this->idUser);
    }


    public function getBook() {
       return QueryBuilder::find(Book::class,$this->idBook);
    }


    public function save() {
        $this->id = QueryBuilder::insert(Sales::class,$this->toArray());
        return $this->id;
    }


    public function delete() {
        return QueryBuilder::delete(Sales::class,$this->id);
    }


    public static function getSales($idUser) {
        $values = ['idUser' => $idUser];
        return QueryBuilder::sql(Sales::class,$values);
    }
    public function toArray(){
        return [
            'idBook' => $this->idBook,
            'idUser' => $this->idUser,
        ];
    }

}

