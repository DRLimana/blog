# Desafio final blog - Mentoria

# Descrição:
Projeto final de uma mentoria o qual participei, cujo objetivo é desenvolver sozinho um Blog ambientado na web, desenvolvido com a linguagem de programação PHP, linguagem de marcação HTML e linguagem de estilização CSS. O sistema possibilita a interação com as publicações de um blog, com informações de usuários em um servidor local.

## 🖥️⚙️ Tecnologias/Recursos:
- `Editor de código:` [Visual Studio Code v1.76.2](https://code.visualstudio.com/updates/v1_76);
- `Servidor:` [XAMPP](https://sourceforge.net/projects/xampp/files/);

# 🔨 Funcionalidades do projeto:
- `Cadastro de Usuários:` captura e inserção de cada informação de um usuário;
- `Login de acesso:` checagem das credenciais do usuário (email e senha) com a base de dados para acesso ao sistema;
- `Permissionamento de usuários:` para cada usuário cadastrado no sistema via formulário, o mesmo já define como padrão "bloger". Podendo ser feito a alteração das permissões, quando logado com usuário "Administrador";
- `Cadastro e listagem de publicações:` captura e inserção de cada informação que compõe a publicação, bem como a listagem das mesmas;
- `Sistema de paginação das publicações:` conforme as publicações forem inseridas no sistema, o sistema já faz a paginação da quantidade de informações que serão mostradas aos usuários, bem como uma filtragem da data pelo qual a postagem foi inserida no devido momento.
- `Cadastro de categorias:` no cadastro das publicações existe um campo chamado "Selecione a categoria", que podem ser cadastradas se você estiver logado com a permissão de usuário "Administrador";
- `Sistema de Likes:` cada publicação pode ser dada o like ou não. Toda vez que um usuário novo ao realizar um like, o sistema faz a verifica do método chamado inserirLike() o qual encontra-se na controller/LikeDAO.php juntamento ao banco de dados, se já existe alguma informação em um SELECT, se este SELECT voltar com uma informação verdadeira ele muda o status da ação do usuário de true para false.
- ``
