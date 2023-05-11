# Desafio final blog - Mentoria

# Descrição:
Projeto final de uma mentoria o qual participei, cujo objetivo é desenvolver sozinho um Blog ambientado na web, desenvolvido com a linguagem de programação PHP, linguagem de marcação HTML e linguagem de estilização CSS. O sistema possibilita a interação com as publicações de um blog, com informações de usuários em um servidor local.

## 🖥️⚙️ Tecnologias/Recursos:
- `Editor de código:` [Visual Studio Code v1.76.2](https://code.visualstudio.com/updates/v1_76);
- `Servidor:` [XAMPP](https://sourceforge.net/projects/xampp/files/);

# 🔨 Funcionalidades do projeto:
- `Cadastro e alteração de Usuários:` captura e inserção de cada informação de um usuário, bem como a alteração do mesmo;
- `Login de acesso:` checagem das credenciais do usuário (email e senha) com a base de dados para acesso ao sistema;
- `Permissionamento de usuários:` para cada usuário cadastrado no sistema via formulário, o mesmo já define como padrão "bloger". Podendo ser feito a alteração das permissões, quando logado com usuário "Administrador";
- `Cadastro e listagem de publicações:` captura e inserção de cada informação que compõe a publicação, bem como a listagem das mesmas;
- `Sistema de paginação das publicações:` conforme as publicações forem inseridas no sistema, o sistema já faz a paginação da quantidade de informações que serão mostradas aos usuários, bem como uma filtragem da data pelo qual a postagem foi inserida no devido momento.
- `Cadastro de categorias:` no cadastro das publicações existe um campo chamado "Selecione a categoria", que podem ser cadastradas se você estiver logado com a permissão de usuário "Administrador";
- `Sistema de Likes:` cada publicação pode ser dada o like ou não. Toda vez que um usuário novo ao realizar um like, o sistema faz a verificação do método chamado inserirLike() o qual encontra-se na controller/LikeDAO.php juntamento ao banco de dados se já existe alguma informação em um SELECT, se este SELECT voltar com uma informação verdadeira ele muda o status da ação do usuário de true para false caso contrário ele vai inserir um novo like.
- `Total de Likes:` Ao final de toda ação de dar like ou deslike, o sistema irá fazer um COUNT() de quantos usuários deram like na publicação o qual se encontra e que atendem a condição de true.
- `Sistema de comentários nas publicações:` o usuário pode optar por comentar em todas as publicações existentes do sistema, basta entrar em uma publicação e comentar. Ao final de todo comentário inserido o mesmo fica anexado e visível para todo os usuários do sistema juntamente a publicação a qual pertence.
- `Estrura do banco de dados:` toda a base de dados para funcionamento do blog, para alimentação das tabelas, consultas e edições no sistema de gerenciamento de banco de dados MySQL;
