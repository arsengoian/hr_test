<?php


namespace App\Task\Models;


use Carbon\Carbon;

/**
 * Interface Post
 * @package App\Models
 *
 * Public fields:
 *
 * @property Carbon $created_at
 * @property string $text
 * @property null|string $image
 * @property int $views
 * @property null|array<Comment> $comments     Tip: if using Laravel, use a relationship
 */
interface Post
{

}
