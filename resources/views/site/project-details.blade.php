@extends('frontend.layouts.app')

@section('content')
    <div class="breadcrumb-area work">
        <div class="overlay-3"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="breadcrumb-title">
                        <h1>Work Details</h1>
                    </div>
                    <div class="breadcrumb-icon">
                        <i class="las la-angle-down"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="project-details-wrap section-padding">
        <div class="container">

            <div class="row align-items-end mb-60">

                <div class="col-xl-6 col-lg-7">

                    <div class="project-desc">

                        <h3>{{ $project->title }}</h3>

                        <p>
                            {!! $project->description !!}
                        </p>

                    </div>

                </div>

                <div class="col-xl-1 col-lg-1"></div>

                <div class="col-xl-5 col-lg-5">

                    <div class="row single-details-item gy-3 mt-30">

                        <div class="col-4">
                            <h5>Year</h5>
                        </div>

                        <div class="col-6">
                            <span>
                                {{ optional($project->start_date)->format('Y') }}
                            </span>
                        </div>

                        <div class="col-4">
                            <h5>Status</h5>
                        </div>

                        <div class="col-6">
                            <span>
                                {{ $project->is_published ? 'Completed' : 'Draft' }}
                            </span>
                        </div>

                    </div>

                </div>

            </div>


            <div class="row gx-5">

                <div class="col-xl-12 col-lg-12">

                    <div class="project-details-inner">

                        {{-- Main project image --}}
                        <div class="project-feature-img wow img-custom-anim-top" data-wow-delay=".2s">

                            <img src="{{ $project->banner_url }}" alt="{{ $project->title }}" class="img-fluid">

                        </div>


                        <div class="project-details-content">

                            <h3>{{ __('projects.overview') }}</h3>

                            <p>
                                {!! $project->description !!}
                            </p>

                        </div>


                        {{-- Gallery images --}}
                        @if ($project->images->count())
                            <div class="project-image-gallery">

                                <div class="row">

                                    @foreach ($project->images as $index => $image)
                                        <div class="col-md-4 wow fadeInLeft animated"
                                            data-wow-delay="{{ ($index + 1) * 200 }}ms">

                                            <img src="{{ route('admin.images.preview', ['model' => 'project-images', 'id' => $image->id]) }}"
                                                class="img-fluid mb-4" alt="Project Image">

                                        </div>
                                    @endforeach

                                </div>

                            </div>
                        @endif


                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection
