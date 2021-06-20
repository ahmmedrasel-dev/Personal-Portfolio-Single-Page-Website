@extends('frontend.frontend-master')
@section('content')
    <div class="divider">
        <!--==========================
            BANNER SECTION START
        ===========================-->
        <section class="banner" id="banner_part" style="background: url({{ asset('images/'. $banner->created_at->format('Y/m/').$banner->id .'/'. $banner->background_photo) }}); background-position: bottom; background-size: cover; background-repeat: no-repeat">
            <div class="banner_overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-xl-3 offset-xl-1 col-8 offset-2 col-sm-5 offset-sm-0">
                            <div class="banner_small_img wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                                <img src="{{ asset('images/'. $banner->created_at->format('Y/m/').$banner->id .'/'. $banner->banner_photo) }}" alt="sazal" class="img-fluid w-100 img-thumbnail">
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4 col-sm-7">
                            <div class="banner-text wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                                <h5><b>{{ Str::upper($banner->title) }}</b></h5>
                                <h1>{{ Str::upper($banner->sub_title) }}</h1>
                                <!--HEADLINE START-->
                                <div class="animate-clip">
                                    <h4 class="ah-headline">
                                        <span class="ah-words-wrapper slide-color">
                                            <b class="is-visible">FREELANCER.</b>
                                            <b>FRONT-END DEVELOPER.</b>
                                            <b>BACK-END DEVELOPER.</b>
                                            <b>WORDPRESS CUSTOMIZATION.</b>
                                            <b>EMAIL SIGNATURE.</b>
                                        </span>
                                    </h4>
                                    <p>{{ $banner->short_description }}</p>
                                </div>
                                <!--HEADLINE END-->
                                @foreach ( $button as $buttons )
                                    <a href="{{ $buttons->button_link }}" class="btn common-btn mt-4">{{ $buttons->button_name }} <i class="{{ $buttons->button_icon }}"></i></a>
                                @endforeach

                                {{-- <a href="{{ $button->button_link }}" --}}
                                    {{-- class="btn common-btn mt-4" target="_blank">{{ $button->button_name }} <i class="{{ $button->button_icon }}"></i></a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--==========================
            BANNER SECTION END
        ===========================-->

        <!--==========================
            ABOUT SECTION START
        ===========================-->
        <section id="about" class="sec_shape">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="about-heading wow flash" data-wow-duration="1s" data-wow-delay="0s">
                            <h2>ABOUT <span>ME</span></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 m-auto">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                                <a class="nav-link common-btn active" id="home-tab" data-toggle="tab" href="#home"
                                    role="tab" aria-controls="home" aria-selected="true">
                                    about me
                                    <i class="fas fa-user"></i>
                                </a>
                            </li>
                            <li class="nav-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                                <a class="nav-link common-btn" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile" aria-selected="false">
                                    education
                                    <i class="fas fa-user-graduate"></i>
                                </a>
                            </li>
                            <li class="nav-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                                <a class="nav-link common-btn" id="contact-tab" data-toggle="tab" href="#contacts"
                                    role="tab" aria-controls="contacts" aria-selected="false">
                                    experience
                                    <i class="fas fa-user-tie"></i>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade  show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div id="scene" class="col-lg-4 col-xl-4 col-md-5">
                                        <div class="about-img-details wow fadeInUp" data-wow-duration="1s"
                                            data-wow-delay=".5s" data-depth="1">
                                            <img src="{{ asset('images/'.$about->created_at->format('Y/m/').$about->id .'/'. $about->about_photo) }}" alt="{{ $about->about_title }}"
                                                class="img-fluid about-img W-100 img-thumbnail">
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-xl-7 col-md-7">
                                        <div class="about-text wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                                            <h5>{{ $about->about_title }}</h5>
                                            <p>{!! $about->about_summary !!}</p>
                                            <a onclick="window.location.href='{{ $about->button_link }}'" target="_blank" class="btn common-btn wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">DOWNLOAD MY CV <i class="fas fa-cloud-download-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    @foreach ( $education as $item )
                                        <div class="col-lg-6 col-md-6">
                                            <div class="experience_text">
                                                <div class="exp_baj">
                                                    <i class="{{ $item->icon }}"></i>
                                                </div>
                                                <span class="model">{{ $item->title }}</span>
                                                <div class="middel_text">
                                                    <i class="far fa-calendar-check"></i>
                                                    <h6>{{ $item->sub_title }}</h6>
                                                    <p>{{ $item->year }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contacts" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="row">
                                    @foreach ( $experiences as $experience)
                                        <div class="col-lg-6 col-md-6">
                                            <div class="experience_text">
                                                <div class="exp_baj">
                                                    <i id="roated_icon" class="fas fa-medal"></i>
                                                </div>
                                                <span class="model">{{ $experience->institute_name }}</span>
                                                <div class="middel_text">
                                                    <i class="far fa-calendar-check"></i>
                                                    <h6>{{ $experience->job_title }}</h6>
                                                    <p>{{ $experience->year }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--==========================
            ABOUT SECTION END
        ===========================-->

        <!--==========================
        SKILL SECTION START
        ===========================-->
        <section id="skill" class="sec_shape skill_section">
            <div class="skills_overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tecnic-heading wow flash" data-wow-duration="1s" data-wow-delay="0s">
                                <h2>my <span>SKILLS</span></h2>
                            </div>
                        </div>
                    </div>
                    <div class="tecnical-skill">
                        <div class="row">
                            @foreach ( $skills as $key => $skill)
                                <div class="col-lg-4 col-sm-6">
                                    <div class="single_bar wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                                        <p class="skills-title">{{ $skill->skill_name }}</p>
                                        <div id="bar{{ $key+1 }}" class="barfiller">
                                            <div class="tipWrap">
                                                <span class="tip"></span>
                                            </div>
                                            <span class="fill" data-percentage="{{ $skill->skill_percentage }}"></span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--==========================
        SKILL SECTION END
        ===========================-->

        <!--==========================
            SERVICE SECTION START
        ===========================-->
        <section id="service" class="sec_shape">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="service-heading wow flash" data-wow-duration="1s" data-wow-delay=".3s">
                            <h2>MY <span>SERVICE</span></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ( $services as $key => $service )
                    <div class="col-lg-4 col-12 col-sm-6 col-md-6">
                        <div class="service-details wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                            <div class="large_icon">
                                <i class="{{ $service->icon }}"></i>
                            </div>
                            <span>{{ $key+1 }}</span>
                            <div class="small_icon">
                                <i class="{{ $service->icon }}"></i>
                            </div>
                            <h5>{{ $service->title }}</h5>
                            {!! $service->summary !!}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--==========================
            SERVICE SECTION END
        ===========================-->

        <!--==========================
            TEAM SECTION START
        ===========================-->
        {{-- <section id="team" class="sec_shape">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="team-heading wow flash" data-wow-duration="1s" data-wow-delay="0s">
                            <h2>MY <span>TEAM</span></h2>
                        </div>
                    </div>
                </div>
                <div class="row team_slider">
                    <div class="col-12">
                        <div class="team wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                            <div class="team_img">
                                <img src="images/rasel.jpg" alt="" class="img-fluid w-100 member">
                            </div>
                            <div class="team-text">
                                <h6>Rasel Ahmed</h6>
                                <p>Full Stack Developer</p>
                                <ul class="team_link">
                                    <li><a href="https://www.facebook.com/rahmmedbd3/" target="_blank"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://twitter.com/rahmmedbd1" target="_blank"><i
                                                class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="https://github.com/rahmmed47" target="_blank"><i
                                                class="fab fa-github"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="team wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                            <div class="team_img">
                                <img src="images/mahidul.jpg" alt="" class="img-fluid w-100 member">
                            </div>
                            <div class="team-text">
                                <h6>mahidul islam</h6>
                                <p>UI/UX &amp; Front-End Developer</p>
                                <ul class="team_link">
                                    <li><a href="https://www.facebook.com/mahidulislam045/" target="_blank"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://www.twitter.com/themahidul" target="_blank"><i
                                                class="fab fa-twitter"></i></a></li>
                                    <li><a href="https://www.linkedin.com/in/inmahidul/" target="_blank"><i
                                                class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="https://github.com/codermahidul" target="_blank"><i
                                                class="fab fa-github"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="team wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                            <div class="team_img">
                                <img src="images/taufik.jpg" alt="" class="img-fluid w-100 member">
                            </div>
                            <div class="team-text">
                                <h6>Taufik mahbub</h6>
                                <p>Front-End Developer</p>
                                <ul class="team_link">
                                    <li><a href="https://www.facebook.com/taufik.mahbub.1/" target="_blank"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://twitter.com/Taufik43999089" target="_blank"><i
                                                class="fab fa-twitter"></i></a></li>
                                    <li><a href="www.linkedin.com/in/taufik-mahbub-086a11205" target="_blank"><i
                                                class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="https://github.com/taufik9890" target="_blank"><i
                                                class="fab fa-github"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="team wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                            <div class="team_img">
                                <img src="images/priom.jpg" alt="" class="img-fluid w-100 member">
                            </div>
                            <div class="team-text">
                                <h6>Mashiour Rahaman</h6>
                                <p>Front-End Developer</p>
                                <ul class="team_link">
                                    <li><a href="https://www.facebook.com/deejey.dh" target="_blank"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="team wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                            <div class="team_img">
                                <img src="images/hasina_apu.jpg" alt="" class="img-fluid w-100 member">
                            </div>
                            <div class="team-text">
                                <h6>Hasina Parvin Ruma</h6>
                                <p>UI/UX Designer</p>
                                <ul class="team_link">
                                    <li><a href="https://www.facebook.com/gdruma66/" target="_blank"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!--==========================
            TEAM SECTION END
        ===========================-->

        <!--==========================
        TESTIMONIAL SECTION START
        ===========================-->
        <section id="testimonial" class="sec_shape">
            <div class="testy_overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="testimonial-heading wow flash" data-wow-duration="1s" data-wow-delay=".3s">
                                <h2>clients <span>reviews</span></h2>
                            </div>
                        </div>
                    </div>
                    <div class="row testi_slider">
                        @foreach ( $testimonials as $key => $testimonial )
                            <div class="col-lg-12">
                                <div class="clients_details wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                                    <div class="clients_img">
                                        <img src="{{ asset('images/'.$testimonial->created_at->format('Y/m/').$testimonial->id .'/'. $testimonial->client_photo) }}" class="img-fluid" alt="{{ $testimonial->client_name }}">
                                        <h4>{{ $testimonial->client_name }}</h4>
                                        <p>{{ $testimonial->location }}</p>
                                    </div>
                                    <span class="shape"></span>
                                    <div class="clients_text">
                                        <p><i class="far fa-quote-left"></i>{{ $testimonial->comment }}
                                            <i class="far fa-quote-right"></i></p>
                                    </div>
                                    <div class="clients_rating">
                                        @if ($testimonial->rating_number == 5)
                                            @for ($i=1; $i <= 5; $i++ )
                                                <i class="fas fa-star"></i>
                                            @endfor
                                        @elseif($testimonial->rating_number == 4)
                                            @for ($i=1; $i <= 4; $i++ )
                                                <i class="fas fa-star"></i>
                                            @endfor
                                        @elseif($testimonial->rating_number == 3)
                                            @for ($i=1; $i <= 3; $i++ )
                                                <i class="fas fa-star"></i>
                                            @endfor
                                        @endif

                                        {{-- <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!--==========================
        TESTIMONIAL SECTION END
        ===========================-->

        <!--==========================
        PORTFOLIO SECTION START
        ===========================-->
        <section id="porifolio" class="sec_shape">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 col-sm-12 ol-md-12">
                        <div class="portfolio-heading wow flash" data-wow-duration="1s" data-wow-delay=".3s">
                            <h2>MY <span>PROJECT</span></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="portfolio_filter wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                            <button class="common-btn active" data-filter="*">ALL</button>
                            @foreach ( $categorys as $category)
                                @if ($category->id != 1)
                                    <button class="common-btn" data-filter=".category{{ $category->id }}">{{ $category->category_name }}</button>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row grid">
                    @foreach ( $categorys as $category )
                        @foreach ( $category->project as $cat_project)
                            <div class="col-lg-3 col-12 col-sm-3 col-md-3 category{{ $category->id }}">
                                <div class="portfolio-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                                    <div class="portfolio_images screen" data-duration="3000">
                                        <img src="{{ asset('images/projects/'.$cat_project->created_at->format('Y/m/').$cat_project->id.'/'.$cat_project->project_image) }}" alt="{{ $cat_project->id }}" class="img-fluid w-100">
                                        <a href="{{ $cat_project->live_link }}" target="_blank" class="live_link1"><i class="fas fa-external-link-alt"></i> View Live</a>
                                        <a href="{{ $cat_project->github_link }}" target="_blank" class="live_link2"><i class="fab fa-github"></i> View Github</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>

            {{-- Custom Pagination Code Here --}}
            {{-- <div class="row">
                <div class="col-md-12 mt-5">
                    @if ( $categorys->lastPage() > 1)
                        <ul class="pagination justify-content-center">
                            <li class="page-item  {{ $categorys->currentPage()== 1 ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $categorys->url(1).'#porifolio'  }}" tabindex="-1" aria-disabled="true"><i class="fas fa-chevron-circle-left"></i></a>
                            </li>
                            @for ($i = 1; $i <= $categorys->lastPage(); $i++)
                                <li class="page-item {{  $categorys->currentPage()== $i ? 'active' : '' }}" aria-current="page">
                                    <a class="page-link" href="{{ $categorys->url($i).'#porifolio' }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="page-item {{ $categorys->currentPage()== $categorys->lastPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $categorys->url($categorys->currentPage()+1).'#porifolio'  }}"><i class="fas fa-chevron-circle-right"></i></a>
                            </li>
                        </ul>
                    @endif
                </div>
            </div> --}}

        </section>
        <!--==========================
            PORTFOLIO SECTION END
        ===========================-->

        <!--==========================
            BLOOG SECTION START
        ===========================-->
        <!--
        <section id="bloog">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bloog-heading wow flash" data-wow-duration="1s" data-wow-delay="0s">
                            <h2>LATEST <span>BLOOG</span> </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="bloog-details wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                            <div class="blog_images">
                                <img src="images/blog_1.jpg" alt="" class="img-fluid w-100">
                                <span>Web Designer</span>
                                <p>jan-10-2018, <i class="far fa-clock"></i> 10 min</p>
                                <a href="#" class="blog_link"><i class="fas fa-link"></i></a>
                            </div>
                            <div class="bloog_text">
                                <span>Jhon Deo</span>
                                <a href="#bloog">The Most Popular Blog Post &amp; top Digital Eorld Places...</a>
                                <p>Lorem ipsum dolor sit amet, consectet adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="bloog-details wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                            <div class="blog_images">
                                <img src="images/blog_2.jpg" alt="" class="img-fluid w-100">
                                <span>Web Designer</span>
                                <p>jan-10-2018, <i class="far fa-clock"></i> 10 min</p>
                                <a href="#" class="blog_link"><i class="fas fa-link"></i></a>
                            </div>
                            <div class="bloog_text">
                                <span>Jhon Deo</span>
                                <a href="#bloog">The Most Popular Blog Post &amp; top Digital Eorld Places...</a>
                                <p>Lorem ipsum dolor sit amet, consectet adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="bloog-details wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                            <div class="blog_images">
                                <img src="images/blog_3.jpg" alt="" class="img-fluid w-100">
                                <span>Web Designer</span>
                                <p>jan-10-2018, <i class="far fa-clock"></i> 10 min</p>
                                <a href="#" class="blog_link"><i class="fas fa-link"></i></a>
                            </div>
                            <div class="bloog_text">
                                <span>Jhon Deo</span>
                                <a href="#bloog">The Most Popular Blog Post &amp; top Digital Eorld Places...</a>
                                <p>Lorem ipsum dolor sit amet, consectet adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="bloog-details wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                            <div class="blog_images">
                                <img src="images/blog_4.jpg" alt="" class="img-fluid w-100">
                                <span>Web Designer</span>
                                <p>jan-10-2018, <i class="far fa-clock"></i> 10 min</p>
                                <a href="#" class="blog_link"><i class="fas fa-link"></i></a>
                            </div>
                            <div class="bloog_text">
                                <span>Jhon Deo</span>
                                <a href="#bloog">The Most Popular Blog Post &amp; top Digital Eorld Places...</a>
                                <p>Lorem ipsum dolor sit amet, consectet adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="bloog-details wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                            <div class="blog_images">
                                <img src="images/blog_1.jpg" alt="" class="img-fluid w-100">
                                <span>Web Designer</span>
                                <p>jan-10-2018, <i class="far fa-clock"></i> 10 min</p>
                                <a href="#" class="blog_link"><i class="fas fa-link"></i></a>
                            </div>
                            <div class="bloog_text">
                                <span>Jhon Deo</span>
                                <a href="#bloog">The Most Popular Blog Post &amp; top Digital Eorld Places...</a>
                                <p>Lorem ipsum dolor sit amet, consectet adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="bloog-details wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                            <div class="blog_images">
                                <img src="images/blog_2.jpg" alt="" class="img-fluid w-100">
                                <span>Web Designer</span>
                                <p>jan-10-2018, <i class="far fa-clock"></i> 10 min</p>
                                <a href="#" class="blog_link"><i class="fas fa-link"></i></a>
                            </div>
                            <div class="bloog_text">
                                <span>Jhon Deo</span>
                                <a href="#bloog">The Most Popular Blog Post &amp; top Digital Eorld Places...</a>
                                <p>Lorem ipsum dolor sit amet, consectet adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    -->
        <!--==========================
            BLOOG SECTION END
        ===========================-->

        <!--==========================
            CONTACT SECTION START
        ===========================-->
        <section id="contact" class="sec_shape">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 col-sm-12 col-md-12">
                        <div class="contact-heading wow flash" data-wow-duration="1s" data-wow-delay=".3s">
                            <h2>CONTACT <span>me</span></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-xl-4 col-sm-6 col-md-5">
                    <div class="row">
                        <h4 class="con_top_text ml-md-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">contact me</h4>
                        <div class="col-12">
                            <div class="contact_text wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                                <h5>Call Us On <i class="fal fa-phone"></i></h5>
                                <a href="callto:{{ $contact->phone_one }}">{{ $contact->phone_one }}</a>
                                <a href="callto:{{ $contact->phone_two }}">{{ $contact->phone_two }}</a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="contact_text wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                                <h5>Mail Me <i class="fal fa-envelope"></i></h5>
                                <a href="mailto:{{ $contact->email_one }}">{{ $contact->email_one }}</a>
                                <a href="mailto:{{ $contact->email_two }}">{{ $contact->email_two }}</a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="contact_text mb-0 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                                <h5>Visit address <i class="fal fa-map-marker-alt"></i></h5>
                                <p>{{ $contact->address }}</p>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-xl-8 col-12 col-sm-12 order-sm-3 col-md-12">
                        <h4 class="con_top_text wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">Get in touch</h4>

                        <form action="{{ route('messageStore') }}" method="POST">
                            @csrf
                            <div class="contact-form">
                                <div class="row">
                                    <div class="col-lg-6 col-12 col-sm-6 col-md-6">
                                        <div class="form-group wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                                            <div class="input-group input-group-lg">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fal fa-user"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="name" value="{{ old('name') }}" placeholder="Name" class="form-control form-control-lg @error('name') is-invalid @enderror">
                                            </div>

                                            @error('name')
                                                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                                            <div class="input-group input-group-lg">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-envelope"></i>
                                                    </span>
                                                </div>
                                                <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="form-control form-control-lg">
                                            </div>

                                            @error('email')
                                                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12 col-sm-6 col-md-6">
                                        <div class="form-group wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                                            <div class="input-group input-group-lg">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fal fa-mobile"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone Number" class="form-control form-control-lg">
                                            </div>

                                            @error('phone')
                                                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            @enderror

                                        </div>
                                        <div class="form-group wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                                            <div class="input-group input-group-lg">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fal fa-file-edit"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="subject" value="{{ old('subject') }}" placeholder="Subject" class="form-control form-control-lg">
                                            </div>

                                            @error('subject')
                                                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12 col-sm-12 col-md-12">
                                        <div class="form-group wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                                            <div class="input-group input-group-lg">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-edit"></i>
                                                    </span>
                                                </div>
                                                <textarea name="message" placeholder="Message...." rows="4" class="form-control form-control-lg">{{ old('message') }}</textarea>
                                            </div>

                                            @error('message')
                                                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                    <button type="submit" value="submit" class="btn common-btn wow fadeInUp"
                                        data-wow-duration="1s" data-wow-delay=".5s"><b><i class="far fa-paper-plane"></i>
                                            Send</b></button>
                                </div>

                                @if (session('sent-message'))
                                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                        <strong>{{ session('sent-message') }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--==========================
            CONTACT SECTION END
        ===========================-->

        <!--==========================
            WINDOW BUTTON START
        ===========================-->
        {{-- <div class="dis_social_icon">
            <span class="menu_btn">
                <i class="fad fa-chevron-double-left" id="arrow_icon"></i>
            </span>
            <ul class="icon_list">
                <li><a href="https://www.facebook.com/dead.earth.sazal/" target="_blank"><i
                            class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://www.instagram.com/ins_sazal/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                <li><a href="https://twitter.com/sazal2020" target="_blank"><i class="fab fa-twitter"></i></a></li>
                <li><a href="https://www.linkedin.com/in/in-sazal/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                </li>
                <li><a href="https://github.com/freelancersazal" target="_blank"><i class="fab fa-github"></i></a></li>
            </ul>
        </div> --}}
        <!--==========================
            WINDOW BUTTON END
        ===========================-->




        <!--==========================
            FOOTER SECTION START
        ===========================-->
        <footer class="sec_shape">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-12 col-sm-8 col-md-7">
                        <div class="footer_details">
                            <div class="footer_logo">
                                <img src="{{ asset('images/logo/'. $settings->created_at->format('Y/m/').$settings->id.'/'.$settings->logo) }}" alt="{{ $settings->site_title }}" class="img-fluid main-logo">
                            </div>
                            <p>{!! $footer->footer_text ?? '' !!}</p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-6 col-sm-4 col-md-3">
                        <div class="footer_details">
                            <h5>Work With Us</h5>
                            <ul class="link">
                                <li><a href="{{ $footer->upwork ?? '' }}" target="_blank">upwork</a></li>
                                <li>
                                    <a href="{{ $footer->fiverr ?? '' }}"
                                        target="_blank">fiverr</a>
                                </li>
                                <li>
                                    <a href="{{ $footer->freelancer ?? '' }}"
                                        target="_blank">freelancer</a>
                                </li>
                                <li>
                                    <a href="{{ $footer->peopleperhour ?? '' }}" target="_blank">peopleperhour</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-6 col-sm-5 col-md-3">
                        <div class="footer_details">
                            <h5>useful link</h5>
                            <ul class="link">
                                <li><a href="#banner_part">home</a></li>
                                <li><a href="#about">about</a></li>
                                <li><a href="#skill">skills</a></li>
                                <li><a href="#service">service</a></li>
                                <li><a href="#porifolio">portfolio</a></li>
                                <li><a href="#contact">contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12 col-sm-7">
                        <div class="footer_details mt_xsm">
                            <h5>facebook page</h5>
                            <div class="fb_page">
                                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Frahmmedbd2%2F&tabs&width=340&height=130&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=597032844373343" width="340" height="130" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                {!! $settings->copyright_text !!}
            </div>
            <div class="scroll_btn">
                <i class="fas fa-chevron-up"></i>
            </div>
        </footer>
    <!--==========================
         FOOTER SECTION END
     ===========================-->
    </div>
@endsection
@section('footer_js')
<script>
   $('.animate-clip').animatedHeadline({
        animationType: 'clip'
    });
</script>

@endsection
