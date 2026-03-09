<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Services\SystemLogger;
use App\Helpers\S3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class ServiceController extends BaseController
{
    /**
     * Validation Rules
     */
    protected function validatedData(Request $request): array
    {
        return $request->validate([
            'title_en'       => ['required', 'string', 'max:255'],
            'title_es'       => ['nullable', 'string', 'max:255'],
            'title_pt'       => ['nullable', 'string', 'max:255'],

            'description_en' => ['nullable', 'string'],
            'description_es' => ['nullable', 'string'],
            'description_pt' => ['nullable', 'string'],

            'external_link'  => ['nullable', 'url', 'max:255'],
            'is_published'   => ['nullable', 'boolean'],
        ]);
    }

    /**
     * Admin List
     */
    public function index()
    {
        $services = Service::orderByDesc('created_at')->get();

        return view('admin.services.index', compact('services'));
    }

    /**
     * Public List
     */
    public function indexPublic()
    {
        $services = Service::visible()
            ->orderBy('title_en')
            ->get();

        return view('frontend.services.index', compact('services'));
    }

    /**
     * Public Display
     */
    public function display(Service $service)
    {
        abort_unless($service->is_published, 404);

        return view('frontend.services.show', [
            'services' => Service::visible()->orderBy('title_en')->get(),
            'featuredServices' => Service::visible()->latest()->take(3)->get(),
            'service' => $service,
        ]);
    }

    /**
     * Create Form
     */
    public function create()
    {
        return view('admin.services.form');
    }

    /**
     * Store Service
     */
    public function store(Request $request)
    {
        $data = $this->validatedData($request);

        try {
            DB::transaction(function () use ($data) {
                Service::create($data);
            });

            SystemLogger::log(
                'Service created',
                'info',
                'services.store',
                [
                    'email' => $request->email,
                    'roles' => $request->roles ?? [],
                ]
            );

            return redirect()
                ->route('admin.services.index')
                ->with('success', 'Service created successfully.');
        } catch (Throwable $e) {

            SystemLogger::log(
                'Service creation failed',
                'error',
                'services.store',
                [
                    'exception' => $e->getMessage(),
                ]
            );

            return back()
                ->withInput()
                ->with('error', 'Failed to create service.');
        }
    }

    /**
     * Edit Form
     */
    public function edit(Service $service)
    {
        return view('admin.services.form', compact('service'));
    }

    /**
     * Update Service
     */
    public function update(Request $request, Service $service)
    {
        $data = $this->validatedData($request);

        try {
            DB::transaction(function () use ($data, $service) {
                $service->update($data);
            });

            SystemLogger::log(
                'Service updated',
                'info',
                'services.update',
                [
                    'service_id' => $service->id,

                ]
            );

            return redirect()
                ->route('admin.services.index')
                ->with('success', 'Service updated successfully.');
        } catch (Throwable $e) {

            SystemLogger::log(
                'Service update failed',
                'error',
                'services.update',
                [
                    'service_id' => $service->id,
                    'exception'  => $e->getMessage(),

                ]
            );

            return back()
                ->withInput()
                ->with('error', 'Failed to update service.');
        }
    }

    /**
     * Delete Service
     */
    public function destroy(Service $service)
    {
        try {
            if (!empty($service->image_url)) {
                S3::delete($service->image_url);
            }

            $serviceId = $service->id;

            $service->delete();

            SystemLogger::log(
                'Service deleted',
                'warning',
                'services.delete',
                [
                    'service_id' => $serviceId,

                ]
            );

            return redirect()
                ->route('admin.services.index')
                ->with('success', 'Service deleted successfully.');
        } catch (Throwable $e) {

            SystemLogger::log(
                'Service deletion failed',
                'error',
                'services.delete',
                [
                    'service_id' => $service->id ?? null,
                    'exception'  => $e->getMessage(),

                ]
            );

            return back()->with('error', 'Failed to delete service.');
        }
    }
}
