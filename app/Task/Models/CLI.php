<?php


namespace App\Models;


/**
 * Interface Control
 * @package App\Models
 *
 * Contains methods for data control
 */
interface CLI
{
    /**
     * Truncates all tables, generates data for users, posts and comments (with random but valid fields)
     *
     * For images, use stock websites or image generators.
     * For texts, use lorem ipsum or whatever texts you find hilarious to use for this purpose.
     *
     * Don't use future dates.
     */
    function generateStubData(): void;


    /**
     * @return array
     *
     * Group blog comments by the age groups of users
     *
     * {
     *  "0-18" => [...],
     *  "18-35" => [...],
     *  "36-59" => [...],
     *  "60+"
     * }
     */
    function commentsByAge(): array;


    /**
     * @return array
     *
     * Group blog comments by the age groups of users
     *
     * {
     *  "male" => [...],
     *  "female" => [...]
     * }
     */
    function commentsByGender(): array;

}