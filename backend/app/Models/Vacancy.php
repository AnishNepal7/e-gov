<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 *     schema="Vacancy",
 *     description="Vacancy model schema",
 *     @OA\Property(property="id", type="integer", description="Vacancy ID", example=1),
 *     @OA\Property(property="name", type="string", description="Name of the vacancy", example="Software Engineer"),
 *     @OA\Property(property="description", type="string", description="Details about the vacancy", example="A position for an experienced software engineer."),
 *     @OA\Property(property="date", type="string", format="date", description="Date associated with the vacancy", example="2025-02-15"),
 *     @OA\Property(property="status", type="integer", description="Status of the vacancy (0: disabled, 1: enabled)", example=1),
 *    
 * )
 */
class Vacancy extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
}
