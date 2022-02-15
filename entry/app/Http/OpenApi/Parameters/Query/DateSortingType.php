<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Parameters\Query;

/**
 * @OA\Parameter(
 *     parameter="date_sort",
 *     name="date_sort",
 *     in="query",
 *     description="Type sorting by date",
 *     @OA\Schema(
 *         type="string",
 *         enum={"ASC", "DESC"},
 *         default="DESC"
 *     ),
 * )
 */
class DateSortingType
{
}
