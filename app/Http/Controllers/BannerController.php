<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Services\SystemLogger;
use App\Helpers\S3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class BannerController extends BaseController
{
    /**
     * Validation Rules
     */
    protected function validatedData(Request $request): array
    {
        return $request->validate([
            'title_en'        => ['required', 'string', 'max:255'],
            'title_es'        => ['nullable', 'string', 'max:255'],
            'title_pt'        => ['nullable', 'string', 'max:255'],

            'subtitle_en'     => ['nullable', 'string'],
            'subtitle_es'     => ['nullable', 'string'],
            'subtitle_pt'     => ['nullable', 'string'],

            'link'            => ['nullable', 'url', 'max:255'],
            'open_in_new_tab' => ['nullable', 'boolean'],

            'publish_start_at' => ['nullable', 'date'],
            'publish_end_at'  => ['nullable', 'date', 'after_or_equal:publish_start_at'],

            'is_published'    => ['nullable', 'boolean'],
            'sort_order'      => ['nullable', 'integer'],
        ]);
    }

    /**
     * List all banners
     */
    public function index()
    {
        $banners = Banner::orderBy('sort_order')
            ->orderByDesc('created_at')
            ->get();

        return view('admin.banners.index', compact('banners'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('admin.banners.form');
    }

    /**
     * Store banner
     */
    public function store(Request $request)
    {
        $data = $this->validatedData($request);

        try {
            DB::transaction(function () use ($data) {
                Banner::create($data);
            });

            SystemLogger::log(
                'Banner created',
                'info',
                'banners.store',
                [
                    'email' => $request->email,
                    'roles' => $request->roles ?? [],
                ]
            );

            return redirect()
                ->route('admin.banners.index')
                ->with('success', 'Banner created successfully.');
        } catch (Throwable $e) {

            SystemLogger::log(
                'Banner creation failed',
                'error',
                'banners.store',
                [
                    'exception' => $e->getMessage(),
                    'email'     => $request->email,
                    'roles'     => $request->roles ?? [],
                ]
            );

            return back()
                ->withInput()
                ->with('error', 'Failed to create banner.');
        }
    }

    /**
     * Show edit form
     */
    public function edit(Banner $banner)
    {
        return view('admin.banners.form', compact('banner'));
    }

    /**
     * Update banner
     */
    public function update(Request $request, Banner $banner)
    {
        $data = $this->validatedData($request);

        try {
            DB::transaction(function () use ($data, $banner) {
                $banner->update($data);
            });

            SystemLogger::log(
                'Banner updated',
                'info',
                'banners.update',
                [
                    'banner_id' => $banner->id,
                    'email'     => $request->email,
                    'roles'     => $request->roles ?? [],
                ]
            );

            return redirect()
                ->route('admin.banners.index')
                ->with('success', 'Banner updated successfully.');
        } catch (Throwable $e) {

            SystemLogger::log(
                'Banner update failed',
                'error',
                'banners.update',
                [
                    'banner_id' => $banner->id,
                    'exception' => $e->getMessage(),
                    'email'     => $request->email,
                ]
            );

            return back()
                ->withInput()
                ->with('error', 'Failed to update banner.');
        }
    }

    /**
     * Delete banner
     */
    public function destroy(Banner $banner)
    {
        try {
            if (!empty($banner->image_url)) {
                S3::delete($banner->image_url);
            }

            $bannerId = $banner->id;

            $banner->delete();

            SystemLogger::log(
                'Banner deleted',
                'warning',
                'banners.delete',
                [
                    'banner_id' => $bannerId,
                ]
            );

            return redirect()
                ->route('admin.banners.index')
                ->with('success', 'Banner deleted successfully.');
        } catch (Throwable $e) {

            SystemLogger::log(
                'Banner deletion failed',
                'error',
                'banners.delete',
                [
                    'banner_id' => $banner->id ?? null,
                    'exception' => $e->getMessage(),
                ]
            );

            return back()->with('error', 'Failed to delete banner.');
        }
    }
}
