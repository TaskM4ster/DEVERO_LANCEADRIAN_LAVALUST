<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ApiProductModel extends Model
{
    protected $table = 'products';
    protected $primary_key = 'id';
    protected $has_soft_delete = FALSE;
    protected $timestamps = FALSE;

    protected $fillable = [
        'product_name',
        'description',
        'price',
        'quantity'
    ];
}