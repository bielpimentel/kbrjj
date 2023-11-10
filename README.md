# Avaliação técnica KBR Tec - Analista Desenvolvedor Back-end Junior #

Projeto realizado como teste para vaga mencionada no título, tendo como tema o desenvolvimento de sistema de registro e gerenciamento de torneios de Brazilian Jiu Jitsu e inscrição de atletas.

## Tarefas propostas e checklist ##

### Integralmente Realizadas ###

1. Exibição dos Campeonatos
    - 1.2. Home: Listagem das 8 demais competições
    - 1.3. Listagem interna dos campeonatos
    - 1.4. Filtros de busca na página de listagem
    - 1.5. Paginação de registros

2. Íntegra dos Campeonatos
   - 2.1. Exibição dinâmica dos dados
   - 2.2. URL amigável da página de íntegra do campeonato
   - 2.3. Exibição do botão correto correspondente à atual fase do campeonato

3. Fase: Inscrições Abertas
   - 3.1. Programação do formulário de inscrição do atleta
   - 3.2. Validação e consistência de campos
   - 3.5. Bloqueios e validações necessárias para que só apareçam informações desta fase quando estiver ativa

6. Área do Atleta
   - 6.1. Autenticação completa da área restrita
   - 6.2. Recuperação de senha

7. Módulo de Autenticação
   - 7.1. Autenticação completa do painel administrativo
   - 7.2. Recuperação de senha
   - 7.3. CRUD usuários
   - 7.4. Módulo de usuários com 2 diferentes níveis de acesso (admin e user)

8. CRUD Campeonatos
   - 8.1. Cadastro, alteração, listagem e exclusão de campeonatos

9. Fase dos Campeonatos
   - 9.1. Seleção da fase atual de cada campeonato
   - 9.2. Programação da fase de inscrições abertas

### Parcialmente Realizadas ####

6. Área do Atleta
   - 6.3. Listagem de todos os certificados do próprio atleta (SEM DETALHES INTERNOS)
   - 6.4. Exibição do certificado de participação ou de vitória (SEM DETALHES INTERNOS)

8. CRUD Campeonatos
   - 8.2. Imagem do campeonato: inserir recurso de cortar imagem (INSERÇÃO SEM RECURSO DE RECORTE)

9. Fase dos Campeonatos
   - 9.4. Programação da fase de resultados (APENAS LIBERAÇÃO DE CERTIFICADOS NA ÁREA DO USUÁRIO, SEM DETALHES INTERNOS)

10. Atletas
    - 10.1. Inscrições: listagem das inscrições dos atletas com os filtros solicitados e paginação (SEM DETALHES DO CAMPEONATO INSCRITO)

## Detalhes dos Bancos de Dados ##

Todas as tabelas estão preparadas para serem rodadas pelas migrations do Laravel, porém sem Seeders.

Cadastro de usuário tem como padrão o valor FALSE (0) para a coluna "is_admin". Para obter privilégios, basta a alteração manual na tabela para incluir valor TRUE (1) na coluna em questão.

## Link do Painel Administrativo ##

<endereço>/painel/dashboard
