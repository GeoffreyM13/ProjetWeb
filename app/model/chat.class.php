<?php
// Create by Dimitri Hueber


/** 
 * @Entity
 * @Table(name="fredouil.chat")
 */
class chat{

	/** @Id @Column(type="integer")
	 *  @GeneratedValue
	 */ 
	public $id;

	/**
	 *	@ManyToOne(targetEntity="post")
	 *	@JoinColumn(name="post", referencedColumnName="id")
	 */ 
	public $post;
		
	/**
	 *	@ManyToOne(targetEntity("utilisateur"))
	 *	@JoinColumn(name="emetteur", referencedColumnName="id")
	 */ 
	public $emetteur;

}

?>
