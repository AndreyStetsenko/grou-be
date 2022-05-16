@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Настройки сайта')
{{-- vendor styles --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/forms/select/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/pickers/pickadate/pickadate.css')}}">
@endsection
{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/forms/validation/form-validation.css')}}">
@endsection

@section('content')
<!-- account setting page start -->
<section id="page-account-settings">
  <div class="row">
      <div id="app">

      </div>
    <div class="col-12">
      <div class="row">
        <!-- left menu section -->
        <div class="col-md-3 mb-2 mb-md-0 pills-stacked">
          <ul class="nav nav-pills flex-column">
            {{-- <li class="nav-item">
                <a class="nav-link d-flex align-items-center active" id="account-pill-general" data-toggle="pill"
                    href="#account-vertical-general" aria-expanded="true">
                    <i class="bx bx-cog"></i>
                    <span>Основное</span>
                </a>
            </li> --}}
            {{-- <li class="nav-item">
                <a class="nav-link d-flex align-items-center" id="account-pill-password" data-toggle="pill"
                    href="#account-vertical-password" aria-expanded="false">
                    <i class="bx bx-lock"></i>
                    <span>Безопасность</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" id="account-pill-info" data-toggle="pill"
                    href="#account-vertical-info" aria-expanded="false">
                    <i class="bx bx-info-circle"></i>
                    <span>Информация</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" id="account-pill-social" data-toggle="pill"
                    href="#account-vertical-social" aria-expanded="false">
                    <i class="bx bxl-twitch"></i>
                    <span>Социальные сети</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" id="account-pill-connections" data-toggle="pill"
                    href="#account-vertical-connections" aria-expanded="false">
                    <i class="bx bx-link"></i>
                    <span>Интеграции</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" id="account-pill-notifications" data-toggle="pill"
                    href="#account-vertical-notifications" aria-expanded="false">
                    <i class="bx bx-bell"></i>
                    <span>Уведомления</span>
                </a>
            </li> --}}
            <li class="nav-item active">
                <a class="nav-link d-flex align-items-center" id="account-pill-tags" data-toggle="pill"
                    href="#account-vertical-tags" aria-expanded="false">
                    <i class="bx bxs-tag"></i>
                    <span>Теги</span>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link d-flex align-items-center" id="account-pill-site-pages" data-toggle="pill"
                    href="#account-vertical-site-pages" aria-expanded="false">
                    <i class="bx bxs-add-to-queue"></i>
                    <span>Страницы сайта</span>
                </a>
            </li> --}}
          </ul>
        </div>
        <!-- right content section -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-body">
                <div class="tab-content">
                    @include('admin.settings.general')
                    <div class="tab-pane fade " id="account-vertical-password" role="tabpanel"
                        aria-labelledby="account-pill-password" aria-expanded="false">
                        <form class="validate-form">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Old Password</label>
                                            <input type="password" class="form-control"
                                                placeholder="Old Password"
                                                name="password">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>New Password</label>
                                            <input type="password" class="form-control"
                                                placeholder="New Password"
                                                id="account-new-password"
                                                name="new-password">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Retype new Password</label>
                                            <input type="password"
                                                class="form-control"
                                                data-validation-match-match="password"
                                                placeholder="New Password"
                                                name="confirm-new-password">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                    <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">Save
                                        changes</button>
                                    <button type="reset" class="btn btn-light mb-1">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="account-vertical-info" role="tabpanel"
                        aria-labelledby="account-pill-info" aria-expanded="false">
                        <form class="validate-form">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Bio</label>
                                        <textarea class="form-control" id="accountTextarea" rows="3"
                                            placeholder="Your Bio data here..."></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Birth date</label>
                                            <input type="text" class="form-control birthdate-picker"
                                                placeholder="Birth date"
                                                name="dob">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <select class="form-control" id="accountSelect">
                                            <option>USA</option>
                                            <option>India</option>
                                            <option>Canada</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Languages</label>
                                        <select class="form-control" id="languageselect2">
                                            <option value="English" selected>English</option>
                                            <option value="Spanish">Spanish</option>
                                            <option value="French">French</option>
                                            <option value="Russian">Russian</option>
                                            <option value="German">German</option>
                                            <option value="Arabic" selected>Arabic</option>
                                            <option value="Sanskrit">Sanskrit</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Phone</label>
                                            <input type="text" class="form-control"
                                                placeholder="Phone number" value="(+656) 254 2568"
                                                name="phone">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Website</label>
                                        <input type="text" class="form-control"
                                            placeholder="Website address">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Favorite Music</label>
                                        <select class="form-control" id="musicselect2">
                                            <option value="Rock">Rock</option>
                                            <option value="Jazz" selected>Jazz</option>
                                            <option value="Disco">Disco</option>
                                            <option value="Pop">Pop</option>
                                            <option value="Techno">Techno</option>
                                            <option value="Folk" selected>Folk</option>
                                            <option value="Hip hop">Hip hop</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Favorite movies</label>
                                        <select class="form-control" id="moviesselect2">
                                            <option value="The Dark Knight" selected>The Dark Knight
                                            </option>
                                            <option value="Harry Potter" selected>Harry Potter</option>
                                            <option value="Airplane!">Airplane!</option>
                                            <option value="Perl Harbour">Perl Harbour</option>
                                            <option value="Spider Man">Spider Man</option>
                                            <option value="Iron Man" selected>Iron Man</option>
                                            <option value="Avatar">Avatar</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                    <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">Save
                                        changes</button>
                                    <button type="reset" class="btn btn-light mb-1">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade " id="account-vertical-social" role="tabpanel"
                        aria-labelledby="account-pill-social" aria-expanded="false">
                        <form>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Twitter</label>
                                        <input type="text" class="form-control" placeholder="Add link"
                                            value="https://www.twitter.com">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Facebook</label>
                                        <input type="text" class="form-control" placeholder="Add link">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Google+</label>
                                        <input type="text" class="form-control" placeholder="Add link">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>LinkedIn</label>
                                        <input type="text" class="form-control" placeholder="Add link"
                                            value="https://www.linkedin.com">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Instagram</label>
                                        <input type="text" class="form-control" placeholder="Add link">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Quora</label>
                                        <input type="text" class="form-control" placeholder="Add link">
                                    </div>
                                </div>
                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                    <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">Save
                                        changes</button>
                                    <button type="reset" class="btn btn-light mb-1">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="account-vertical-connections" role="tabpanel"
                        aria-labelledby="account-pill-connections" aria-expanded="false">
                        <div class="row">
                            <div class="col-12 my-2">
                                <a href="javascript: void(0);" class="btn btn-info">Connect to
                                    <strong>Twitter</strong></a>
                            </div>
                            <hr>
                            <div class="col-12 my-2">
                                <button
                                    class=" btn btn-sm btn-light-secondary float-right">edit</button>
                                <h6>You are connected to facebook.</h6>
                                <p>Johndoe@gmail.com</p>
                            </div>
                            <hr>
                            <div class="col-12 my-2">
                                <a href="javascript: void(0);" class="btn btn-danger">Connect to
                                    <strong>Google</strong>
                                </a>
                            </div>
                            <hr>
                            <div class="col-12 my-2">
                                <button
                                    class=" btn btn-sm btn-light-secondary float-right">edit</button>
                                <h6>You are connected to Instagram.</h6>
                                <p>Johndoe@gmail.com</p>
                            </div>
                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">Save
                                    changes</button>
                                <button type="reset" class="btn btn-light mb-1">Cancel</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="account-vertical-notifications" role="tabpanel"
                        aria-labelledby="account-pill-notifications" aria-expanded="false">
                        <div class="row">
                            <h6 class="m-1">Activity</h6>
                            <div class="col-12 mb-1">
                                <div class="custom-control custom-switch custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" checked
                                        id="accountSwitch1">
                                    <label class="custom-control-label mr-1"
                                        for="accountSwitch1"></label>
                                    <span class="switch-label w-100">Email me when someone comments
                                        onmy
                                        article</span>
                                </div>
                            </div>
                            <div class="col-12 mb-1">
                                <div class="custom-control custom-switch custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" checked
                                        id="accountSwitch2">
                                    <label class="custom-control-label mr-1"
                                        for="accountSwitch2"></label>
                                    <span class="switch-label w-100">Email me when someone answers on
                                        my
                                        form</span>
                                </div>
                            </div>
                            <div class="col-12 mb-1">
                                <div class="custom-control custom-switch custom-control-inline">
                                    <input type="checkbox" class="custom-control-input"
                                        id="accountSwitch3">
                                    <label class="custom-control-label mr-1"
                                        for="accountSwitch3"></label>
                                    <span class="switch-label w-100">Email me hen someone follows
                                        me</span>
                                </div>
                            </div>
                            <h6 class="m-1">Application</h6>
                            <div class="col-12 mb-1">
                                <div class="custom-control custom-switch custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" checked
                                        id="accountSwitch4">
                                    <label class="custom-control-label mr-1"
                                        for="accountSwitch4"></label>
                                    <span class="switch-label w-100">News and announcements</span>
                                </div>
                            </div>
                            <div class="col-12 mb-1">
                                <div class="custom-control custom-switch custom-control-inline">
                                    <input type="checkbox" class="custom-control-input"
                                        id="accountSwitch5">
                                    <label class="custom-control-label mr-1"
                                        for="accountSwitch5"></label>
                                    <span class="switch-label w-100">Weekly product updates</span>
                                </div>
                            </div>
                            <div class="col-12 mb-1">
                                <div class="custom-control custom-switch custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" checked
                                        id="accountSwitch6">
                                    <label class="custom-control-label mr-1"
                                        for="accountSwitch6"></label>
                                    <span class="switch-label w-100">Weekly blog digest</span>
                                </div>
                            </div>
                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">Save
                                    changes</button>
                                <button type="reset" class="btn btn-light mb-1">Cancel</button>
                            </div>
                        </div>
                    </div>
                    @include('admin.settings.tags')
                    @include('admin.settings.site-pages')
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- account setting page ends -->
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
<script src="{{asset('vendors/js/pickers/pickadate/picker.js')}}"></script>
<script src="{{asset('vendors/js/pickers/pickadate/picker.date.js')}}"></script>
<script src="{{asset('vendors/js/file-uploaders/dropzone.min.js')}}"></script>
@endsection

@section('page-scripts')
    <script src="{{asset('js/scripts/pages/page-account-settings.js')}}"></script>
    <script src="{{asset('assets/js/siteSettings.js')}}"></script>
@endsection
