<?php

namespace App\Traits;

trait WithSearch
{
    public $searchQuery = "";
    public $page = 1;

    public function doSearch(){
        if(method_exists($this,'setPage')) {
            $this->setPage(1);
        }
    }

    public function resetSearch(){
        if(method_exists($this,'setPage')) {
            $this->setPage(1);
        }
        $this->searchQuery = "";
    }

}
