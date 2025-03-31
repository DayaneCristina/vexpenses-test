## Error Handling

- As tratativas de `Exceptions` poderiam estar melhor segregadas em `BusinessException` e `InfraestructureException`, isso proporcionaria extrair melhores Logs e métricas se fosse o caso
- Os erros de validação das `requests` está retornando de forma não objetiva o que não indica o `Client` qual o erro que está sendo retornado. Por exemplo, ao tentar realizar o registro do primeiro usuário com o um CPF sem a quantidade de caracteres exigidas, o erro que retorna é `404` sem indicação de que o CPF está em formato incorreto.

## Validações

- Há poucas validações nos `inputs` dos dados. Temos a validação nas `requests` porém não temos outro tipo de validação, como por exemplo se o número do CPF / CNPJ é válido.
- Sanitizar os inputs dos usuários
- Criar um ENUM para as `roles` dos usuários pode facilitar na manutenção e tornar o código mais legível. Se alguma `role` mudar ao longo do tempo, por exemplo, precisaremos mexer apenas no ENUM para que a mudança reflita em toda a aplicação.

## Segurança

- Poderíamos substituir o bcrypt pelo Argon2id para termos uma abordagem mais moderna no que diz respeito a encrypt de senhas
- Implementar regras mais rígidas para senhas e validações de segurança para senhas como:
    - Limite máximo de caracteres para evitar ataques DOS. Se uma `string` muito grande é inserida no campo de senha e nosso sistema tenta fazer a encriptação desse dado, podemos encarar lentidão e em um ataque DOS isso pode causar a indisponibilidade do sistema
    - Mínimo de caracteres para senha e utilização de letras maiúsculas, minúsculas, caracteres especiais e números pode ajudar a ter um sistema mais seguro no que diz respeito ao acesso dos dados por usuários maliciósos.
    - Bloqueio momentâneo das contas em caso de muitas tentativas de Login pode mitigar ataques de força bruta.
- Existem alguns `dump` no código que podem ser retirados para evitar que algo seja exposto em ambiente produtivo.

## Falta de Services

- Apesar da segregação entre domínios e casos de uso, seria interessante se tivéssemos a criação de `services`  ou classes agregadoras, isso ajudaria na implementação de lógicas de negócio mais complexas.

## **Interface Segregation**

- Um exemplo que poderia ser utilizado para aplicar a segregação por interface é no `BaseRepositoryInterface` .  Essa interface é implementada na classe `BaseRepository` que por sua vez é estendida em todos os `repositories` . Isso faz com que tenhamos métodos que não são utilizados por todos os repositórios sendo carregados dentro de classes que estendem a `BaseRepository`. Ou seja, se meu repositório não precisa de um `findAll` ou um `find` , por exemplo, ainda sim ele estará carregando dentro de sim por hierarquia esses métodos pois o `BaseRepository` implementa uma interface que o obriga a ter esses métodos. Inclusive, existem métodos não utilizados dentro da `BaseRepository`, como é o caso do `createMany` e do `firstOrCreate`.

## Single Responsability

- Algumas classes fazem mais do que aquilo que tem como propósito. Por exemplo, a classe `CreateFirstUser` além de criar o usuário, também é responsável por criar a `Company`, ou seja, possui duas responsabilidades. Poderia haver uma segregação através da utilização de um `service` que ficaria responsável por realizar essa movimentação sem a necessidade que a `CreateFirstUser` utilize o `CreateCompanyRepository` diretamente. Além deste exemplo, temos também um método em comum dentro da classe de domínio do usuário (`User`) `Create` e `Update`. Ambas utilizam o mesmo método para validação de e-mail, o `checkEmail`. Esse método poderia ficar em uma classe auxiliar e ser utilizada por ambos os domínios de `User` .

## Injeção de Dependências

- Dentro das classes pude perceber que há a instanciação direta de outras classes. Por exemplo, na `UserController` instanciamos os métodos diretamente dos `UseCases` . Poderíamos utilizar a injeção de dependências para evitar esse tipo de instanciação direta através de `services` ou classes que possam agrupar os comportamentos relacionados aos `UseCases` do `User` , por exemplo. Fazendo isso, evitamos o acoplamento pois poderíamos ter um método `createFirstUser` sendo utilizado na `controller` e ele seria totalmente abstraído para que não precisássemos mexer na `controller` em caso de alteração de comportamento.

## Duplicidade de Código

- Como mencionado no tópico acima, existem pedaços do código que estão duplicados, ou seja, há métodos muito parecidos se não iguais sendo utilizados em classes diferentes (como no exemplo do `Create`  e `Update` citados acima). Importante quebrar esses códigos duplicados em classe auxiliares (como um `Validation` ou um `helper`) para permitir a reutilização do código.

## Healthcheck mais detalhado

- Implementar no `healthcheck` meios para checagem da conexão com a base de dados e também da comunicação com serviço de terceiros. Isso nos permitiria realizar validações para termos alertas em caso de alguma instabilidade na base que possa prejudicar a conexão ou a queda de um fornecedor que impacte na operação.

## Performance

- Uma camada de CACHE pode ajudar a melhorar a performance da aplicação. Ter, por exemplo, os dados da empresa de um usuário salvas em CACHE nos ajuda a evitar chamadas na base de dados para pegar uma informação que pode não mudar com frequência (CNPJ / CPF não costumam ser alterados).

## Princípios do REST

- Quando utilizamos `REST` , o ideal é que não tenhamos verbos nas URLs. O `endpoint` `api/users/register` , por exemplo, poderia ser alteado para melhor se adequar pois como é um `POST` já fica subentendido que é um `endpoint` de registro, então poderíamos alterar para algo como `api/users/first-user` onde o método já indica a ação e retiramos o verbo.

## Tests

- Não há testes para todos os cenários da aplicação. Por exemplo, no arquivo `RegisterTest` há apenas o teste com sucesso, não há os testes em caso de falha, como por exemplo no caso de faltar campos na `request` ou o formato de um campo exigido estar incorreto.
- Criar testes unitários além dos testes de integração que já existem  pode melhorar a qualidade das entregas.

## Documentação

- Implementar um OpenAPI/Swagger na aplicação pode facilitar para novos desenvolvedores e facilita na hora de dar manutenção.
- Melhorar os blocos de documentação PHPDoc
