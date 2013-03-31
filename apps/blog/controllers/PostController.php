<?php

class Blog_PostController extends Yachay_Controller_Resource
{
    protected $_adapter = 'Db_Blog';
    protected $_type = 'post';
    protected $_container = 'Blog';
    protected $_component = 'Blog_Post';
    protected $_editor = 'Blog_Form_Editor';

    protected $_route_manager = 'blog_manager';
}
