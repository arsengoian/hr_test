<?php


namespace App\Models;


/**
 * Objects with this interface may be displayed to the user
 *
 * Interface Printable
 * @package App\Models
 */
interface Printable
{
    /**
     * Generate $number entries of this type
     *
     * @param int $number
     */
    function generate(int $number): void;

    /**
     * @return string JSON representation of the model's public fields
     */
    function toJSON(): string;
}