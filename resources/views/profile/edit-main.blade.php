<div role="tabpanel" class="tab-pane active" id="account-vertical-general"
    aria-labelledby="account-pill-general" aria-expanded="true">
    <form action="{{ route('update-avatar', $user->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PUT') }}
        <div class="media">
            <a id="userAvatarLink" href="javascript:void(0);">
                <img src="{{ $user->avatar ? asset('images/profile/user-uploads/' . $user->avatar) : asset('images/portrait/default.png') }}"
                    class="rounded mr-75" id="userAvatarView" alt="profile image" height="64" width="64">
            </a>
            <input type="file" name="avatar" class="d-none" id="userAvatar">
            <div class="media-body mt-25">
                <div
                    class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                    <button type="submit" class="btn btn-sm btn-light-primary ml-50 mb-50 mb-sm-0">
                      <span>Загрузить новое фото</span>
                    </button>
                </div>
                <p class="text-muted ml-1 mt-50"><small>Разрешено JPG, GIF or PNG</small></p>
            </div>
        </div>
    </form>
    <hr>
    <form class="validate-form">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <div class="controls">
                        <label>Логин пользователя</label>
                        <input type="text" class="form-control"
                            placeholder="Username" value="{{ $user->login }}" name="username">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <div class="controls">
                        <label>Имя</label>
                        <input type="text" class="form-control" placeholder="Name"
                            value="{{ $user->name }}" name="name">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <div class="controls">
                        <label>E-mail</label>
                        <input type="email" class="form-control" placeholder="Email"
                            value="{{ $user->email }}" name="email">
                    </div>
                </div>
            </div>
            @if ($user->email_verified_at != '')
            <div class="col-12">
                <div class="alert bg-rgba-warning alert-dismissible mb-2"
                    role="alert">
                    <button type="button" class="close" data-dismiss="alert"
                        aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <p class="mb-0">
                        Ваш email не подтвержден. Пожалуйста, проверьте вашу почту.
                    </p>
                    <a href="javascript: void(0);">Повторить отправку</a>
                </div>
            </div>
            @endif
            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">Сохранить</button>
                <button type="reset" class="btn btn-light mb-1">Отмена</button>
            </div>
        </div>
    </form>
    <div class="alert alert-success mt-1 mb-0" role="alert" style="display: none"></div>
</div>