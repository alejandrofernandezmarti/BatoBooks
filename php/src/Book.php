<?php
class Book{

    private int $idUser;
    private string $idModule;
    private string $publisher;
    private float $price;
    private int $pages;
    private string $status;
    private string $photo;
    private string $comments;
    // private string|null $soldDate;
    private ?string $soldDate = null;
    public function __construct($iduser,$idModule,$publisher,$price,$pages,$status,$photo,$comments){
        $this->idUser = $iduser;
        $this->idModule = $idModule;
        $this->publisher = $publisher;
        $this->price =  $price;
        $this->pages = $pages;
        $this->status = $status;
        $this->photo = $photo;
        $this->comments = $comments;
    }

    public function getIdUser(): int{return $this->idUser;}
    public function setIdUser(int $idUser): void{$this->idUser = $idUser;}
    public function getIdModule(): string{return $this->idModule;}
    public function setIdModule(string $idModule): void{$this->idModule = $idModule;}
    public function getPublisher(): string{return $this->publisher;}
    public function setPublisher(string $publisher): void{$this->publisher = $publisher;}
    public function getPrice(): int{return $this->price;}
    public function setPrice(int $price): void{$this->price = $price;}
    public function getPages(): int{return $this->pages;}
    public function setPages(int $pages): void{$this->pages = $pages;}
    public function getStatus(): string{return $this->status;}
    public function setStatus(string $status): void{$this->status = $status;}
    public function getPhoto(): string{return $this->photo;}
    public function setPhoto(string $photo): void{$this->photo = $photo;}
    public function getComments(): string{return $this->comments;}
    public function setComments(string $comments): void{$this->comments = $comments;}
    public function getSoldDate(): string{return $this->soldDate;}
    public function markAsSold(string $soldDate): void{$this->soldDate = $soldDate;
                                                        $this->status = 'sold';}

    public function toJson() {
        return json_encode(get_object_vars($this));
    }
    public function __toString(): string{
        return "<div class='book'>
                    <h6>Id User: ". $this->idUser ."</h6>
                    <h6>ID Module: ". $this->idModule ."</h6>
                    <h6>Publisher: ". $this->publisher ."</h6>
                    <h6>Price: ". $this->price ."</h6>
                    <h6>Pages: ". $this->pages ."</h6>
                    <h6>Status: ". $this->status ."</h6>
                    <h6>Photo: ". $this->photo ."</h6>
                    <h6>Comments: ". $this->comments ."</h6>
                    <h6>Sold Date: </h6>
                </div>";
    }

}