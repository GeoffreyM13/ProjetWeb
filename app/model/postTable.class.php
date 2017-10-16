<?php
/*
 * Created by PhpStorm.
 * User: geoffrey
 * Date: 16/10/2017
 * Time: 17:15
 */

require_once "post.class.php";

    class postTable
    {


        public static function getPost($id){

            $em = dbconnection::getInstance()->getEntityManager() ;
            $postRepository = $em->getRepository('post');
            $post = $postRepository->findAll(array('id'=> $id));

            if ($post == false)
            {
                return false;
            }
            return $post;

        }


}

?>
