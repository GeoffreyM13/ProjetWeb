<?php

/**
 * @Entity
 * @Table(name="fredouil.message")
 */
class message{

    /** @Id @Column(type="integer")
     *  @GeneratedValue
     */
    public $id;

    /**
     * @ManyToOne(targetEntity="utilisateur")
     * @JoinColumn(name="parent", referencedColumnName="id")
     */
    public $parent;

    /**
     * @Column(type="integer", nullable=true)
     */
    public $aime;

    /**
     * @ManyToOne(targetEntity="utilisateur")
     * @JoinColumn(name="emetteur", referencedColumnName="id")
     */
    public $emetteur;

    /**
     * @ManyToOne(targetEntity="utilisateur")
     * @JoinColumn(name="destinataire", referencedColumnName="id")
     */
    public $destinataire;

    /**
     * @ManyToOne(targetEntity="post")
     * @JoinColumn(name="post", referencedColumnName="id")
     */
    public $post;

    public function __set($name, $value)
    {
        return $this->$name = $value;
    }

    public function __construct($emetteur, $destinataire, $parent, $post)
    {
        $this->emetteur = $emetteur;
        $this->destinataire = $destinataire;
        $this->parent = $parent;
        $this->post = $post;
        $this->aime = 0;
    }

    public function add()
    {
        $this->aime = $this->aime + 1;
    }

}

?>