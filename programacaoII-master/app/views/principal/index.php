<html>
<head>
<meta charset="UTF-8">
    <script src="assets/jquerry"></script>

    <link rel="stylesheet" href="assets/css/principal.css">

    <script>
        $(document).ready(function () {
            $("#abas ul li").click(function () {
                $(this).addClass("selecionado");
                //guardo o id dfe quem eu cliquei
                var id = $(this).id();
                $("."+id).show();
            });
        };
        </script>
</head>

    <body>

    <section id="central">
        <div id="abas">
            <ul>
                <li id="aba1">TAB1 </li>
            </ul>
            <ul>
                <li id="aba2">TAB2 </li>
            </ul>
            <ul>
                <li id="aba3">TAB3 </li>
            </ul>
        </div>
        <div id="conteudo da div 1">
            conteudo da primeira aba
        </div>
        <div id="conteudo da div 2">
            conteudo da segunda aba
        </div>
        <div id="conteudo da div 3">
            conteudo da terceira aba
        </div>
    </section>


</body>

</html>