<?php


namespace App\Models;


use Jenssegers\Date\Date;

/**
 * Interface User
 * @package App\Models
 *
 * Public fields:
 *
 * @property Date $created_at
 * @property string $first_name
 * @property string $last_name
 * @property string $gender   # Possible values: 'male' | 'female'
 * @property Date $birthday   # Not older than 1900
 */
interface User extends Printable
{

}
