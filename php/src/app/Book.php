<?php

namespace BatBook;
class Book
{
    public function __construct(
        private int     $idUser,
        private string  $idModule,
        private string  $publisher,
        private float   $price,
        private int     $pages,
        private string  $status,
        private string  $photo,
        private string  $comments,
        private ?string $soldDate = null
    )
    {
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
        return $this->comments;
    }

    public function setComments(string $comments): void
    {
        $this->comments = $comments;
    }

    public function getSoldDate(): string
    {
        return $this->soldDate;
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

    public function markAsSold(string $date): void
    {
        $this->status = 'sold';
        $this->soldDate = $date;
    }
}