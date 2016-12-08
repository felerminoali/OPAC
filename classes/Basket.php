<?php

class Basket
{

    public $_inst_catalogue;
    public $_empty_basket;
    public $_number_of_items;
    public $_qtd_books;

    public function __construct()
    {
        $this->_inst_catalogue = new Catalogue();
        $this->_empty_basket = empty($_SESSION['basket']) ? true : false;

        $objBusiness = new Business();

        $this->noItems();
    }

    public function noItems()
    {
        $value = 0;
        if (!$this->_empty_basket) {
            foreach ($_SESSION['basket'] as $key => $basket) {
                $value++;
            }
        }
        $this->_number_of_items = $value;
    }

    public static function activeButton($sess_id)
    {
        if (isset($_SESSION['basket'][$sess_id])) {
            $id = 0;
            $label = 'Remove from reservation';
        } else {
            $id = 1;
            $label = 'Add to reservation';
        }

        $out = '<a href="#" class="add_to_basket';
        $out .= $id == 0 ? ' red' : null;
        $out .= '" rel="';
        $out .= $sess_id . '_' . $id;
        $out .= '">' . $label . '</a>';


        return $out;
    }

    public static function removeButton($id = null)
    {
        if (!empty($id)) {
            if (isset($_SESSION['basket'][$id])) {
                $out = '<a href="#" class="remove_basket"';
                $out .= 'rel="' . $id . '">Remove</a>';
                return $out;
            }
        }
    }

    public function total_books()
    {
        $value=0;
        
        if (!$this->_empty_basket) {
            $objCatalogue = new Catalogue();
            $book_cat = $objCatalogue->getCategory('Books');
                
            foreach ($_SESSION['basket'] as $key => $basket) {

                if(($basket['cat'] == $book_cat['id'])){
                    $value++;
                }
            }
        }
        $this->_qtd_books = $value;

    }
}
