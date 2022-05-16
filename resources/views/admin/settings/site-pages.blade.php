<div class="tab-pane fade" id="account-vertical-site-pages" role="tabpanel"
    aria-labelledby="account-pill-site-pages" aria-expanded="false">
    <div class="row">
        <div class="col-12 mb-1">
            <div class="card">
                <div class="card-header">
                  <h4 class="card-title">User Profile</h4>
                </div>
                <div class="card-body">
                  <form action="#" class="contact-repeater">
                    <div data-repeater-list="contact">
                      <div class="row">
                        <div class="col-12 mb-2">
                          <button class="btn btn-icon rounded-circle btn-primary" type="button" data-repeater-create>
                            <i class="bx bx-plus"></i>
                          </button>
                          <span class="ml-1 font-weight-bold text-primary">Добавить новую</span>
                        </div>
                        <div class="col-md-3 col-4 mb-50">
                          <label class="text-nowrap">Название страницы (Рус)</label>
                        </div>
                        <div class="col-md-3 col-4 mb-50">
                          <label class="text-nowrap">Название страницы (En)</label>
                        </div>
                        <div class="col-md-3 col-4 mb-50">
                          <label class="text-nowrap">Иконка</label>
                        </div>
                        <div class="col-md-3 col-4 mb-50">
                          <label  class="text-nowrap">Роли</label>
                        </div>
                      </div>
                      <div class="row justify-content-between" data-repeater-item>
                        <div class="col-md-3 col-12 form-group d-flex align-items-center">
                          <i class="bx bx-menu mr-1"></i>
                          <input type="text" class="form-control" placeholder="First Name">
                        </div>
                        <div class="col-md-3 col-12 form-group">
                          <input type="text" class="form-control" placeholder="Last Name">
                        </div>
                        <div class="col-md-3 col-12 form-group">
                          <input type="text" class="form-control" placeholder="Phone">
                        </div>
                        <div class="col-md-2 col-12 form-group">
                          <input type="text" class="form-control" placeholder="Phone">
                        </div>
                        <div class="col-md-1 col-12 form-group">
                          <button class="btn btn-icon btn-danger rounded-circle" type="button" data-repeater-delete>
                            <i class="bx bx-x"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
        </div>
        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
            <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">Save
                changes</button>
            <button type="reset" class="btn btn-light mb-1">Cancel</button>
        </div>
    </div>
</div>