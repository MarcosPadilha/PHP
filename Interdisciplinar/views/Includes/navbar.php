<nav class="navbar navbar-default">
     <div class="container-fluid">
     <!-- Brand and toggle get grouped for better mobile display -->
     <div class="navbar-header">
          <a class="navbar-brand" href="../views/home.php">Eventos QI</a>
     </div>
     <!-- Collect the nav links, forms, and other content for toggling -->
     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
               <li><a href="<?php echo $rotaLista ?>"><?php echo $btn_name; ?></a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
               <li><a href="../controllers/destruirsessao.php">Logout</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
               <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastros<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                         <li><a href="../views/criar_aluno.php">Alunos</a></li>
                         <li><a href="../views/criar_colaborador.php">Colaboradores</a></li>
                         <li><a href="../views/criar_palestra.php">Palestras</a></li>
                         <li><a href="../views/criar_palestrante.php">Palestrantes</a></li>
                         <li><a href="../views/criar_evento.php">Eventos</a></li>
                         <li><a href="../views/criar_sala.php">Salas</a></li>
                         <li><a href="../views/criar_recurso.php">Recursos</a></li>
                         <li role="separator" class="divider"></li>
                         <li><a href="../views/confirmar_presenca.php">Presenças</a></li>
                    </ul>
               </li>
          </ul>
     </div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>
