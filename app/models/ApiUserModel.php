<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ApiUserModel extends Model
{
    protected $table = 'users';
    protected $primary_key = 'id';
    protected $has_soft_delete = FALSE;
}