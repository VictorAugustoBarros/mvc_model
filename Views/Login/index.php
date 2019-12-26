<h1>Login</h1>

<div>
    <h3 id="erro_codigo" class="subtitulo-login" style="color: #cc1717; display: none">
        <i class="fas fa-exclamation-circle"></i>
        <span style="line-height: 10px"></span>
    </h3>

    <form id="login_form" action="/login/validaLogin" method="post" class="clearfix">
        <div style="margin-top: 50px">
            <center>
                <input style="width: 350px" type="text" name="user" id="user" class="form-control" value="" required="required" placeholder="E-mail">
            </center>
        </div>
        <div style="margin-top: 50px">
            <center>
                <input style="width: 350px" type="text" name="password" id="password" class="form-control" value="" required="required" placeholder="Senha">
            </center>
        </div>

        <div style="margin-top: 50px">
            <center>
                <button type="submit" class="btn btn-primary">Submit</button>
            </center>
        </div>
    </form>
</div>