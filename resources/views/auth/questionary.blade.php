@extends('layouts.fullLayoutMaster')

{{-- page title --}}
@section('title','Register')
{{-- page scripts --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/authentication.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/forms/wizard.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/forms/select/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')}}">
@endsection

@section('content')
<!-- register section starts -->
<section class="row flexbox-container">
  <div class="col-xl-6 col-10 mt-5">
    <div class="card bg-authentication mb-0">
      <div class="row m-0">
        <!-- register section left -->
        <div class="col-12 px-0">
          <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center pt-3">
            <div class="card-body">
              <form id="user_profile_at_registration" class="wizard-horizontal">
                @csrf
                <!-- Step 1 -->
                <h6>
                  <i class="step-icon"></i>
                  <span class="fonticon-wrap">
                    <i class="livicon-evo"
                      data-options="name:user.svg; size: 50px; style:lines; strokeColor:#adb5bd;"></i>
                  </span>
                  <span>Основные данные</span>
                </h6>
                <!-- Step 1 end-->
                <!-- body content of step 1 -->
                <fieldset>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <select name="main_chanels" data-placeholder="Основные каналы" class="select2 form-control" multiple="multiple">
                          <option value="Tik Tok">Tik Tok</option>
                          <option value="Youtube">Youtube</option>
                          <option value="Instagram">Instagram</option>
                          <option value="Facebook">Facebook</option>
                          <option value="Vimeo">Vimeo</option>
                          <option value="Twitter">Twitter</option>
                          <option value="VK">VK</option>
                          <option value="Flickr">Flickr</option>
                          <option value="OnlyFans">OnlyFans</option>
                          <option value="Ask.fm">Ask.fm</option>
                          <option value="Snapchat">Snapchat</option>
                          <option value="Pinterest">Pinterest</option>
                          <option value="Reddit">Reddit</option>
                          <option value="Twitch">Twitch</option>
                          <option value="Tumbler">Tumbler</option>
                          <option value="Telegram">Telegram</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <fieldset class="form-label-group">
                        <textarea name="person_aim" class="form-control" id="label-textarea" rows="3" placeholder="Какая ваша цель?"></textarea>
                        <label for="label-textarea">Какая ваша цель?</label>
                      </fieldset>
                    </div>
                  </div>
                </fieldset>
                <!-- body content of step 1 end-->
                <!-- Step 2-->
                <h6>
                  <i class="step-icon"></i>
                  <span class="fonticon-wrap">
                    <i class="livicon-evo"
                      data-options="name:briefcase.svg; size: 50px; style:lines; strokeColor:#adb5bd;"></i>
                  </span>
                  <span>Достижение и трудности</span>
                </h6>
                <!-- Step 2 end-->
                <!-- body content of step 2 -->
                <fieldset>
                  <div class="row">

                    <div class="col-md-12 mb-1">
                      <div class="form-group">
                        <label for="social">Социальная сеть</label>
                        <select data-placeholder="Социальная сеть" class="select2 form-control" id="social1">
                          <option value=""></option>
                          <option value="Tik Tok">Tik Tok</option>
                          <option value="Youtube">Youtube</option>
                          <option value="Instagram">Instagram</option>
                          <option value="Facebook">Facebook</option>
                          <option value="Vimeo">Vimeo</option>
                          <option value="Twitter">Twitter</option>
                          <option value="VK">VK</option>
                          <option value="Flickr">Flickr</option>
                          <option value="OnlyFans">OnlyFans</option>
                          <option value="Ask.fm">Ask.fm</option>
                          <option value="Snapchat">Snapchat</option>
                          <option value="Pinterest">Pinterest</option>
                          <option value="Reddit">Reddit</option>
                          <option value="Twitch">Twitch</option>
                          <option value="Tumbler">Tumbler</option>
                          <option value="Telegram">Telegram</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-12">
                      <fieldset class="form-label-group">
                        <textarea class="form-control" id="label-textarea" rows="3" placeholder="Сколько времени развиваете"></textarea>
                        <label for="label-textarea">Сколько времени развиваете</label>
                      </fieldset>
                    </div>

                    <div class="col-6 mb-1">
                      <label>Количество подписчиков</label>
                      <input type="number" class="touchspin" value="0">
                    </div>

                    <div class="col-md-12 mb-1">
                      <div class="form-group">
                        <label for="social">Тематика</label>
                        <select data-placeholder="Тематика" class="select2 form-control" id="social">
                          <option value=""></option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-12 mb-1">
                      <fieldset class="form-label-group">
                        <textarea class="form-control" id="label-textarea" rows="3" placeholder="Какая целевая аудитория"></textarea>
                        <label for="label-textarea">Какая целевая аудитория</label>
                      </fieldset>
                    </div>

                    <div class="col-md-12">
                      <fieldset class="form-label-group">
                        <textarea class="form-control" id="label-textarea" rows="3" placeholder="Сложности при развитии"></textarea>
                        <label for="label-textarea">Сложности при развитии</label>
                      </fieldset>
                    </div>

                  </div>
                </fieldset>
                <!-- body content of step 2 end-->
                <!-- Step 3-->
                <h6>
                  <i class="step-icon"></i>
                  <span class="fonticon-wrap">
                    <i class="livicon-evo"
                      data-options="name:check-alt.svg; size: 50px; style:lines; strokeColor:#adb5bd;"></i>
                  </span>
                  <span>Цели</span>
                </h6>
                <!-- Step 3 end-->
                <!-- body content of step 3 -->
                <fieldset>
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Социальная сеть</label>
                        <select data-placeholder="Социальная сеть" class="select2 form-control" id="social2">
                          <option value=""></option>
                          <option value="Tik Tok">Tik Tok</option>
                          <option value="Youtube">Youtube</option>
                          <option value="Instagram">Instagram</option>
                          <option value="Facebook">Facebook</option>
                          <option value="Vimeo">Vimeo</option>
                          <option value="Twitter">Twitter</option>
                          <option value="VK">VK</option>
                          <option value="Flickr">Flickr</option>
                          <option value="OnlyFans">OnlyFans</option>
                          <option value="Ask.fm">Ask.fm</option>
                          <option value="Snapchat">Snapchat</option>
                          <option value="Pinterest">Pinterest</option>
                          <option value="Reddit">Reddit</option>
                          <option value="Twitch">Twitch</option>
                          <option value="Tumbler">Tumbler</option>
                          <option value="Telegram">Telegram</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-6 mb-1">
                      <label>Количество подписчиков</label>
                      <input type="number" class="touchspin" value="0">
                    </div>

                    <div class="col-md-12 mb-1">
                      <fieldset class="form-label-group">
                        <textarea class="form-control" id="label-textarea" rows="3" placeholder="Какая целевая аудитория"></textarea>
                        <label for="label-textarea">Какая целевая аудитория</label>
                      </fieldset>
                    </div>

                    <div class="col-md-12 mb-1">
                      <fieldset class="form-label-group">
                        <textarea class="form-control" id="label-textarea" rows="3" placeholder="Количество активности"></textarea>
                        <label for="label-textarea">Количество активности</label>
                      </fieldset>
                    </div>

                    <div class="col-md-12 mb-1">
                      <fieldset class="form-label-group">
                        <textarea class="form-control" id="label-textarea" rows="3" placeholder="Работа с рекламодателями"></textarea>
                        <label for="label-textarea">Работа с рекламодателями</label>
                      </fieldset>
                    </div>

                    <div class="col-md-12 mb-1">
                      <fieldset class="form-label-group">
                        <textarea class="form-control" id="label-textarea" rows="3" placeholder="Создание контента"></textarea>
                        <label for="label-textarea">Создание контента</label>
                      </fieldset>
                    </div>

                    <div class="col-md-12 mb-1">
                      <fieldset class="form-label-group">
                        <textarea class="form-control" id="label-textarea" rows="3" placeholder="Сколько времени готов тратить на развитие"></textarea>
                        <label for="label-textarea">Сколько времени готов тратить на развитие</label>
                      </fieldset>
                    </div>

                    <div class="col-md-12 mb-1">
                      <fieldset class="form-label-group">
                        <textarea class="form-control" id="label-textarea" rows="3" placeholder="Бюджет,  на развитие канала"></textarea>
                        <label for="label-textarea">Бюджет,  на развитие канала</label>
                      </fieldset>
                    </div>

                    <div class="col-md-12 mb-1">
                      <fieldset class="form-label-group">
                        <textarea class="form-control" id="label-textarea" rows="3" placeholder="Готов ли к сотрудничеству и коллаборациям"></textarea>
                        <label for="label-textarea">Готов ли к сотрудничеству и коллаборациям</label>
                      </fieldset>
                    </div>

                  </div>
                </fieldset>
                <!-- body content of step 3 end-->
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- register section endss -->
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/extensions/jquery.steps.min.js')}}"></script>
<script src="{{asset('vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/forms/wizard-steps.js')}}"></script>
<script src="{{asset('js/scripts/forms/select/form-select2.js')}}"></script>
<script src="{{asset('js/scripts/forms/number-input.js')}}"></script>
<script src="{{asset('assets/js/questionary.js')}}"></script>
@endsection