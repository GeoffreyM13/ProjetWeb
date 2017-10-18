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

	/** @Column(type="int"), options={"default":NULL)
	 *	@OneToOne(targetEntity="fredouil.post")
	 *	@JoinColumn(name="post", referencedColumnName="id")
	 */ 
	public $post;
		
	/** @Column(type="int"), options={"default":NULL) 
	 *	@OneToOne(targetEntity("fredouil.utilisateur"))
	 *	@JoinColumn(name="emetteur", referencedColumnName="id")
	 */ 
	public $emetteur;

}

?>
