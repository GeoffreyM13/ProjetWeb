<?php
// Create by Dimitri Hueber


/** 
 * @Entity
 * @Table(name="fredouil.message")
 */
class message{

	/** @Id @Column(type="integer")
	 *  @GeneratedValue
	 */ 
	public $id;

	/** @Column(type="int"), options={"default":NULL)
	 *	@OneToOne(targetEntity="fredouil.utilisateur")
	 *	@JoinColumn(name="emetteur", referencedColumnName="id")
	 */ 
	public $emetteur;
		
	/** @Column(type="int"), options={"default":NULL) 
	 *	@OneToOne(targetEntity("fredouil.utilisateur"))
	 *	@JoinColumn(name="destinataire", referencedColumnName="id")
	 */ 
	public $destinataire;

	/** @Column(type="int"), options={"default":NULL) */ 
	public $parent;

	/** @Column(type="int"), options={"default":NULL) 
	 *	@OneToOne(targetEntity("fredouil.post"))
	 *	@JoinColumn(name="post", referencedColumnName="id")
	 */ 
	public $post;

	/** @Column(type="int", options={"default":NULL) */ 
	public $aime;
	
}

?>
