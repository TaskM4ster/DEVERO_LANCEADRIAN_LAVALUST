<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primary_key = 'id';

    protected $fillable = [
        'product_name',
        'description',
        'price',
        'quantity'
    ];

    protected $guarded = [
        'id',
        'created_at',
        'deleted_at'
    ];

    protected $has_soft_delete = true;

    protected $soft_delete_column = 'deleted_at';
}