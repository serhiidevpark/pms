<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Controllers;

use App\Http\Controllers\Controller;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="PMS App",
 *      description="Product Manager System App",
 *      @OA\Contact(
 *          name="Devpark",
 *          email="admin@devpark.pl",
 *          url="https://devpark.pl/"
 *      )
 * )
 *
 * @OA\Server(
 *      url="http://localhost",
 *      description="localhost"
 * )
 *
 * @OA\SecurityScheme(
 *      securityScheme="sanctum",
 *      in="header",
 *      name="BearerToken",
 *      type="http",
 *      scheme="bearer",
 *      bearerFormat="sanctum",
 * )
 *
 * @OA\Tag(
 *     name="Auth",
 *     description="Auth part of application.",
 * )
 *
 * @see Controller
 */
class ControllerOA
{
}
