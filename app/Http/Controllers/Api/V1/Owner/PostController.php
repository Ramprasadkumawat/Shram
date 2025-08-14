<?php

namespace App\Http\Controllers\Api\V1\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\Api\V1\StorePostRequest;
use App\Http\Requests\Api\V1\UpdatePostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the posts.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $owner = Auth::user();
        
        $posts = Post::where('owner_id', $owner->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return response()->json([
            'status' => true,
            'message' => 'Posts retrieved successfully',
            'data' => $posts
        ]);
    }

    /**
     * Create a new owner post.
     *
     * @param StorePostRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StorePostRequest $request)
    {
        // Get the currently authenticated owner
        $owner = Auth::user();

        // Create the post
        $post = Post::create([
            'owner_id'        => $owner->id,
            'title'           => $request->title,
            'description'     => $request->description,
            'required_labours'=> $request->required_labours,
            'location'        => $request->location,
            'start_date'      => $request->start_date,
            'end_date'        => $request->end_date,
            'work_type'       => $request->work_type,
            'wage_per_day'    => $request->wage_per_day,
            'wage_per_hour'   => $request->wage_per_hour,
            'status'          => $request->status ?? 'open',
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Post created successfully',
            'data' => $post
        ], 201);
    }

    /**
     * Display the specified post.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $owner = Auth::user();
        
        $post = Post::where('owner_id', $owner->id)
            ->where('id', $id)
            ->first();

        if (!$post) {
            return response()->json([
                'status' => false,
                'message' => 'Post not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Post retrieved successfully',
            'data' => $post
        ]);
    }

    /**
     * Update the specified post.
     *
     * @param UpdatePostRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdatePostRequest $request, $id)
    {
        // Log the request method and data for debugging
        \Log::info('Update request received', [
            'method' => $request->method(),
            'url' => $request->url(),
            'post_id' => $id,
            'all_data' => $request->all(),
            'content_type' => $request->header('Content-Type'),
            'raw_input' => $request->getContent()
        ]);

        $owner = Auth::user();
        
        $post = Post::where('owner_id', $owner->id)
            ->where('id', $id)
            ->first();

        if (!$post) {
            return response()->json([
                'status' => false,
                'message' => 'Post not found'
            ], 404);
        }

        // Handle multipart/form-data for PATCH/PUT requests
        $updateData = [];
        
        // Check if it's multipart/form-data and parse manually if needed
        if (str_contains($request->header('Content-Type'), 'multipart/form-data')) {
            // Parse multipart/form-data manually
            $rawContent = $request->getContent();
            $boundary = $this->extractBoundary($request->header('Content-Type'));
            
            if ($boundary) {
                $updateData = $this->parseMultipartData($rawContent, $boundary);
            }
            
            // Fallback to regular request data if manual parsing fails
            if (empty($updateData)) {
                $updateData = $request->all();
            }
        } else {
            $updateData = $request->all();
        }

        // Log the parsed data
        \Log::info('Parsed update data', [
            'post_id' => $id,
            'update_data' => $updateData,
            'has_description' => isset($updateData['description']),
            'description_value' => $updateData['description'] ?? null
        ]);

        // Update the post with all provided data
        if (!empty($updateData)) {
            $post->update($updateData);
        }

        // Refresh the model to get updated data
        $post->refresh();

        return response()->json([
            'status' => true,
            'message' => 'Post updated successfully',
            'data' => $post,
            'debug' => [
                'received_description' => $updateData['description'] ?? null,
                'updated_description' => $post->description,
                'content_type' => $request->header('Content-Type'),
                'method' => $request->method(),
                'all_update_data' => $updateData
            ]
        ]);
    }

    /**
     * Remove the specified post.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $owner = Auth::user();
        
        $post = Post::where('owner_id', $owner->id)
            ->where('id', $id)
            ->first();

        if (!$post) {
            return response()->json([
                'status' => false,
                'message' => 'Post not found'
            ], 404);
        }

        $post->delete();

        return response()->json([
            'status' => true,
            'message' => 'Post deleted successfully'
        ]);
    }

    /**
     * Extract boundary from Content-Type header
     */
    private function extractBoundary($contentType)
    {
        if (preg_match('/boundary=(.*)$/i', $contentType, $matches)) {
            return $matches[1];
        }
        return null;
    }

    /**
     * Parse multipart/form-data content
     */
    private function parseMultipartData($content, $boundary)
    {
        $data = [];
        $parts = explode('--' . $boundary, $content);
        
        foreach ($parts as $part) {
            $part = trim($part);
            if (empty($part) || $part === '--') {
                continue;
            }
            
            // Split part into headers and body
            $part = ltrim($part, "\r\n");
            list($rawHeaders, $body) = explode("\r\n\r\n", $part, 2);
            
            // Parse headers
            $headers = [];
            foreach (explode("\r\n", $rawHeaders) as $header) {
                if (preg_match('/^([^:]+):\s*(.+)$/', $header, $matches)) {
                    $headers[strtolower($matches[1])] = $matches[2];
                }
            }
            
            // Extract field name from Content-Disposition
            if (isset($headers['content-disposition'])) {
                if (preg_match('/name="([^"]+)"/', $headers['content-disposition'], $matches)) {
                    $fieldName = $matches[1];
                    $data[$fieldName] = trim($body);
                }
            }
        }
        
        return $data;
    }
}
