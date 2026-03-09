<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Services\SystemLogger;
use App\Helpers\S3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class BlogController extends BaseController
{
    /**
     * Validation Rules
     */
    protected function validatedData(Request $request): array
    {
        return $request->validate([
            'title_en'         => ['required', 'string', 'max:255'],
            'title_es'         => ['nullable', 'string', 'max:255'],
            'title_pt'         => ['nullable', 'string', 'max:255'],

            'content_en'       => ['nullable', 'string'],
            'content_es'       => ['nullable', 'string'],
            'content_pt'       => ['nullable', 'string'],

            'publish_start_at' => ['nullable', 'date'],
            'publish_end_at'   => ['nullable', 'date', 'after_or_equal:publish_start_at'],

            'is_published'     => ['nullable', 'boolean'],

            'image_url'        => ['nullable', 'string', 'max:255'],
            'file_url_en'      => ['nullable', 'string', 'max:255'],
            'file_url_es'      => ['nullable', 'string', 'max:255'],
            'file_url_pt'      => ['nullable', 'string', 'max:255'],

            'external_link'    => ['nullable', 'url', 'max:255'],
        ]);
    }

    /**
     * Public List
     */
    public function indexPublic()
    {
        $blogs = Blog::visible()
            ->orderByDesc('created_at')
            ->get();

        return view('frontend.blogs.index', compact('blogs'));
    }

    /**
     * Public Display
     */
    public function display(Blog $blog)
    {
        abort_unless($blog->is_published, 404);

        return view('frontend.blogs.show', compact('blog'));
    }

    /**
     * Admin List
     */
    public function index()
    {
        $blogs = Blog::orderByDesc('created_at')->get();

        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Create Form
     */
    public function create()
    {
        return view('admin.blogs.form');
    }

    /**
     * Store Blog
     */
    public function store(Request $request)
    {
        $data = $this->validatedData($request);

        try {
            DB::transaction(function () use ($data) {
                Blog::create($data);
            });


            return redirect()
                ->route('admin.blogs.index')
                ->with('success', 'Blog created successfully.');
        } catch (Throwable $e) {

            SystemLogger::log(
                'Blog creation failed',
                'error',
                'blogs.store',
                [
                    'exception' => $e->getMessage(),
                ]
            );

            return back()
                ->withInput()
                ->with('error', 'Failed to create blog.');
        }
    }

    /**
     * Edit Form
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.form', compact('blog'));
    }

    /**
     * Update Blog
     */
    public function update(Request $request, Blog $blog)
    {
        $data = $this->validatedData($request);

        try {
            DB::transaction(function () use ($data, $blog) {
                $blog->update($data);
            });



            return redirect()
                ->route('admin.blogs.index')
                ->with('success', 'Blog updated successfully.');
        } catch (Throwable $e) {

            SystemLogger::log(
                'Blog update failed',
                'error',
                'blogs.update',
                [
                    'blog_id'  => $blog->id,
                    'exception' => $e->getMessage(),
                ]
            );

            return back()
                ->withInput()
                ->with('error', 'Failed to update blog.');
        }
    }

    /**
     * Delete Blog
     */
    public function destroy(Blog $blog)
    {
        try {
            if (!empty($blog->image_url)) {
                S3::delete($blog->image_url);
            }

            if (!empty($blog->file_url_en)) {
                S3::delete($blog->file_url_en);
            }

            if (!empty($blog->file_url_es)) {
                S3::delete($blog->file_url_es);
            }

            $blogId = $blog->id;

            $blog->delete();

            SystemLogger::log(
                'Blog deleted',
                'warning',
                'blogs.delete',
                [
                    'blog_id' => $blogId,
                ]
            );

            return redirect()
                ->route('admin.blogs.index')
                ->with('success', 'Blog deleted successfully.');
        } catch (Throwable $e) {

            SystemLogger::log(
                'Blog deletion failed',
                'error',
                'blogs.delete',
                [
                    'blog_id'  => $blog->id ?? null,
                    'exception' => $e->getMessage(),
                ]
            );

            return back()->with('error', 'Failed to delete blog.');
        }
    }
}
