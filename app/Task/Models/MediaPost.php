<?php


namespace App\Models;


use Jenssegers\Date\Date;


/**
 * Interface MediaPost
 * @package App\Models
 *
 * Public fields:
 *
 * @property string $image  # Use a set of stock images or a random pic generator for this
 *
 */
interface MediaPost extends Post
{
    function comments(): array;
}