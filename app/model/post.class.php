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

    public function getDate()
    {
        return date_format($this->date, 'd-m-Y H:i');
        //return $this->date->format('Y-m-d H:i:s');
    }
}

?>