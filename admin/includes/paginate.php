<?php

class Paginate {
    // номер страницы
    public $current_page;
    // количество фото, отбражаемых на 1 странице
    public $item_per_page;
    // всего фото
    public $items_total_count;

    public function __construct($page=1, $item_per_page=4, $items_total_count=0)
    {
        $this->current_page = (int)$page;
        $this->item_per_page = (int)$item_per_page;
        $this->items_total_count = (int)$items_total_count;
    }

    public function next()
    {
        return $this->current_page + 1;
    }

    public function previous()
    {
        return $this->current_page - 1;
    }
    // сколько страниц получится
    public function page_total()
    {
        // ceil округляет дробь в большую сторону
        return ceil($this->items_total_count/$this->item_per_page);
    }

    public function has_previous()
    {
        return $this->previous() >= 1 ? true : false;
    }

    public function has_next()
    {
        return $this->next() <= $this->page_total() ? true : false;
    }
    // смещение
    public function offset()
    {
        return ($this->current_page - 1) * $this->item_per_page;
    }

}