
<div class="container">
    <h2>Listagem de Categorias</h2>
    <h4><a href="app/controller/categoria.php?action=inserir">Inclusão de Categoria</a></h4>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $categoria): ?>
                <tr>
                    <td scope="row"><?= $categoria->getId()?></td>
                    <td>
                        <a href="app/controller/categoria.php?action=show&id=<?= $categoria->getId() ?>">
                            <?= $categoria->getNome()?>
                        </a>
                    </td>
                    <td>
                        <a href="app/controller/categoria.php?action=editar&id=<?= $categoria->getId()?>">
                            <button type="button" class="btn btn-outline-info">
                                editar
                            </button>
                        </a>
                    </td>
                    <td>
                        <a href="app/controller/categoria.php?action=excluir&id=<?= $categoria->getId()?>" class="excluir">
                            <button href="" type="button" class="btn btn-outline-danger">
                                    excluir
                            </button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
