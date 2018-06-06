<html>
<head>
<meta charset="UTF-8">
    <script src="assets/jquery/jquery.min.js"></script>

    <link rel="stylesheet" href="assets/css/principal.css">

    <script>
        $(document).ready(function () {
            $("#abas ul li").addClass('selecionado');
            $("#abas ul li").click(function () {
                $(this).toggleClass("selecionado");
                //guardo o id dfe quem eu cliquei
                var id = $(this).attr("id");
                $("."+id).toggle();
            });


            $(".conteudo ").addClass('selecionado');
            $(".conteudo ").click(function () {
                $("#descricao").fadeOut();
                $(this).toggleClass("selecionado");
                //guardo o id dfe quem eu cliquei
                var id = $(this).attr("descricao");
                $("."+descricao).toggle();
            });
        });

        </script>
</head>

    <body>

    <section id="central">
        <div id="abas">
            <ul>
               <?php foreach($categorias as $categoria):?>
                <li id="aba<?= $categoria->getId()?>"> <?= utf8_encode($categoria->getNome())?> </li>
                <?php endforeach;?>
            </ul>
        </div>



        <?php foreach ($produtos as $produto):?>
        <div class="conteudo aba<?= utf8_encode($produto->getIdCategoria())?>">
            <?= $produto->getNome()?>
            <div id="div1">
                <?= $produto->getDescricao()?>
            </div>
        </div>
            <?php endforeach;?>




    </section>


</body>

</html>