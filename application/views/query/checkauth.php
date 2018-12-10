<div class="container">

    <form class="form-signin" role="form" id="radmin" method="POST" action="/ss/query/view">

        <h3 class="form-signin-heading" id="signin-heading">Введите пароль</h3>

        <div class="form-group">
            <input type="password" class="form-control" placeholder="Пароль"  id="password" name="password" >
        </div>
        <input type="hidden" class="form-control"   id="idCard" name="idCard" value="<?= $idCard ?>">
        <button class="btn btn-lg btn-success btn-block" type="submit">Ok</button>

    </form>

</div> <!-- /container -->

