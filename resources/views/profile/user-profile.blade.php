@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','User Profile')
{{-- vendor style --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/swiper.min.css')}}">
@endsection
{{-- page-styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-user-profile.css')}}">
@endsection

@section('content')
<!-- page user profile start -->
<section class="page-user-profile">
  <div class="row">
    <div class="col-12">
      <!-- user profile heading section start -->
      <div class="card">
        <div class="user-profile-images">
          <!-- user timeline image -->
          <img src="{{asset('images/profile/post-media/profile-banner.jpg')}}"
            class="img-fluid rounded-top user-timeline-image" alt="user timeline image">
          <!-- user profile image -->
          <img src="{{asset('images/portrait/small/avatar-s-16.jpg')}}" class="user-profile-image rounded"
            alt="user profile image" height="140" width="140">
        </div>
        <div class="user-profile-text">
          <h4 class="mb-0 text-bold-500 profile-text-color">{{ Auth::user()->name }}</h4>
          <small>Devloper</small>
        </div>
        <!-- user profile nav tabs start -->
        <div class="card-body px-0">
          <ul
            class="nav user-profile-nav justify-content-center justify-content-md-start nav-pills border-bottom-0 mb-0"
            role="tablist">
            <li class="nav-item mb-0 mr-0">
              <a class="nav-link d-flex px-1 active" id="profile-tab" data-toggle="tab" href="#profile"
                aria-controls="profile" role="tab" aria-selected="false"><i class="bx bx-copy-alt"></i><span
                  class="d-none d-md-block">Profile</span></a>
            </li>
          </ul>
        </div>
        <!-- user profile nav tabs ends -->
      </div>
      <!-- user profile heading section ends -->

      <!-- user profile content section start -->
      <div class="row">
        <!-- user profile nav tabs content start -->
        <div class="col-lg-9">
          <div class="tab-content">
            <div class="tab-pane active" id="profile" aria-labelledby="profile-tab" role="tabpanel">
              <!-- user profile nav tabs profile start -->
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <div class="row">
                        <div class="col-12 col-sm-3 text-center mb-1 mb-sm-0">
                          <img src="{{asset('images/portrait/small/avatar-s-16.jpg')}}" class="rounded"
                            alt="group image" height="120" width="120" />
                        </div>
                        <div class="col-12 col-sm-9">
                          <div class="row">
                            <div class="col-12 text-center text-sm-left">
                              <h6 class="media-heading mb-0"><span>@</span>{{ Auth::user()->login }}<i
                                  class="cursor-pointer bx bxs-star text-warning ml-50 align-middle"></i></h6>
                              <small class="text-muted align-top">{{ Auth::user()->name }}</small>
                            </div>
                            <div class="col-12 text-center text-sm-left">
                              <button class="btn btn-sm d-none d-sm-block float-right btn-light-primary">
                                <i class="cursor-pointer bx bx-edit font-small-3 mr-50"></i><span>Edit</span>
                              </button>
                              <button class="btn btn-sm d-block d-sm-none btn-block text-center btn-light-primary">
                                <i class="cursor-pointer bx bx-edit font-small-3 mr-25"></i><span>Edit</span></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Basic details</h5>
                  <ul class="list-unstyled">
                    <li><i class="cursor-pointer bx bx-envelope mb-1 mr-50"></i>{{ Auth::user()->email }}</li>
                  </ul>
                  <button class="btn btn-sm d-none d-sm-block float-right btn-light-primary mb-2">
                    <i class="cursor-pointer bx bx-edit font-small-3 mr-50"></i><span>Edit</span>
                  </button>
                  <button class="btn btn-sm d-block d-sm-none btn-block text-center btn-light-primary">
                    <i class="cursor-pointer bx bx-edit font-small-3 mr-25"></i><span>Edit</span></button>
                </div>
              </div>
              <!-- user profile nav tabs profile ends -->
            </div>
          </div>
        </div>
        <!-- user profile nav tabs content ends -->
        <!-- user profile right side content start -->
        <div class="col-lg-3">
          <!-- user profile right side content birthday card start -->
          <div class="card">
            <div class="card-body">
              <div class="d-inline-flex">
                <div class="avatar mr-50">
                  <img src="{{asset('images/portrait/small/avatar-s-20.jpg')}}" alt="avtar images" height="32"
                    width="32">
                </div>
                <h6 class="mb-0 d-flex align-items-center"> Nile's Birthday!</h6>
              </div>
              <i class="cursor-pointer bx bx-dots-vertical-rounded float-right"></i>
              <div class="user-profile-birthday-image text-center p-2">
                <img class="img-fluid" src="{{asset('images/profile/pages/birthday.png')}}" alt="image">
              </div>
              <div class="user-profile-birthday-footer text-center text-lg-left">
                <p class="mb-0"><small>Leave her a message with your best wishes on her profile page!</small></p>
                <a class="btn btn-sm btn-light-primary mt-50" href="JavaScript:void(0);">Send Wish</a>
              </div>
            </div>
          </div>
          <!-- user profile right side content birthday card ends -->
          <!-- user profile right side content related groups start -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-1">Related Groups
                <i class="cursor-pointer bx bx-dots-vertical-rounded align-top float-right"></i>
              </h5>
              <div class="media d-flex align-items-center mb-1">
                <a href="JavaScript:void(0);">
                  <img src="{{asset('images/banner/banner-30.jpg')}}" class="rounded" alt="group image"
                    height="64" width="64" />
                </a>
                <div class="media-body ml-1">
                  <h6 class="media-heading mb-0"><small>Play Guitar</small></h6><small class="text-muted">2.8k
                    members (7 joined)</small>
                </div>
                <i class="cursor-pointer bx bx-plus-circle text-primary d-flex align-items-center "></i>
              </div>
              <div class="media d-flex align-items-center mb-1">
                <a href="JavaScript:void(0);">
                  <img src="{{asset('images/banner/banner-31.jpg')}}" class="rounded" alt="group image"
                    height="64" width="64" />
                </a>
                <div class="media-body ml-1">
                  <h6 class="media-heading mb-0"><small>Generic memes</small></h6><small class="text-muted">9k
                    members (7 joined)</small>
                </div>
                <i class="cursor-pointer bx bx-plus-circle text-primary d-flex align-items-center "></i>
              </div>
              <div class="media d-flex align-items-center">
                <a href="JavaScript:void(0);">
                  <img src="{{asset('images/banner/banner-32.jpg')}}" class="rounded" alt="group image"
                    height="64" width="64" />
                </a>
                <div class="media-body ml-1">
                  <h6 class="media-heading mb-0"><small>Cricket fan club</small></h6><small class="text-muted">7.6k
                    members</small>
                </div>
                <i class="cursor-pointer bx bx-lock text-muted d-flex align-items-center"></i>
              </div>
            </div>
          </div>
          <!-- user profile right side content related groups ends -->
          <!-- user profile right side content gallery start -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-1">Gallery
                <i class="cursor-pointer bx bx-dots-vertical-rounded align-top float-right"></i>
              </h5>
              <div class="row">
                <div class="col-md-4 col-6 pl-25 pr-0 pb-25">
                  <img src="{{asset('images/profile/user-uploads/user-10.jpg')}}" class="img-fluid"
                    alt="gallery avtar img">
                </div>
                <div class="col-md-4 col-6 pl-25 pr-0 pb-25">
                  <img src="{{asset('images/profile/user-uploads/user-11.jpg')}}" class="img-fluid"
                    alt="gallery avtar img">
                </div>
                <div class="col-md-4 col-6 pl-25 pr-0 pb-25">
                  <img src="{{asset('images/profile/user-uploads/user-12.jpg')}}" class="img-fluid"
                    alt="gallery avtar img">
                </div>
                <div class="col-md-4 col-6 pl-25 pr-0 pb-25">
                  <img src="{{asset('images/profile/user-uploads/user-13.jpg')}}" class="img-fluid"
                    alt="gallery avtar img">
                </div>
                <div class="col-md-4 col-6 pl-25 pr-0 pb-25">
                  <img src="{{asset('images/profile/user-uploads/user-05.jpg')}}" class="img-fluid"
                    alt="gallery avtar img">
                </div>
                <div class="col-md-4 col-6 pl-25 pr-0 pb-25">
                  <img src="{{asset('images/profile/user-uploads/user-06.jpg')}}" class="img-fluid"
                    alt="gallery avtar img">
                </div>
                <div class="col-md-4 col-6 pl-25 pr-0 pb-25">
                  <img src="{{asset('images/profile/user-uploads/user-07.jpg')}}" class="img-fluid"
                    alt="gallery avtar img">
                </div>
                <div class="col-md-4 col-6 pl-25 pr-0 pb-25">
                  <img src="{{asset('images/profile/user-uploads/user-08.jpg')}}" class="img-fluid"
                    alt="gallery avtar img">
                </div>
                <div class="col-md-4 col-6 pl-25 pr-0 pb-25">
                  <img src="{{asset('images/profile/user-uploads/user-09.jpg')}}" class="img-fluid"
                    alt="gallery avtar img">
                </div>
              </div>
            </div>
          </div>
          <!-- user profile right side content gallery ends -->
        </div>
        <!-- user profile right side content ends -->
      </div>
      <!-- user profile content section start -->
    </div>
  </div>
</section>
<!-- page user profile ends -->
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/extensions/swiper.min.js')}}"></script>
@endsection
{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/pages/page-user-profile.js')}}"></script>
@endsection
