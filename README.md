# Quando baixar o projeto o que fazer 
**Instalar as dependências do projeto**  
`composer install`  

**Criar as tabelas do banco de dados do projeto**  
`php artisan migrate` 

----
## Diretorios do projeto
**Controller**
`App/Http/Controllers`

**Model**
`App/Http/Models`

**View**
`resources/views/nome_arquivo.blade.php`

**Rotas**
`routes/web.php`

## Banco de dados

**Criar arquivo para criar tabela no banco de dados**  
`php artisan make:migration create_nome_tabela`

**Criar as tabelas no banco de dados**  
`php artisan migrate`

**Arquivo do banco de dados**  
`database/sql/db_aula.sql`

**Criar um arquivo para inserir registros no banco de dados**  
`php artisan make:seeder CategoriaSeeder`

**Inserir registros no banco de dados**  
`php artisan db::seed CategoriaSeeder`


## Comandos básicos do Laravel  
**Listar todos os comandos do Laravel**  
`php artisan list`

**Criar um arquivo Model**  
`php artisan make:model Usuario`

**Criar um arquivo Controller**  
`php artisan make:controller Usuario`

**Habilitar o envio de arquivo para o Storage**  
`php artisan storage:link`

**Iniciar o sistema**  
`php artisan serve`

**Acessar o sistema**  
`http://localhost:8000/`

## Comandos básicos Git

**Clonar projeto**  
`git clone URL_PROJETO`

**Adicionar todos arquivos para serem versionados**  
`git add .`

**Commitar o arquivo para ser versionados**  
`git commit -m "Sua mensagem"`

**Enviar as alterações para o repositorio remoto do Git**  
`git push`

**Atualizar arquivos do projeto local de acordo com o repositorio do Git remoto**  
`git pull`
