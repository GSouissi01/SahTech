<?php

class reponse {
    private $id=null;
    private $text=null;
    private $id_reclam=null;
    private $date=null;
    function __construct($text, $id_reclam)
    {
        $this->text=$text;
        $this->id_reclam=$id_reclam;
    }


    function getId()
    {
        return $this->id;
    }
    function getDate()
    {
        return $this->date;
    }
    function getText(){
        return $this->text;
    }
    function getId_reclam()
    {
        return $this->id_reclam;
    }

    function setText(String $text){
        $this->text = $text;
    }
    function setId_relam(int $id_reclam )
    {
        $this->id_reclam= $id_reclam;
    }

}

?>