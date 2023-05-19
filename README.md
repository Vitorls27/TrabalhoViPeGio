## Quando baixar o projeto, o que fazer? 
**1. Instalar as dependências do projeto**  
`composer install`  

**2. Criar as tabelas do banco de dados do projeto**  
`php artisan migrate` 

----
## Diretorios mais usados do projeto
**Controller**
`App/Http/Controllers`

**Model**
`App/Http/Models`

**View**
`resources/views/nome_arquivo.blade.php`

**Rotas**
`routes/web.php`

**Arquivos de migração(geram as tabelas do banco de dados)**
`database/migrations`

----
## Banco de dados

**Criar arquivo para gerar tabela no banco de dados**  
`php artisan make:migration create_nome_tabela`

**Gerar as tabelas no banco de dados**  
`php artisan migrate`

**Salvar .SQL do banco de dados**  
`database/sql/db_aula.sql`

**Criar um arquivo para inserir registros no banco de dados**  
`php artisan make:seeder CategoriaSeeder`

**Inserir registros no banco de dados a partir de um arquivo**  
`php artisan db::seed CategoriaSeeder`

----
## Comandos básicos do Laravel  
**Listar todos os comandos do Laravel**  
`php artisan list`

**Criar um arquivo Model**  
`php artisan make:model Usuario`

**Criar um arquivo Model e um arquivo de migração ao mesmo tempo**  
`php artisan make:model Usuario -m`

**Criar um arquivo Controller**  
`php artisan make:controller Usuario`

**Habilitar o envio de arquivo para o Storage**  
`php artisan storage:link`

**Iniciar o sistema**  
`php artisan serve`

**Acessar o sistema**  
`http://localhost:8000/`

## Comandos básicos Git

**Clonar o projeto**  
`git clone URL_PROJETO`

**Adicionar todos arquivos para serem versionados**  
`git add .`

**Commitar o arquivo para ser versionado**  
`git commit -m "Sua mensagem"`

**Enviar as alterações para o repositorio remoto do Git**  
`git push`

**Atualizar arquivos do projeto local de acordo com o repositorio do Git remoto**  
`git pull`

### Links Úteis
- [Documentação oficial do Laravel](https://laravel.com/docs).
- [Curso completo Laravel versão 10 em português](https://academy.especializati.com.br/curso/laravel-10-gratuito).

