<?php

namespace BatBook;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

/**
 *
 */
class Book{
    /**
     * @var string
     */
    static string $nameTable = 'books';
    /**
     * @var int
     */
    private int $id = 0;

    /**
     * @param int $idUser
     * @param string $idModule
     * @param string $publisher
     * @param float $price
     * @param int $pages
     * @param string $status
     * @param string $photo
     * @param string|null $comments
     * @param string|null $soldDate
     */
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
    /**
     * @return false|mixed|string
     */
    public function save(){
        if ($this->id != 0) {
            return QueryBuilder::update(Book::class,$this->toArray(),$this->id);
        } else {
            $id =  QueryBuilder::insert(Book::class,$this->toArray());
            $log = new Logger('New book');
            $log->pushHandler(new StreamHandler('logs/books.log',Logger::DEBUG));
            $log->info("ID: ".$id." Nom del llibre: ".$this->publisher." idUser: ".$this->idUser);

            if ($id) {
                $this->id = $id;
            }
            return $id;
        }
    }

    /**
     * @return mixed
     */
    public function delete(){
        return QueryBuilder::delete(Book::class,$this->id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function find($id){
        return QueryBuilder::find(Book::class,$id);
    }

    public static function findAll(){
        return QueryBuilder::sql(Book::class);
    }

    /**
     * @return int
     */
    public function getIdUser(): int
    {
        return $this->idUser;
    }

    /**
     * @param int $idUser
     * @return void
     */
    public function setIdUser(int $idUser): void
    {
        $this->idUser = $idUser;
    }

    /**
     * @return string
     */
    public function getIdModule(): string
    {
        return $this->idModule;
    }

    /**
     * @param string $idModule
     * @return void
     */
    public function setIdModule(string $idModule): void
    {
        $this->idModule = $idModule;
    }

    /**
     * @return string
     */
    public function getPublisher(): string
    {
        return $this->publisher;
    }

    /**
     * @param string $publisher
     * @return void
     */
    public function setPublisher(string $publisher): void
    {
        $this->publisher = $publisher;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return void
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getPages(): int
    {
        return $this->pages;
    }

    /**
     * @param int $pages
     * @return void
     */
    public function setPages(int $pages): void
    {
        $this->pages = $pages;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return void
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getPhoto(): string
    {
        return $this->photo;
    }

    /**
     * @param string $photo
     * @return void
     */
    public function setPhoto(string $photo): void
    {
        $this->photo = $photo;
    }

    /**
     * @return string
     */
    public function getComments(): string
    {
        return $this->comments || '';
    }

    /**
     * @param string $comments
     * @return void
     */
    public function setComments(string $comments): void
    {
        $this->comments = $comments;
    }

    /**
     * @return string
     */
    public function getSoldDate(): string
    {
        return $this->soldDate || '';
    }

    /**
     * @param string $soldDate
     * @return void
     */
    public function setSoldDate(string $soldDate): void
    {
        $this->soldDate = $soldDate;
    }

    /**
     * @return string
     */
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

    /**
     * @return false|string
     */
    public function toJson(): false|string
    {
        $json = [];
        foreach ($this as $clave => $valor) {
            $json[$clave] = $valor;
        }
        return json_encode($json);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param string $date
     * @return void
     */
    public function markAsSold(string $date): void
    {
        $this->status = 'sold';
        $this->soldDate = $date;
    }

    /**
     * @return array
     */
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