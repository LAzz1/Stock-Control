# Stock-Control

Link do website: https://uamstockproject.000webhostapp.com/home/home.html

## Introdução
 Nossa aplicação web tem como objetivo o controle de estoque para um almoxarifado médico, no qual possa ser possivel o acesso ao estoque por qualquer funcionario em qualquer lugar. Com ele é possivel realizar as ações de um CRUD (Criar, Ler, Atualizar e Deletar), podendo enviar uma requisição ao nosso banco de dados em MySQL, acessado através da interface do PHP MyAdmin, através do envio de formulário. Após o envio é possivel vizualizar uma tabela com todos os produtos e nela temos o simbolo de lápis para editar o produto e o simbolo de "X" para deletar o produto. Esses dados enviados para nosso banco de dados podem ser vizualizados através de um aplicativo mobile feito com ionic.

## Estrutura do projeto
 O projeto tem como estrutura PHP, HTML e CSS, no qual utilizamos a versão gratuita de um web host chamado "000webhost", com ele nós navegamos entre arquivos, no qual dentro da pasta public temos a pasta "home", "viewProduct", "registerProduct" e dentro delas os respectivos arquivos em .php para gerar a interface do nosso sistema. Reconheço que esse metodo de navegação livre por pastas não é muito segura, porem por precisar com urgencia de um host web apenas para apresentação do projeto, utilizei o 000webhost por praticidade.

## Explicando o projeto
 ### Home
 Dentro do Stock Control, temos a página de "home", que nada mais é que um simples arquivo em HTML para o usuario poder escolher se deseja cadastrar um produto ou se deseja visualizar os produtos já cadastrados.
 
 ### Cadastro
 Já na página de cadastro é mostrado na tela um formulário de produto para ser preenchido, nele devemos fornecer o nome do produto, numero do lote, data de validade, se está alocado para algum paciente e a função do produto. Ao clicar no botão de enviar o formulário vamos ter as validações dos campos, onde no nome do produto e em sua respectiva função o campo não pode estar vazio e nem conter menos de duas letras, pois precisamos de 2 letras no minimo para formar uma palavra. No numero do lote temos apenas a validação do campo não estar vazio, pois em alguns lotes de produtos podem conter letras por isso não restringi para numeros somente, já a data precisa estar preenchida e a data não ter vencido.

 Ao terminar de preencher o formulário sem erros, temos dois botões, o de "Enviar" e o de "Limpar", clicando no de "Limpar" vamos limpar os campos do formulário e clicando no de enviar um alerta vai ser exibido na nossa tela nos mostrando todas informações que vamos enviar para podermos confirmar se está tudo correto, caso esteja clicamos em "Ok" para enviar ou em "Cancelar" para cancelar o envio do formulário.

 ### Tabela de produtos
 
