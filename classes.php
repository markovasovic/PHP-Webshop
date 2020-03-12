<?php


class artikal{
    public $id;
    public $name;
    public $price;
    public $item_description;
    public $img;
    
    function __construct($id, $name, $price, $item_description, $img) {
        $this->id = $id;
        $this->name =$name;
        $this->price=$price;
        $this->item_description=$item_description;
        $this->img=$img;
    }
    
}


class individual_artikal{
    public $id;
    public $name;
    public $price;
    public $img;
   public $quantity;
   public $total;
            function __construct( $name, $price, $img, $id, $quantity, $total ) {
        
        $this->name=$name;
        $this->price=$price;
        $this->img = $img;
        $this->id=$id;
        $this->total = $total;
        $this->quantity = $quantity;
    }
    
}

class basketItem{
    public $id;
    public $name;
    public $price;
    public $quantity;
    public $img;
        
    function __construct($id,$name,$price,$quantity, $img ){
        $this->$id=$id;
        $this->$name=$name;
        $this->$price=$price;
        $this->$quantity=$quantity;
       $this->$img=$img;
        
    }
    
    
}

class basket_item {
    public $name;
    public $price;
    
            function __construct($name, $price) {
            $this->name = $name;
            $this->price =$price;
            
    }

}




class quantity{
    public $quantity;
    function __construct($quantity) {
       $this->quantity = $quantity;  
    }
}


class modal_Images{
    public $img01;
    public $img02;
    public $img03;
    public $img04;
    function __construct($img01,$img02, $img03, $img04) {
        $this->img01=$img01;
        $this->img02=$img02;
        $this->img03=$img03;
        $this->img04=$img04;
    }
}




