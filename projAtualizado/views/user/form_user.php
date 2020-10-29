<form action="<?php echo HOME_URI; ?>/user/validateUser" method="POST">
<div class="form-group">
    <label for="exampleInputEmail1">insira o nome do novo usuario</label>
    <input type="text" class="form-control" name="nome" id="exampleInputName" aria-describedby="emailHelp">
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">insira o endereço de email do novo usuário</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Insira uma senha</label>
    <input type="password" name="senha" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="checkbox">
    <label class="form-check-label" for="exampleCheck1">Nível "admin"</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>