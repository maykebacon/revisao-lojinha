<div class="container">
    <h2>Listagem de Produtos</h2>
    <h4><a href="app/controller/produto.php?action=inserir">Inclusão de Produto</a></h4>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto): ?>
                <tr>
                    <td scope="row"><?= $produto->getId()?></td>
                    <td>
                        <a href="app/controller/produto.php?action=show&id=<?= $produto->getId() ?>">
                            <?= $produto->getNome()?>
                        </a>
                    </td>
                    <td>
                        <a href="app/controller/produto.php?action=editar&id=<?= $produto->getId()?>">
                            <button type="button" class="btn btn-outline-info">
                                editar
                            </button>
                        </a>
                    </td>
                    <td>
                        <a href="app/controller/produto.php?action=excluir&id=<?= $produto->getId()?>" class="excluir">
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
