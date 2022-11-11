# GERENCIADOR DE NOTÍCIAS 

# COMO USAR: 

### Depois de baixar o repositório em seu computador e abrir em seu editor de código (Usei: Visual Studio Code), vá no arquivo .env e defina a configuração do banco de dados que irá utilizar:

#### Exemplo de configuração

![](https://github.com/fabriicioa/gerenciadorDeNoticias/blob/main/gerenciador-de-noticias/imagens_readme/6.png)


### Abra o terminal do seu projeto e execute os seguintes comandos:  

php artisan migrate

php artisan permission:create-permission "user"

php artisan permission:create-permission "admin"

php artisan db:seed

<br/>

#### Exemplo no terminal

![](https://github.com/fabriicioa/gerenciadorDeNoticias/blob/main/gerenciador-de-noticias/imagens_readme/5.png)
###### Não executar esses comandos na ordem correta irá impedir o funcionamento correto da aplicação

# Regras de Negócio

Um usuario comum pode ter varias notícias e pesquisar(por titulo), adicionar, editar, visualizar e excluir noticias que sejam criadas por ele.

Um administrador poder ter varias notícias e pesquisar(por titulo), adicionar, editar, visualizar e excluir noticias que sejam criadas por ele. E também pode pesquisar(por nome), editar, visualizar e excluir outros usuarios do sistema.


# Imagens do funcionamento da aplicação 

![Exemplo no terminal](https://github.com/fabriicioa/gerenciadorDeNoticias/blob/main/gerenciador-de-noticias/imagens_readme/1.png)
![Exemplo no terminal](https://github.com/fabriicioa/gerenciadorDeNoticias/blob/main/gerenciador-de-noticias/imagens_readme/4.png)
![Exemplo no terminal](https://github.com/fabriicioa/gerenciadorDeNoticias/blob/main/gerenciador-de-noticias/imagens_readme/2.png)
![Exemplo no terminal](https://github.com/fabriicioa/gerenciadorDeNoticias/blob/main/gerenciador-de-noticias/imagens_readme/3.png)

