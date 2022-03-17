<?php

class Product
{
    private $id, $name, $description, $price, $image;

    public function __construct($id, $name, $description, $price, $image)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPrice($decimal = 2)
    {
        if ($decimal > 0) {
            return number_format($this->price, $decimal);
        }
        return $this->price;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function computeSubtotal($quantity)
    {
        return $quantity * $this->getPrice();
    }

    public static function convertArrayToProducts($products_data)
    {
        $products = [];
        foreach ($products_data as $record) {
            array_push($products,
                new Product(
                    $record['id'],
                    $record['name'],
                    $record['description'],
                    $record['price'],
                    $record['image']
                )
            );
        }

        return $products;
    }
}