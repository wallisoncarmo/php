<?php

// CODIGOS HTTP
define("NOT_FOUND_CODE", 404);
define("NOT_FOUND", "Not Found");
define("NOT_FOUND_ID", "O Id informado não existe!");
define("NOT_FOUND_CONTOLLER", "Controller não existe.");

define("BAD_REQUEST_CODE", 400);
define("BAD_REQUEST", "Bad Request");
define("BAD_REQUEST_CONTOLLER", "Não foi possível encontrar a controladora.");

define("METHOD_NOT_ALLOWED_CODE", 405);
define("METHOD_NOT_ALLOWED", 'Method Not Allowed');
define("METHOD_NOT_ALLOWED_MSG", 'Metodo não existe.');

define("CREATE_CODE", 201);
define("CREATE", 'Create');

define("OK_CODE", 200);
define("OK", 'Ok');

define("CONFLICT_CODE", 409);
define("CONFLICT", 'CONFLICT');
define("ERROR_SINTAXE", "Foi encontrado um erro na sintaxe da requisição favor verificar.");

define("FORBIDDEN_CODE", 403);
define("FORBIDDEN", 'FORBIDDEN');
define("FORBIDDEN_MSG", 'Você não tem permissão para acessar esse recurso.');

// PALAVRA SOLTAS
define("CARACTER", "caracter");

//LISTA DE MENSAGEM DE ERROS
define("ERROR_DADOS_INCORRETOS", "Inconsistência nos dados");
define("ERROR_TIPO_INVALIDO", "Tipo do parametro é inválido");
define("ERROR_CAMPO_NAO_EXISTE", "Esse campo não existe, favor verificar o seu nome.");
define("ERROR_CAMPO_NECESSARIO", "É necessário informar o campo ");
define("ERROR_CAMPO_OBRIGATORIO", "Esse é um campo Obrigatório.");
define("ERROR_CAMPO_MAX_MSG", "Campo exede o limite de ");
define("ERROR_CAMPO_MIN_MSG", "É necessário te mais que ");
define("ERROR_INTEIRO", "Informe um valor inteiro.");
define("ERROR_CPF", "Esse não é um cpf válido");
define("ERROR_BOOLEAN", "Informe um tipo de boolean.");
define("ERROR_EMAIL", "Informe um e-mail válido");

define("ERROR_LOGIN_EMAIL", "O E-mail informado não existe.");
define("ERROR_LOGIN_SENHA", "Senha incorreta.");

define("WARNING", "Warning");

// PERFIL [DEPOIS DEIXAR ESSA PARTE DINÂMICA]
define("ADMINISTRADOR_ID", 1);
define("USUARIO_ID", 2);

define("ADMINISTRADOR", "ADMINISTRADOR");
define("GERENTE", "GERENTE");
define("COLABORADOR", "COLABORADOR");