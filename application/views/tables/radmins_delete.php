  <form class="form-horizontal" role="form" id="radmins" method="POST" action="/ss/tables/remove/">
      <input type="hidden" class="form-control" id="id" name="id" value="<?= $id ?>" >
            <div class="row">

                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-10 col-md-offset-4 col-lg-3">
                        <button type="submit" class="btn btn-danger" name="radmins">Удалить</button>
                    </div>
                </div>

                <div class="form-group">

                    <div class="col-sm-offset-4 col-sm-10 col-md-offset-4 col-lg-3">
                        <a href="/ss/tables/radmins" >    <button type="button" class="btn btn-warning">Назад</button></a>
                    </div>
                </div>


            </div>

        </form>