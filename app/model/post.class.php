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

    /** @Id @Column(type="varchar", length=2000)
     *  @GeneratedValue
     * @OnetoMany(targetEntity("fredouil.message")
     * @JoinColumn(name="id" , referenceColumnName="post")
     */
    public $id;

    /** @Column(type="varchar", length=200)
     */
    public $texte;

    /** @Column(type="timestamp") */
    public $date;

    /** @Column(type="varchar", length=200)

     */
    public $image;


}

?>