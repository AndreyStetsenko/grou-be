<div class="tab-pane active" id="account-vertical-tags" role="tabpanel"
    aria-labelledby="account-pill-tags" aria-expanded="false">
    <div class="row">
        <div class="col-12 mb-1">
            <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Теги</h4>
                </div>
                <div class="card-body">
                  <form class="tags-repeater">
                    <div id="tag_list" data-repeater-list="tags">
                      <div class="row">
                        <div class="col-12 mb-2">
                          <button class="btn btn-icon rounded-circle btn-primary" type="button" data-toggle="modal" data-target="#inlineForm">
                            <i class="bx bx-plus"></i>
                          </button>

                          <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel33" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel33">Новый тег</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="bx bx-x"></i>
                                  </button>
                                </div>
                                <form id="createNewTag">
                                  <div class="modal-body">
                                    <label>Название тега</label>
                                    <div class="form-group">
                                      <input type="text" placeholder="Тег" class="form-control" id="tag_name">
                                    </div>
                                    <label>Цвет тега</label>
                                    <div class="form-group mb-0">
                                      <input type="color" class="form-control" id="tag_color">
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-primary ml-1" data-dismiss="modal" id="tagsCreate">
                                      <i class="bx bx-check d-block d-sm-none"></i>
                                      <span class="d-none d-sm-block">Создать</span>
                                    </button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>

                          <span class="ml-1 font-weight-bold text-primary">Добавить новый</span>
                        </div>
                        <div class="col-md-7 col-4 mb-50">
                          <label class="text-nowrap">Название тега</label>
                        </div>
                        <div class="col-md-4 col-4 mb-50">
                          <label class="text-nowrap">Цвет тега</label>
                        </div>
                      </div>
                      @foreach ($tags as $i => $tag)
                          <div
                                class="row tags-repeater-item"
                                data-repeater-id="{{ $tag->id }}"
                                data-repeater-item>
                            <div class="col-md-7 col-12 form-group d-flex align-items-center">
                              <input type="text"
                                        class="form-control title"
                                        name="tag"
                                        placeholder="Название тега"
                                        value="{{ $tag->tag }}">
                            </div>
                            <div class="col-md-4 col-12 form-group">
                              <input type="color"
                                        class="form-control color form-control-color"
                                        name="tag_color"
                                        placeholder="Цвет тега"
                                        value="{{ $tag->tag_color }}">
                            </div>
                            <div class="col-md-1 col-12 form-group">
                              <button class="btn btn-icon btn-danger rounded-circle tag-destroy" type="button" data-id="{{ $tag->id }}" data-repeater-delete>
                                <i class="bx bx-x"></i>
                              </button>
                            </div>
                          </div>
                      @endforeach
                    </div>
                  </form>
                </div>
              </div>
        </div>
    </div>
</div>