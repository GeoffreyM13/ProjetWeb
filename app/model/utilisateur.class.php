<?php

//Modified by Dimitri Hueber
/** 
 * @Entity
 * @Table(name="fredouil.utilisateur")
 */
class utilisateur{

	/** @Id @Column(type="integer")
	 *  @GeneratedValue
	 */ 
	public $id;

	/** @Column(type="string", length=45) */ 
	public $identifiant;
		
	/** @Column(type="string", length=45) */ 
	public $pass;

	/** @Column(type="string", length=45) */ 
	public $nom;

	/** @Column(type="string", length=45) */ 
	public $prenom;

	/** @Column(type="string", length=100) */ 
	public $statut;

	/** @Column(type="string", length=200) */ 
	public $avatar;

	/** @Column(type="datetime", length=4000) */ 
	public $date_de_naissance;
	
	public function getDate(){
        return date_format($this->date_de_naissance,'d-m-Y');
    }
}

?>
