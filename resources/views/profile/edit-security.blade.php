<div class="tab-pane fade " id="account-vertical-password" role="tabpanel"
    aria-labelledby="account-pill-password" aria-expanded="false">
    <form class="validate-form">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <div class="controls">
                        <label>Предыдущий пароль</label>
                        <input type="password" class="form-control"
                            placeholder="Предыдущий пароль"
                            name="password">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <div class="controls">
                        <label>Новый пароль</label>
                        <input type="password" class="form-control"
                            placeholder="Новый пароль"
                            id="account-new-password"
                            name="new-password">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <div class="controls">
                        <label>Повторите новый пароль</label>
                        <input type="password"
                            class="form-control"
                            data-validation-match-match="password"
                            placeholder="Повторите новый пароль"
                            name="confirm-new-password">
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">Сохранить</button>
                <button type="reset" class="btn btn-light mb-1">Отмена</button>
            </div>
        </div>
    </form>
</div>