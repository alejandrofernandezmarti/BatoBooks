<?php

namespace BatBook;
class Book{
    static string $nameTable = 'books';
    private int $id = 0;
    public function __construct(
        private int     $idUser=0,
        private string  $idModule='',
        private string  $publisher='',
        private float   $price=0,
        private int     $pages=0,
        private string  $status='',
        private string  $photo='',
        private ?string  $comments = null,
        private ?string $soldDate = null
    ){}
    /* public static function save($book){

        try {
            $newConexion = new Connection();
            $conexion = $newConexion->getConection();

            $sql = "INSERT INTO books VALUES ( :idUser, :idModule, :publisher, :price, :pages, :status, :photo, :comments, :soldDate ?)";
            $sentencia = $conexion -> prepare($sql);
            $sentencia -> bindParam(":idUser",$book->getIdUser());
            $sentencia -> bindParam(":idModule",$book->getIdModule());
            $sentencia -> bindParam(":publisher",$book->getPublisher());
            $sentencia -> bindParam(":price",$book->getPrice());
            $sentencia -> bindParam(":pages",$book->getPages());
            $sentencia -> bindParam(":status",$book->getStatus());
            $sentencia -> bindParam(":photo",$book->getPhoto());
            $sentencia -> bindParam(":comments",$book->getComments());
            $sentencia -> bindParam(":soldDate",$book->getSoldDate());

            $sentencia ->execute();

            $data = $sentencia -> fetchAll();

            while ($module = $sentencia -> fetch()){
                $data[] = new Module($module->code,$module->cliteral,$module->vliteral,$module->idCycle);
            }

        }catch (\PDOException $e){
            throw new \Exception("Error de la consulta: "  . $e->getMessage());
        }
    } */
    public function save(){
        if ($this->id != 0) {
            return QueryBuilder::update(Book::class,$this->toArray(),$this->id);
        } else {
            $id =  QueryBuilder::insert(Book::class,$this->toArray());
            if ($id) {
                $this->id = $id;
            }
            return $id;
        }
    }
    public function delete(){
        return QueryBuilder::delete(Book::class,$this->id);
    }

    public static function find($id){
        return QueryBuilder::find(Book::class,$id);
    }


    public function getIdUser(): int
    {
        return $this->idUser;
    }

    public function setIdUser(int $idUser): void
    {
        $this->idUser = $idUser;
    }

    public function getIdModule(): string
    {
        return $this->idModule;
    }

    public function setIdModule(string $idModule): void
    {
        $this->idModule = $idModule;
    }

    public function getPublisher(): string
    {
        return $this->publisher;
    }

    public function setPublisher(string $publisher): void
    {
        $this->publisher = $publisher;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getPages(): int
    {
        return $this->pages;
    }

    public function setPages(int $pages): void
    {
        $this->pages = $pages;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getPhoto(): string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): void
    {
        $this->photo = $photo;
    }

    public function getComments(): string
    {
        return $this->comments || '';
    }

    public function setComments(string $comments): void
    {
        $this->comments = $comments;
    }

    public function getSoldDate(): string
    {
        return $this->soldDate || '';
    }

    public function setSoldDate(string $soldDate): void
    {
        $this->soldDate = $soldDate;
    }

    public function __toString(): string
    {
        return "<div class='book'>
                    <h6>Id User: $this->idUser</h6>
                    <h6>ID Module: $this->idModule</h6>
                    <h6>Publisher: $this->publisher</h6>
                    <h6>Price: $this->price</h6>
                    <h6>Pages: $this->pages</h6>
                    <h6>Status: $this->status</h6>
                    <h6>Photo: $this->photo</h6>
                    <h6>Comments: $this->comments</h6>
                    <h6>Sold Date: $this->soldDate</h6>
                </div>";
    }

    public function toJson(): false|string
    {
        $json = [];
        foreach ($this as $clave => $valor) {
            $json[$clave] = $valor;
        }
        return json_encode($json);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function markAsSold(string $date): void
    {
        $this->status = 'sold';
        $this->soldDate = $date;
    }
    public function toArray() {
        return [
            'idUser' => $this->idUser,
            'idModule' => $this->idModule,
            'publisher' => $this->publisher,
            'price' => $this->price,
            'pages' => $this->pages,
            'status' => $this->status,
            'photo' => $this->photo,
            'comments' => $this->comments,
            'soldDate' => $this->soldDate
        ];
    }
}