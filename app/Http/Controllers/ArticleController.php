<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



/**
 * @OA\Schema(
 *     schema="Article",
 *     @OA\Property(property="id", type="integer", format="int64"),
 *     @OA\Property(property="user_id", type="integer", format="int64"),
 *     @OA\Property(property="title", type="string"),
 *     @OA\Property(property="description", type="string"),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time"),
 * )
 */
class ArticleController extends Controller
{
    /**
     * Create a new ArticleController instance.
     *
     * @return void
     */

     /**
 * @OA\Info(
 *     title="Payvill API Documentation",
 *     version="1.0.0",
 *     description="Description of API",
 *     @OA\Contact(
 *         email="irfan100655@gmail.com"
 *     ),
 *     @OA\License(
 *         name="License Name",
 *         url="http://license-url.com"
 *     )
 * )
 */
    public function __construct()
    {
        // Use middleware to protect all routes in this controller
        //$this->middleware('auth:api');
    }

    /**
     * @OA\Get(
     *     path="/api/articles",
     *     summary="Get a list of articles",
     *     @OA\Response(
     *         response=200,
     *         description="List of articles",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Article")),
     *     ),
     *     @OA\Tag(name="Articles"),
     * )
     */
    public function index()
    {
        // The user must pass a valid bearer token to access this endpoint.
        // Laravel's auth middleware handles token validation.

        return Article::all();
    }

    /**
     * @OA\Get(
     *     path="/api/articles/{article}",
     *     summary="Get a single article",
     *     @OA\Parameter(
     *         name="article",
     *         in="path",
     *         description="ID of the article to retrieve",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Article details",
     *         @OA\JsonContent(ref="#/components/schemas/Article"),
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Article not found",
     *     ),
     *     @OA\Tag(name="Articles"),
     * )
     */
    public function show(Article $article)
    {
        return $article;
    }

    /**
     * @OA\Post(
     *     path="/api/articles",
     *     summary="Create a new article",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Article"),
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Article created successfully",
     *         @OA\JsonContent(ref="#/components/schemas/Article"),
     *     ),
     *     @OA\Tag(name="Articles"),
     * )
     */
    public function store(Request $request)
    {
        $article = Article::create($request->all());

        return response()->json($article, 201);
    }

    /**
     * @OA\Put(
     *     path="/api/articles/{article}",
     *     summary="Update an existing article",
     *     @OA\Parameter(
     *         name="article",
     *         in="path",
     *         description="ID of the article to update",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Article"),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Article updated successfully",
     *         @OA\JsonContent(ref="#/components/schemas/Article"),
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Article not found",
     *     ),
     *     @OA\Tag(name="Articles"),
     * )
     */
    public function update(Request $request, Article $article)
    {
        $article->update($request->all());

        return response()->json($article, 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/articles/{article}",
     *     summary="Delete an article",
     *     @OA\Parameter(
     *         name="article",
     *         in="path",
     *         description="ID of the article to delete",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Article deleted successfully",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Article not found",
     *     ),
     *     @OA\Tag(name="Articles"),
     * )
     */
    public function delete(Article $article)
    {
        $article->delete();

        return response()->json(null, 204);
    }
}
