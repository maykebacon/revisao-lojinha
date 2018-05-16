
<div class="container">
    <h2>Inclusão de Categoria</h2>
    <form action="app/controller/categoria.php?action=<?= @$action ?>" method="post">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control <?= @$validacao['nome']['input'] ?>" id="nome" aria-describedby="emailHelp" placeholder="Nome" name="nome" value="<?= @$value['nome'] ?>">
            <div class="invalid-feedback">
                <?= @$validacao['nome']['text'] ?>
            </div>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control <?= @$validacao['desc']['input'] ?>" id="descricao" rows="3" name="descricao"><?= @$value['desc'] ?></textarea>
            <div class="invalid-feedback">
                <?= @$validacao['desc']['text'] ?>
            </div>
        </div>
        <button type="submit" name="gravar" class="btn btn-primary">Enviar</button>
    </form>
</div>
