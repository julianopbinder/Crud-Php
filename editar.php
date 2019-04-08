 <?php
 session_start();
 include_once 'include/header.inc.php';
 include_once 'include/menu.inc.php';
 ?>

<div class="row container">
    <div class="col s12">
    <h5 class ="light">Edição de Registros</h5><hr>
    </div>
</div>

     <?php
      include_once 'banco_dados/conexao.php';
       $id = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT);
       $_SESSION['id'] = $id;
       $querySelect = $link->query("select * from db_cadastro where id='$id'");
       
       //codigo errado
       while ($registros = $querySelect->fetch_assoc()):
           $id = $registros['id'];
           $nome = $registros['nome'];
           $email = $registros['email'];
           $telefone = $registros['telefone'];
       endwhile;
  
           //codigo certo
           $registros = $querySelect->fetch_assoc():
           $id = $registros['id'];
           $nome = $registros['nome'];
           $email = $registros['email'];
           $telefone = $registros['telefone'];
       

     ?>
   
       <!--FORMULÁRIO DE CADASTRO -->
          <div class="row container">
              <p>&nbsp;</p>
             <form action="banco_dados/update.php" method="post" class="col s12">
                 <fieldset class="formulario" style="padding: 15px">
                  <legend><img src="imagens/avatar.png" alt="[imagem]" width="100"></legend>
                  <h5 class="light center">Ateração de Clientes</h5>
          

                   <div class="input-field col s12">
                   <i class="material-icons prefix">account_circle</i>
                   <input type="text" name="nome" id="nome" value="<?php echo $nome ?>" maxlenght="40" required autofocus>
                   <label for="nome"> Nome do Cliente</label>
                   </div>

                   
                   <div class="input-field col s12">
                   <i class="material-icons prefix">email</i>
                   <input type="email" name="email" id="email" value="<?php echo $email ?>"maxlenght="50" required>
                   <label for="email"> Email</label>
                   </div>

                   
                   <div class="input-field col s12">
                   <i class="material-icons prefix">phone</i>
                   <input type="tel" name="telefone" id="telefone" value="<?php echo $telefone ?>" maxlenght="15" required>
                   <label for="telefone"> Telefone</label>
                   </div>


                   <div class="input-field col s12">
                      <input type="submit" value="alterar" class="btn blue">
                      <a href="consultas.php" class="btn red">cancelar</a>
                   </div>    
                </fieldset> 
             </form>
          </div>  
  
    <?php include_once 'include/footer.inc.php'?>
