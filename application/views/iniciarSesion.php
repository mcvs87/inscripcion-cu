 <div class="row"><!-- Contenidos -->
    <div class="col-xs-10 col-xs-offset-1 sombra" id="mainCont">
        <!-- CONTENIDO DE LA PÁGINA -->
        
        <center><h4 style="margin-top: 140px;">Inicio de Sesión</h4></center>
        <div style="margin:auto; width:30%;">
        <br/>
        <form role="form" action="validar.php" method="post">                       
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                            <input type="text" class="form-control" id="mail" placeholder="Usuario" name="correo">
                        </div>
                    </div>
                </div>                     
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></div>
                    <input type="password" class="form-control" id="password" placeholder="Contraseña" name="contrasena">
                </div>
            </div>                           
            <button type="submit" class="btn btn-default pull-right" name="enviar" id="entrar">Entrar</button>
        </form>
        </div>
    </div>
</div><!-- Contenidos -->
