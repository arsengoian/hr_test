<?php


namespace App\Task\Models;


use Carbon\Carbon;

/**
 * Interface Comment
 * @package App\Models
 *
 * Public fields:
 *
 * @property Carbon $created_at
 * @property string $text
 * @property string $user_name
 * @property null|Comment $referenced_comment      Tip: if using Laravel, use a relationship
 * @property null|array<Comment> $replies
 */
interface Comment
{

}
