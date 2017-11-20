<?php
/*
 * Created by PhpStorm.
 * User: geoffrey
 * Date: 16/10/2017
 * Time: 17:00
 */

/**
 * @Entity
 * @Table(name="fredouil.post")
 */

class post{

    /**
     * @Id @Column(type="integer")
     * @GeneratedValue
     */
    public $id;

    /**
     * @Column(type="text", length=2000, nullable =true)
     */
    public $texte;

    /**
     * @Column(type="datetime")
     */
    public $date;

    /**
     * @Column(type="string", length=200, nullable=true)
     */
    public $image;
    //martinez geoffrey - Retourne la date au bon format
    public function getDate()
    {
        return date_format($this->date, 'd-m-Y H:i');
        //return $this->date->format('Y-m-d H:i:s');
    }
    //martinez geoffrey - constructeur pour l'ajout d'un post utiliser dans SendMessage() messagetable.
    public function __construct($texte='',$image='')
    {
        $this->texte= html_entity_decode($texte);
        $this->image = htmlspecialchars($image);
        $this->date = new DateTime("now");

    }
}

?>