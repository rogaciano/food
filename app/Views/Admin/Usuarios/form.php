
<div class="form-row">

    <div class="form-group col-md-4">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome" value="<?php echo esc($usuario->nome); ?>">
    </div>

    <div class="form-group col-md-2">
        <label for="cpf">CPF</label>
        <input type="text" class="form-control cpf" name="cpf" id="cpf" value="<?php echo esc($usuario->cpf); ?>">
    </div>

    <div class="form-group col-md-2">
        <label for="telefone">Telefone</label>
        <input type="text" class="form-control sp_celphones" name="telefone" id="telefone" value="<?php echo esc($usuario->telefone); ?>">
    </div>

    <div class="form-group col-md-3">
        <label for="email">E-Mail</label>
        <input type="text" class="form-control" name="email" id="email" value="<?php echo esc($usuario->email); ?>">
    </div>

</div>

<div class="form-row">

    <div class="form-group col-md-3">
        <label for="password">Senha</label>
        <input type="password" class="form-control" name="password" id="password" ">
    </div>

    <div class="form-group col-md-3">
        <label for="confirmation_password">Confirme a Senha</label>
        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
    </div>

    <div class="form-group col-md-3">

        <label for="ativo">Perfil de Acesso</label>

        <select class="form-control" name="id_admin">

            <?php if($usuario->id) : ?>
                <option value="1" <?php echo($usuario->id_admin ? 'selected' : ''); ?>>Administrador</option>
                <option value="0" <?php echo(!$usuario->id_admin ? 'selected' : ''); ?>>Cliente</option>

            <?php else: ?>
                <option value="1">Sim</option>
                <option value="0" selected="">Não</option>
            <?php endif; ?>

        </select>

    </div>

    <div class="form-group col-md-3">

        <label for="ativo">Ativo</label>

        <select class="form-control" name="ativo">

            <?php if($usuario->id) : ?>
                <option value="1" <?php echo($usuario->ativo ? 'selected' : ''); ?>>Sim</option>
                <option value="0" <?php echo(!$usuario->ativo ? 'selected' : ''); ?>>Não</option>

            <?php else: ?>
                <option value="1">Sim</option>
                <option value="0" selected="">Não</option>
            <?php endif; ?>

        </select>

    </div>

</div>


<button type="submit" class="btn btn-primary mr-2 btn-sm">
    <i class="mdi mdi-checkbox-marked-circle btn-icon-prepend"></i>
    Salvar
</button>

<a href="<?php echo site_url("admin/usuarios/show/$usuario->id"); ?>" class="btn btn-light text-dark btn-sm "  >
    <i class="mdi mdi-arrow-left btn-icon-prepend"></i>
    Voltar
</a>

