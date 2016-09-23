<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.0.js" integrity="sha256-slogkvB1K3VOkzAI8QITxV3VzpOnkeNVsKvtkYLMjfk=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <title>Teste Correios</title>

    <script type="text/javascript" >
        $(document).ready(function()
        {
            function limpa_formulário_cep()
            {
                // Limpa valores do formulário de cep.
                $("#cep").val("");
            }

            $("#cep").keypress(function (e) 
            {
                $("#message").html("");
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)){
                    return false;
                }
            });

            $("#cep").blur(function()
            {
                var cep = $("#cep").val();
                if (cep != "") {
                    var validacep = /^[0-9.]{8}$/;
                    if (!validacep.test(cep)) {
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                }
            });
        });
    </script>

	</head>
    <body>
    	<div id="container" class="container">
    		@yield('content')
    	</div>
    </body>
</html>